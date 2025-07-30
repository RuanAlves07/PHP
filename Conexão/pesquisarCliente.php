<?php

    require_once 'conexao.php';

    $conexao = conectarBanco();

    $busca = $_GET['busca'] ??'';

    if (!$busca) {
        ?>
        <form action="pesquisarCliente.php" method ="GET">
            <label for="busca">Digite o ID ou Nome:</label>
            <input type="text" id="busca" name="busca" required>
            <button type="submit">Pesquisar</button>
    </form>
    <?php
    exit;
}
    if (is_numeric($busca)) {
        $stmt = $conexao ->prepare("SELECT id_cliente, nome, endereco, telefone, email FROM cliente WHERE id_cliente = :id");
        $stmt-> bindParam(":id", $busca, PDO::PARAM_INT);
    } else {
        
    }
    