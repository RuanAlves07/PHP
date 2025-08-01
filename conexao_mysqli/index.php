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

<div class="container mt-5">
    <h1><center>ATV 14: Conexão com PDO + Bootstrap + Menu DropDown + Index</center></h1>
    <p></p>
    
        
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>