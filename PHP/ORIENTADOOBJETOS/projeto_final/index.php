<?php

require_once "personagem.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Personagem</title>
</head>

<body>

    <h1>Personagem</h1>

    <?php
    $img = new Personagem('nome', 'caracteristica');

    echo $img->pegarImagem();

    echo "<br>";

    $img->__set('nome', 'Bob');
    $img->__set('caracteristica', 'amarelo');

    echo "<br>";
    echo $img->__get('nome');
    echo "<br>";
    echo $img->__get('caracteristica');

    ?>



</body>

</html>