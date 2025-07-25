<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        $bdServidor = '127.0.0.1';
        $bdUsuario = 'root';
        $bdSenha = '';
        $bdBanco = 'ruanalves';
        $conexao = mysqli_connect($bdServidor, $bdUsuario, $bdSenha, $bdBanco);
            if (mysqli_connect_errno()) {
                echo "Problemas para conectar no banco, Verifique os dados!";
                die();
            }


        function buscar_tarefas($conexao)
        {
            $sqlBusca = 'SELECT * FROM tarefas';
            $resultado = mysqli_query($conexao, $sqlBusca);
            $tarefas = array();
            while ($tarefa = mysqli_fetch_assoc($resultado)) {
                $tarefas[] = $tarefa;
            }
        return $tarefas;
        }

        function gravar_tarefa($conexao, $tarefa) {
            $sqlGravar = "
                INSERT INTO tarefas
                (nome, descrição, prioridade, prazo, concluido) 
                VALUES
                    {
                        '{$tarefa['nome']}',
                        '{$tarefa['descrição']}',
                        '{$tarefa['prazo']}',
                        '{$tarefa['concluida']}',
                    }
            ";
            mysqli_query($conexao,$sqlGravar);
        }
    ?>


</body>
</html>