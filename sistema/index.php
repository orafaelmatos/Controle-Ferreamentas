<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panflight Teste</title>
    <link rel="stylesheet" href="./assets/css/style.css">
</head>
<body>
<?php 

require_once 'connection.php';


?>
    <header class= "cabecalho">
        <div class="cabecalho_logo">
            <a href="#">
                <img src="./assets/image/panflight_logo.png" width="120px" height="120px" class="logo" alt="">
            </a>
        </div>
        <div class="navebar" id="navebar">
            <nav>
                <a class="navlink" href="adicionar_peça.php">Adicionar Peça</a> <br>
                <a class="navlink" href="cadastrar_ferramenta.php">Cadastrar Ferramenta</a> <br>
                <a class="navlink" href="direction_estoque.php">Consultar Estoque</a> 
            </nav>
              
        </div>

   
    </header>

 
</body>
</html>
