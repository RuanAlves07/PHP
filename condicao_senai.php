<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        $nota = 3;

        $aprovado = ($nota >= 7);
        $recuperacao = ($nota <= 6.9 and $nota >= 3.1);
        $reprovado = ($nota <= 3);

        if ($aprovado){
            echo "Aprovado! Nota atual: $nota";
        }
        if ($recuperacao){
            echo "Recuperação! Nota atual: $nota";
        }
        if ($reprovado){
            echo "Reprovado! Nota atual: $nota";
        }

    ?>
</body>
</html>