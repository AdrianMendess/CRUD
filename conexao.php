<?php 
$host ='localhost';
$db = 'usuarios';
$usuario = 'root';
$senha = 'adR123';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$db;charset=utf8", $usuario, $senha);
} catch (PDOException $e) {
    die("Erro na conexão: " . $e->getMessage());
}
?>

