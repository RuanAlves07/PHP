<?php 

//DEFINIÇÃO DAS CREDENCIAIS DE CONEXAO

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "armazena_imagem";

// CRIANDO A CONEXAO USANDO MYSQLI

$conexao = new mysqli($servername, $username, $password, $dbname);  

// VERIFICANDO SE HOUVE ERRO NA CONEXAO

if ($conexao -> connect_error) {
    die("Falha na conexão: ".$conexao->connect_error);
}


?>