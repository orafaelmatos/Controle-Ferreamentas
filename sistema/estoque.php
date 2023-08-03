<br>

<table border="1">

    <?php
    // Verificando se foi passado algum valor. 
    if(!isset($_GET['busca'])){
    ?>
    <tr>
        <td colspan=" 4">Digite alguma coisa...</td>
    </tr>
    <?php 
    }else{
    // Query para selecionar todas ferramentas que sejam iguais a que foi digitada. 
        $pesquisa = $_GET['busca'];
        $sql_code = "SELECT * FROM ferramentas
        WHERE ferramenta LIKE '%$pesquisa%'
        OR codigo LIKE '%$pesquisa%'
        OR idferramentas LIKE '%$pesquisa%'";
        $lista = [];
        $sql = $pdo->query($sql_code);
        $lista = $sql->fetchAll(PDO::FETCH_ASSOC);
         
    // Query para selecionar o PN que foi digitado.
        $sql_code_pn = "SELECT * FROM peças
        WHERE pn LIKE '%$pesquisa%'";
        $lista_pn = [];
        $sql = $pdo->query($sql_code_pn);
        $lista_pn = $sql->fetchAll(PDO::FETCH_ASSOC);

    // Verificando se o valor inserido é uma peça ou uma ferramenta
        if($sql->rowCount() == 0 && empty($lista_pn) && empty($lista)){ 
        ?>
    <tr>
        <td colspan="4">Nenhum resultado encontrado...</td>
    </tr>

    <?php } 
    
    // Verificando se o valor passado foi um PN.
        if(!empty($lista_pn)){ 
        $pesquisa = $_GET['busca'];
        $sql_code_estrutura = "SELECT p.pn, p.descricao, f.codigo, f.ferramenta FROM ferramentas f 
        JOIN estrutura e
        ON f.idferramentas = e.ferrametas_id
        JOIN peças p 
        ON e.peças_id = p.idpeça WHERE pn LIKE '%$pesquisa%'
        ";
        
        // Query para pegas estrutura de cada peça.
        $lista_estrutura = [];
        $sql = $pdo->query($sql_code_estrutura);
        $lista_estrutura = $sql->fetchAll(PDO::FETCH_ASSOC);    
        ?>

    <tr>
        <th>Código</th>
        <th>Descrição</th>
    </tr>

    <?php
    
   // Verificando se foi passado algum valor.
   if(!empty($_GET['busca']))
    foreach($lista_estrutura as $dados) : {
        ?>
    <tr>
        <td><?php if($dados['pn'] == $_GET['busca']) {echo $dados['codigo'];}?>
        </td>
        <td><?php if($dados['pn'] == $_GET['busca']) {echo $dados['ferramenta'];}?></td>
    </tr>

    <?php } endforeach;?>
    <?php } 
    
    // Verificando se nenhum valor foi passado.
    if(empty($_GET['busca'])){
        foreach($lista_pn as $dados) : {
            ?>
    <tr>
        <td><?php echo $dados['pn'];}?>
        </td>
        <td><?php echo $dados['descricao'];?></td>
    </tr>
    <?php endforeach;}?>

</table>

<table border="1">
    <?php }
    
    // Verificando se o valor passado foi uma ferramenta. 
    if(!empty($lista)){
        
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
        <td><button type=" submit"><a href="diminuir.php?id=<?=$dados['codigo']?>">Diminuir</a></button>
        </td>

    </tr>
    <?php } endforeach;?>
    <?php }?>
</table>