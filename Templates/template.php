<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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

            <label>
                Descrição (Opcional):
                <textarea name="descricao"></textarea>

            </label>

            <label>
                Prazo (opcional):
                <input type="text" name="prazo" />

            </label>


        </fieldset>
        <fieldset>
            <legend>Prioridade</legend>
            <label>
                <input type="radio" name="prioridade" value="baixa" checked />
                Baixa
                <input type="radio" name="prioridade" value="media" />
                Media
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


    </form>
</body>

</html>