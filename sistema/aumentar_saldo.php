<?php 

require_once 'connection.php';

$id = filter_input(INPUT_POST, 'id');
$quantidade = filter_input(INPUT_POST, 'aumentar');
$antiga = filter_input(INPUT_POST, 'antiga');

if($quantidade){
    $sql = $pdo->prepare("UPDATE ferramentas SET quantidade = :quantidade WHERE codigo = :id");
    $sql->bindValue(':quantidade', $quantidade + $antiga);
    $sql->bindValue(':id', $id);
    $sql->execute();

    header('location: direction_estoque.php');

}else{
    echo "Nenhum valore informado";
}

?>