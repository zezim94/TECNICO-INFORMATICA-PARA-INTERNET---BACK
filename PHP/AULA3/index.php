<?php
session_start();
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Calculadora</h1>
    <?php

    if (isset($_SESSION['erro'])) {
        echo '<p style="color: red;">' . $_SESSION['erro'] . '</p>';
        unset($_SESSION['erro']);
    }

    ?>

    <form action="processa.php" method="POST">
        <label for="numero">Digite um numero entre 0 e 10:</label>
        <input type="number" id="numero" name="numero">
        <button type="submit">Calcular</button>
    </form>
    <br>

    <?php
    if (isset($_SESSION['resultado'])) {
        echo $_SESSION['resultado'];
        unset($_SESSION['resultado']);
    }
    ?>

</body>

</html>