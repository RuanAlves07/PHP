<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <h1> Gerenciador de tarefas</h1>
        <form>
            <fieldset>
                <legend> Nova Tarefa </legend>
                <label>
                    Tarefa:
                    <input type="text" name="nome"/>
                </label>
                <input type="submit" value="Cadastrar">
            </fieldset>
        </form>
    <?php
        $lista_tarefas = array();
            if(isset($_GET['nome'])) {
                $_SESSION['lista_tarefas'][] = $_GET['nome'];

                $lista_tarefas[] = array();

                if (isset($_SESSION['lista_tarefas'])) {
                    $lista_tarefas = $_SESSION['lista_tarefas'];
                }
            }
            session_start();

            if (isset($_GET['prazo'])) {
                $tarefa['prazo'] = $_GET['prazo'];
            } else {
                $tarefa['prazo'] = '';
            }
            $tarefa['prioridade'] = $_GET['prioridade'];

            if (isset($_GET['concluida'])) {
                $tarefa['concluida'] = $_GET['concluida'];
            } else {
                $tarefa['concluida'] = '';
            }
            $_SESSION['lista_tarefas'][] = $tarefa;

            if (array_key_exists('lista_tarefas', $_SESSION)) {
                $lista_tarefas = $_SESSION['lista_tarefas'];
            } else {
                $lista_tarefas = [];
            }

            include "template.php";
    ?>


    <tr>
        <th>Tarefas</th>
        <th>Descricao</th>
        <th>Prazo</th>
        <th>Prioridade</th>
        <th>Concluida</th>
    </tr>
    <?php foreach($lista_tarefas as $tarefa) : ?>
    <tr>
        <td> <?php echo $tarefa['nome']; ?></td>
        <td> <?php echo $tarefa['descricao']; ?></td>
        <td> <?php echo $tarefa['prazo']; ?></td>
        <td> <?php echo $tarefa['prioridade']; ?></td>
        <td> <?php echo $tarefa['concluida']; ?></td>
    </tr>
    <?php endforeach; ?>

    
</body>
</html>