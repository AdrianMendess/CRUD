<?php
include_once 'conexao.php';

// Captura o ID vindo do GET
$id = $_GET['id'] ?? null; // ?? operaodor para verificar se variavel existe e não é nula

if ($id) {
    // Prepara a query com Placeholder para evitar SQL Injection
    $stmt = $pdo->prepare("DELETE FROM inscricoes WHERE id = :id");
    
    // Executa vinculando o ID capturado
    $stmt->execute([':id' => $id]);
}

// Redireciona de volta para a lista
header('Location: lista.php');
exit();