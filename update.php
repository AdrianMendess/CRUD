<?php
include_once 'conexao.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id        = $_POST['id'] ?? null;
    $nome      = trim($_POST['nome']);
    $cpf       = trim($_POST['cpf']);
    $email     = trim($_POST['email']);
    $municipio = $_POST['municipio'];
    $telefone  = trim($_POST['telefone']);

    if ($id) {
        $sql = "UPDATE inscricoes 
                SET nome = :nome, 
                    cpf = :cpf, 
                    email = :email, 
                    municipio = :municipio, 
                    telefone = :telefone 
                WHERE id = :id";

        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            ':nome'      => $nome,
            ':cpf'       => $cpf,
            ':email'     => $email,
            ':municipio' => $municipio,
            ':telefone'  => $telefone,
            ':id'        => $id
        ]);
    }
}

header('Location: lista.php');
exit();