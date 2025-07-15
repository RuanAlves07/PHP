<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        $name = "Xenia";
        #$name = NULL;
         
        if (isset($name)) {
            print "Essa linha está sendo printada pois a variavel name tem um valor definido.";
            print "Caso não tenha, o mesmo não irá mostrar a linha.";
        }
    ?>
</body>
</html>