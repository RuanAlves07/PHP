<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerenciador de tarefas</title>
</head>

<body>
    <h1>Gerenciador de tarefas</h1>
    <form action="" method="">
        <fieldset>
            <legend>Nova tarefa</legend>
            <label>
                <legend>Tarefa:</legend>
                <input type="text" name="nome" />

            </label>
        </fieldset>
        <fieldset>
            <label>
                <legend>Descrição (Opcional):</legend>
                <textarea name="descricao"></textarea>

            </label>
        </fieldset>
        <fieldset>
            <label>
                <legend>Prazo (opcional):</legend>
                <input type="text" name="prazo" />

            </label>


        </fieldset>
        <fieldset>
            <legend>Prioridade</legend>
            <label>
                <input type="radio" name="prioridade" value="baixa" checked />
                Baixa
                <input type="radio" name="prioridade" value="media" />
                Média
                <input type="radio" name="prioridade" value="alta" />
                Alta
            </label>
        </fieldset>

        <label>
            Tarefa concluída:
            <input type="checkbox" name="concluida" value="sim" />
        </label>
        <br>
        <input type="submit" value="Cadastrar" />

        <table border="">
            <tr>
                <th>Tarefas</th>
                <th>Descrição</th>
                <th>Prazo</th>
                <th>Prioridade</th>
                <th>Concluida</th>

            </tr>
            <?php foreach ($lista_tarefas as $tarefas)
            : ?>
                <tr>
                    <td><?php echo $tarefas['nome']; ?></td>
                    <td><?php echo $tarefas['descricao']; ?></td>
                    <td><?php echo $tarefas['prazo']; ?></td>
                    <td><?php echo $tarefas['prioridade']; ?></td>
                    <td><?php echo $tarefas['concluida']; ?></td>

                </tr>
            <?php endforeach; ?>


        </table>


    </form>
</body>

</html>