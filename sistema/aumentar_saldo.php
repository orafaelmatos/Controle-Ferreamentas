<?php 

require_once 'connection.php';

if(!empty($_GET['id']))
{
    $id = $_GET['id'];
    
    $quantidade = $_GET['aumentar'];

    $sql = $pdo->prepare("SELECT * FROM ferramentas WHERE id=$id");
    $sql->execute();

    if($sql->rowCount() > 0){
         $sql = $pdo->prepare("UPDATE ferramentas SET quantidade = :quantidade WHERE codigo = :id");
         $sql->bindValue(':id', $id);
         $sql->bindValue(':quantidade', $quantidade);
         $sql->execute();

         header('location: index.php');
    }else{
        header('location: aumentar.php');
}
}
?>