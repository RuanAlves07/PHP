<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        if (isset($_GET['nome']) && isset($_GET['idade']))
        {
            echo "Recebendo o cliente ".$_GET['nome'];
            echo "Que tem ".$_GET['idade']." Anos";
        } 

        ?>
</body>
</html>