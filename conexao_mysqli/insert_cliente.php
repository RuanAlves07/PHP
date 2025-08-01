<?php

require_once 'conexao.php';

$conexao = conectadb();

$nome = "Ruan Alves";
$endereco = "Rua Kalamango, 32";
$telefone = "(41) 5555-5555";
$email = "ruanalves@teste.com";

$stmt = $conexao ->prepare("INSERT INTO cliente (nome, endereco, telefone, email) VALUES (?,?,?,?)");

$stmt ->bind_param("ssss", $nome, $endereco, $telefone, $email);

if ($stmt->execute()){
    echo "cliente adicionado com sucesso!";
} else {
    echo "Erro ao adicionar cliente: ".$stmt ->error;
}

$stmt->close();
$conexao->close();

?>