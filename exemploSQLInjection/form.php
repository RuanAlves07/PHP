<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inseguro</title>
</head>
<body>
    <h2>TESTE INSEGURO</h2>
    <form action="login_inseguro.php" method="POST">
    <input type="text" name="nome" placeholder="Digite seu nome">
    <button type="submit">Entrar</button>
    </form>

<br>
<br>
<br>
<br>
    <h2>TESTE SEGURO</h2>
    <form action="login_seguro.php" method="POST">
    <input type="text" name="nome" placeholder="Digite seu nome">
    <button type="submit">Entrar</button>
    </form>
</body>
</html>