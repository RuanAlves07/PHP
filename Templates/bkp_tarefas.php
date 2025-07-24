<!DOCTYPE html>
<?php session_start(); ?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerenciador de tarefas PHP</title>
</head>



<body>
    <h1>Gerenciador de tarefas</h1>
    <form>
        <fieldset>
            <legend>Nova tarefa</legend>
            <label>
                Tarefa:
                <input type="text" name="nome" />

            </label>
            <input type="submit" value="cadastrar" />

        </fieldset>

    </form>
    <?php
    session_start();
    $lista_tarefas = array();
    if (isset($_GET["nome"])) {
        $_SESSION['lista_tarefas'][] = $_GET["nome"];

    }

    if (isset($_SESSION['lista_tarefas'])) {

        $lista_tarefas = $_SESSION['lista_tarefas'];
    
    }else{
        $lista_tarefas = array();
    }



    ?>



    <table>
        <tr>
            <th>Tarefas</th>
        </tr>
        <?php foreach ($lista_tarefas as $tarefa)
        :    ?>
            <tr>
                <td><?php echo $tarefa; ?></td>
            </tr>
        <?php endforeach; ?>


    </table>

</body>

</html>