<html>

<head>
    <title>Задача 3</title>
    <meta charset="UTF-8">
</head>

<body>
<?php
if ((int) date("H") >= 3 and (int) date("H") < 11) {
    echo "Good morning, world!";
} else {
    echo "Hallo, world!";
}
?>
</body>
</html>