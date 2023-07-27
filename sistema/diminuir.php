<?php 

require_once 'connection.php';

$ferramenta = [];
$id = filter_input(INPUT_GET, 'id');


if($id){
    $sql = $pdo->prepare("SELECT * FROM ferramentas WHERE codigo = :id");
    $sql->bindValue(':id', $id);
    $sql->execute();

    if($sql->rowCount() > 0){
        $ferramenta = $sql->fetch(PDO::FETCH_ASSOC);
    }else{
        header('location: index.php');
    }
}

?>


<h1>Alterar Quantidade</h1>

<form action="diminuir_saldo.php" method="POST">
    <input type="hidden" name="id" value="<?= $ferramenta['codigo'] ?>">
    <input type="hidden" name="antiga" value="<?= $ferramenta['quantidade'] ?>">

    <label for="aumentar">Aumentar</label>
    <input type="number" name="aumentar" id="aumentar">
    <input type="submit" value="Alterar">
</form>