<?php
session_start();
require_once 'conexao.php';

$conexao = conectadb();
$cliente = null;
$id_cliente = null;

// Buscar cliente pelo ID
if (isset($_POST['buscar'])) {
    $id_cliente = intval($_POST['id_cliente']);
    $stmt = $conexao->prepare("SELECT * FROM cliente WHERE id_cliente = ?");
    $stmt->bind_param("i", $id_cliente);
    $stmt->execute();
    $result = $stmt->get_result();
    $cliente = $result->fetch_assoc();
    $stmt->close();
}

// Atualizar cliente
if (isset($_POST['atualizar'])) {
    $id_cliente = $_POST['id_cliente'];
    $nome = $_POST['nome'];
    $endereco = $_POST['endereco'];
    $telefone = $_POST['telefone'];
    $email = $_POST['email'];

    $stmt = $conexao->prepare("UPDATE cliente SET nome = ?, endereco = ?, telefone = ?, email = ? WHERE id_cliente = ?");
    $stmt->bind_param("ssssi", $nome, $endereco, $telefone, $email, $id_cliente);

    if ($stmt->execute()) {
        echo "<div class='alert alert-success'>Cliente atualizado com sucesso!</div>";
    } else {
        echo "<div class='alert alert-danger'>Erro: " . $stmt->error . "</div>";
    }
    $stmt->close();
}

$conexao->close();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Atualizar Cliente</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>


<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container">
            <a class="navbar-brand" href="index.php">Sistema</a>
            <div class="navbar-nav">
                <a class="nav-link" href="index.php"> Início</a>    
                <a class="nav-link" href="insert_cliente.php"> Registrar Cliente</a>
                <a class="nav-link" href="select_cliente.php"> Listar Clientes</a>
                <a class="nav-link" href="delete_cliente.php"> Excluir Cliente</a>
                <a class="nav-link" href="update_cliente.php"> Atualizar Cliente</a>
            </div>
        </div>
    </nav>


<div class="container mt-5">
    <h2 class="text-center">Atualizar Cliente</h2>
    <p class="text-center text-muted">Busque um cliente pelo ID para editar seus dados.</p>


    <form method="POST" class="mb-4">
        <div class="input-group">
            <input type="number" name="id_cliente" class="form-control" placeholder="Digite o ID do cliente" required>
            <button type="submit" name="buscar" class="btn btn-outline-primary">Buscar Cliente</button>
        </div>
    </form>


    <?php if ($cliente): ?>
        <form method="POST">
            <input type="hidden" name="id_cliente" value="<?= $cliente['id_cliente'] ?>">

            <div class="mb-3">
                <label>Nome:</label>
                <input type="text" name="nome" value="<?= htmlspecialchars($cliente['nome']) ?>" class="form-control" required>
            </div>

            <div class="mb-3">
                <label>Endereço:</label>
                <input type="text" name="endereco" value="<?= htmlspecialchars($cliente['endereco']) ?>" class="form-control">
            </div>

            <div class="mb-3">
                <label>Telefone:</label>
                <input type="text" name="telefone" value="<?= htmlspecialchars($cliente['telefone']) ?>" class="form-control">
            </div>

            <div class="mb-3">
                <label>Email:</label>
                <input type="email" name="email" value="<?= htmlspecialchars($cliente['email']) ?>" class="form-control" required>
            </div>

            <button type="submit" name="atualizar" class="btn btn-success">Atualizar Cliente</button>
        </form>
    <?php elseif (isset($_POST['buscar']) && !$cliente): ?>
        <div class="alert alert-warning">Cliente com ID <?= $_POST['id_cliente'] ?> não encontrado.</div>
    <?php endif; ?>
</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>