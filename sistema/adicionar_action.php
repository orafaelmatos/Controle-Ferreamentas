<?php 

require_once 'connection.php';

$descricao = filter_input(INPUT_POST, 'descricao');
$pn = filter_input(INPUT_POST, 'pn');

if($pn){
    $sql = $pdo->prepare("SELECT * FROM peças WHERE pn = :pn");
    $sql->bindValue(':pn', $pn);
    $sql->execute();
    
    if($sql->rowCount() === 0){
    $sql = $pdo->prepare("INSERT INTO peças (descricao, pn) VALUES (:descricao, :pn)");
    // $sql->bindValue(':id', $id);
    $sql->bindValue(':descricao', $descricao);
    $sql->bindValue(':pn', $pn);
    $sql->execute();

    header('location: index.php');
}else{
    header('location: adicionar.php');
}
}else{
    header('location: adicionar.php');
   
}

?>