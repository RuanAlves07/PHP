<?php
session_start();
require_once 'conexao.php';

$conexao = conectadb();
$sql = "SELECT id_cliente, nome, endereco, telefone, email FROM cliente";
$result = $conexao->query($sql);
$conexao->close();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Listar Clientes</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container"> 
        <a class="navbar-brand" href="index.php">HOME</a>
        <div class="collapse navbar-collapse">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown">
                        Navegar
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="insert_cliente.php">Inserir Cliente</a></li>
                        <li><a class="dropdown-item" href="select_cliente.php">Listar Cliente</a></li>
                        <li><a class="dropdown-item" href="update_cliente.php">Atualizar Cliente</a></li>
                        <li><a class="dropdown-item" href="delete_cliente.php">Deletar Cliente</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="back/cadastro.php">Cadastro (Back)</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<div class="container mt-5">
    <h2 class="text-center">Clientes Cadastrados</h2>

    <?php if ($result->num_rows > 0): ?>
        <div class="table-responsive">
            <table class="table table-striped table-hover mt-4">
                <thead class="table-primary">
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>Endereço</th>
                        <th>Telefone</th>
                        <th>Email</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while ($linha = $result->fetch_assoc()): ?>
                        <tr>
                            <td><?= $linha["id_cliente"] ?></td>
                            <td><?= htmlspecialchars($linha["nome"]) ?></td>
                            <td><?= htmlspecialchars($linha["endereco"]) ?></td>
                            <td><?= htmlspecialchars($linha["telefone"]) ?></td>
                            <td><?= htmlspecialchars($linha["email"]) ?></td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    <?php else: ?>
        <div class="alert alert-info text-center mt-4">Nenhum cliente encontrado.</div>
    <?php endif; ?>
</div>

</body>
</html>