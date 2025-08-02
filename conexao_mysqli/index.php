<?php
session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>FrontEnd</title>
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
    <h1><center>ATV 14: Conexão com PDO + Bootstrap + Menu DropDown + Index</center></h1>
    <center><img src="../conexao_mysqli/eu.jpeg" alt="eu"></center>
    <p></p>
    
        
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>