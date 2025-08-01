<?php

    // Habilita relatório detalhado de erros no mysqli
    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

    function conectadb() {
        // Configuração do banco de dados

        $endereco = "localhost"; // Endereço do servidor
        $usuario = "root"; // Nome do Usuário do banco de dados
        $senha = ""; // Senha do usuário do banco de dados
        $bancodedados = "empresa"; // Nome do banco de dados

        try {
            $con = new mysqli($endereco, $usuario, $senha, $bancodedados);

            $con->set_charset("utf8mb4"); // Retorna o objeto de conexão 
            return $con;
        } catch (Exception $e) {
            die ("Erro na conexão: "). $e->getMessage();
    }
}
?>