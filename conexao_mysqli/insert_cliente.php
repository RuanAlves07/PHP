<?php
session_start();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Inserir Cliente</title>
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
    <h1 class="text-center">Inserir Cliente</h1>

    <p></p>

    <!-- Formulário com método POST -->
    <form method="POST" action="">
        <div class="mb-3">
            <label for="nome" class="form-label">Nome:</label>
            <input type="text" class="form-control" id="nome" name="nome" required>
        </div>

        <div class="mb-3">
            <label for="endereco" class="form-label">Endereço:</label>
            <input type="text" class="form-control" id="endereco" name="endereco" required>
        </div>

        <div class="mb-3">
            <label for="telefone" class="form-label">Telefone:</label>
            <input type="text" class="form-control" id="telefone" name="telefone" required>
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">E-mail:</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>

        <button type="submit" class="btn btn-success">Cadastrar Cliente</button>
    </form>

    <?php
    // Verifica se o formulário foi enviado
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        require_once 'conexao.php';

        $conexao = conectadb();

        // Dados do formulário
        $nome = $_POST['nome'];
        $endereco = $_POST['endereco'];
        $telefone = $_POST['telefone'];
        $email = $_POST['email'];

        // Prepara a SQL com placeholders
        $stmt = $conexao->prepare("INSERT INTO cliente (nome, endereco, telefone, email) VALUES (?, ?, ?, ?)");

        if (!$stmt) {
            die("Erro na preparação da consulta: " . $conexao->error);
        }

        // Vincula os parâmetros e executa
        $stmt->bind_param("ssss", $nome, $endereco, $telefone, $email);

        if ($stmt->execute()) {
            echo "Cliente adicionado com sucesso!";
        } else {
            echo "Erro ao adicionar cliente: " . $stmt->error;
        }

        // Fecha declaração e conexão
        $stmt->close();
        $conexao->close();
    }
    ?>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>