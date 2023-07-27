<?php 

require_once 'connection.php';

?>

<h1>Busca por Ferramentas</h1>
<form method="get" action="">
    <input type="text" name="busca" value="<?=!isset($_GET['busca']) ? 'PN ou Ferramenta' : $_GET['busca']?>">
    <button type="submit">Pesquisar</button>
</form>
<br>

<table border="1">

    <!-- <tr>
        <th>idferramentas</th>
        <th>Ferramenta</th>
        <th>Código</th>
        <th>Quantidade</th>

    </tr> -->
    <?php 
    if(!isset($_GET['busca'])){
    ?>
    <tr>
        <td colspan=" 4">Digite alguma coisa...</td>
    </tr>
    <?php 
    }else{
        $pesquisa = $_GET['busca'];
        $sql_code = "SELECT * FROM ferramentas
        WHERE ferramenta LIKE '%$pesquisa%'
        OR codigo LIKE '%$pesquisa%'
        OR idferramentas LIKE '%$pesquisa%'";
        $lista = [];
        $sql = $pdo->query($sql_code);
        $lista = $sql->fetchAll(PDO::FETCH_ASSOC);
         
        
        $sql_code_pn = "SELECT * FROM peças
        WHERE pn LIKE '%$pesquisa%'";
        $lista_pn = [];
        $sql = $pdo->query($sql_code_pn);
        $lista_pn = $sql->fetchAll(PDO::FETCH_ASSOC);

        
        if($sql->rowCount() == 0 && empty($lista_pn) && empty($lista)){
        ?>
    <tr>
        <td colspan="4">Nenhum resultado encontrado...</td>
    </tr>

    <?php } if(!empty($lista_pn)){
        
        $pesquisa = $_GET['busca'];
        $sql_code_estrutura = "SELECT p.pn, p.descricao, f.codigo, f.ferramenta FROM ferramentas f
        JOIN estrutura e
        ON f.idferramentas = e.ferrametas_id
        JOIN peças p 
        ON e.peças_id = p.idpeça
        ";
        
        $lista_estrutura = [];
        $sql = $pdo->query($sql_code_estrutura);
        $lista_estrutura = $sql->fetchAll(PDO::FETCH_ASSOC);
        
        ?>

    <tr>
        <th>Código</th>
        <th>Descrição</th>

    </tr>
    <?php
   
       
    foreach($lista_estrutura as $dados) : {
        ?>
    <tr>
        <td><?php if($dados['pn'] == $_GET['busca'] || empty($_GET['busca'])) {echo $dados['codigo'];}?></td>
        <td><?php if($dados['pn'] == $_GET['busca'] || empty($_GET['busca'])) {echo $dados['ferramenta'];}?></td>

    </tr>
    <?php } endforeach;?>
    <?php }?>

</table>

<table border="1">
    <?php }if(!empty($lista)){
        
        ?>
    <tr>
        <th>Idferramentas</th>
        <th>Ferramenta</th>
        <th>Código</th>
        <th>Quantidade</th>
        <th colspan="2">Ação</th>

    </tr>

    <?php foreach($lista as $dados) : {?>
    <tr>
        <td><?php echo $dados['idferramentas']?></td>
        <td><?php echo $dados['ferramenta']?></td>
        <td><?php echo $dados['codigo']?></td>
        <td><?php echo $dados['quantidade']?></td>
        <td>
            <button type="submit"><a href="aumentar.php?id=<?=$dados['codigo']?>">Aumentar</a></button></input>
        </td>
        <td><button type=" submit">Diminuir</button>
        </td>

    </tr>
    <?php } endforeach;?>
    <?php }?>
</table>
<a href="index.php">Home Page</a>

<!-- <form action="">
    <label for="ferramenta">Ferramenta</label>
    <input type="text" name="ferramenta" id="ferramenta">

    <label for="codigo">Código</label>
    <input type="text" name="codigo" id="codigo">

    <input type="submit" value="Consultar">
</form> -->