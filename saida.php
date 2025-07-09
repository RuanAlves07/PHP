<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        print "teste\n<br>";
        print "Olá, Mundo\n<br>";
        print "Escapte 'chars' são os MESMOS como em C\n<br>";
        print "Você pode ter quebras de linhas em uma string.<br>";
        print 'Uma string pode usar "aspas-duplas". Isso é muito legal!<br>';
        print 'Ainda pode-se usar aspas simples dessa forma It\'s cool!<br>';
    ?>

    <?php
        echo "texto<br>";
        echo "Olá Mundo<br>";
        echo "Isso abrange 
        várias linhas. As novas linhas serão
        saída também.<br>";
        echo "Isso abrange\nmultiplas linhas. A nova linha será<br>";
        echo "Caracteres Escaping são feitos \"Como esse\".<br>";
    ?>
</body>
</html>