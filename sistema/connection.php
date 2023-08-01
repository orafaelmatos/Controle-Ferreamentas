<?php 

$db_name = 'sistema';
$db_host = 'localhost';
$db_user = 'root';
$db_password = '1234';

$pdo = new PDO ('mysql:dbname=' . $db_name.';host=' . $db_host, $db_user, $db_password);

?>