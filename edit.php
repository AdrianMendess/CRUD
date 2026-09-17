
<?php
include_once 'conexao.php';

$id = $_GET['id'] ?? null;

if (!$id) {
    header('Location: lista.php');
    exit();
}

$stmt = $pdo->prepare("SELECT * FROM inscricoes WHERE id = :id");
$stmt->execute([':id' => $id]);
$usuario = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$usuario) {
    header('Location: lista.php');
    exit();
}

$municipios = ['São Luís', 'Raposa', 'Paço do Lumiar', 'São José de Ribamar'];
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Inscrição</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <div class="box">
        <form action="update.php" method="post" id="form">
            <fieldset>

                <legend><b>Editar Inscrição</b></legend>

                <!-- Campo oculto guardando o ID do registro -->
                <input type="hidden" name="id" value="<?= htmlspecialchars($usuario['id']); ?>">

                <div class="inputBox">
                    <input
                        type="text"
                        name="nome"
                        id="nome"
                        class="inputuser"
                        value="<?= htmlspecialchars($usuario['nome']); ?>"
                    />
                    <label for="nome" class="labelInput">Nome</label>
                </div>

                <div class="inputBox">
                    <input
                        type="text"
                        name="cpf"
                        id="cpf"
                        class="inputuser"
                        value="<?= htmlspecialchars($usuario['cpf']); ?>"
                    />
                    <label for="cpf" class="labelInput">CPF</label>
                </div>

                <div class="inputBox">
                    <input
                        type="text"
                        name="email"
                        id="email"
                        class="inputuser"
                        value="<?= htmlspecialchars($usuario['email']); ?>"
                    />
                    <label for="email" class="labelInput">Email</label>
                </div>

                <div class="selectBox">
                    <select name="municipio" id="municipio">
                        <?php foreach ($municipios as $muni): ?>
                            <?php 
                                $marcador = '';
                                if ($usuario['municipio'] === $muni) {
                                    $marcador = 'selected';
                                }
                            ?>
                            <option value="<?= $muni; ?>" <?= $marcador; ?>>
                                <?= $muni; ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                    <label for="municipio" class="labelInput">Município</label>
                </div>

                <div class="inputBox">
                    <input
                        type="text"
                        name="telefone"
                        id="telefone"
                        class="inputuser"
                        value="<?= htmlspecialchars($usuario['telefone']); ?>"
                    />
                    <label for="telefone" class="labelInput">Telefone</label>
                </div>

                <input type="submit" name="atualizar" id="enviar" value="Salvar Alterações"/>

            </fieldset>
        </form>

    </div>

</body>

</html>
