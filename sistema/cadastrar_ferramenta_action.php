<?php 

require_once 'connection.php';

$ferramenta = filter_input(INPUT_POST, 'ferramenta');
$codigo = filter_input(INPUT_POST, 'codigo');
$quantidade = filter_input(INPUT_POST, 'quantidade');

if($codigo){
    $sql = $pdo->prepare("SELECT * FROM ferramentas WHERE codigo = :codigo");
    $sql->bindValue(':codigo', $codigo);
    $sql->execute();

    if($sql->rowCount() === 0){
        $sql = $pdo->prepare("INSERT INTO ferramentas (ferramenta, codigo, quantidade) VALUES (:ferramenta, :codigo, :quantidade)");
        $sql->bindValue(':ferramenta', $ferramenta);
        $sql->bindValue(':codigo', $codigo);
        $sql->bindValue(':quantidade', $quantidade);
        $sql->execute();
        
        header('location: cadastrar_ferramenta.php');
        
    }else{
        echo "Ferramenta já cadastrada";
    }
}else{
    echo "Digite um código";
}
?>
<br>
<a href="cadastrar_ferramenta.php">Tente novamente</a>