<?php 
include_once 'conexao.php';

$stmt = $pdo->prepare("SELECT * FROM inscricoes");
$stmt->execute();
$inscricoes = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prática CRUD - Listagem de Inscrições</title>
    <style>
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #ddd; padding: 8px; text-align: left; }
        th { background-color: #f2f2f2; }
        .btn-excluir { color: red; text-decoration: none; }
        .btn-editar { color: blue; text-decoration: none; margin-right: 10px; }
    </style>
</head>
<body>

    <h2>Lista de Inscritos</h2>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>CPF</th>
                <th>E-mail</th>
                <th>Município</th>
                <th>Telefone</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($inscricoes as $linha): ?>
                <tr>
                    <td><?= htmlspecialchars($linha['id']); ?></td>
                    <td><?= htmlspecialchars($linha['nome']); ?></td>
                    <td><?= htmlspecialchars($linha['cpf']); ?></td>
                    <td><?= htmlspecialchars($linha['email']); ?></td>
                    <td><?= htmlspecialchars($linha['municipio']); ?></td>
                    <td><?= htmlspecialchars($linha['telefone']); ?></td>
                    <td>
                       
                        <a href="edit.php?id=<?= $linha['id']; ?>" class="btn-editar">Editar</a>
                        <a href="delete.php?id=<?= $linha['id']; ?>" class="btn-excluir" onclick="return confirm('Tem certeza?')">Excluir</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

</body>
</html>