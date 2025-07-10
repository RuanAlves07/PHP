<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        # index 0123456789012345
        $name = "Stefanie Hatcher";
        echo $name . "<br>";
        $length = strlen($name);
        echo $length . "<br>";
        $cmp = strcmp($name, "Stefanie Hatcher");
        echo $cmp . "<br>";
        $index = strpos($name, "e");
        echo $index . "<br>";
        $first = substr($name, 9, 5);
        echo $first . "<br>";
        $name = strtoupper($name);
        echo $name . "<br>";
    ?>

</body>
</html>