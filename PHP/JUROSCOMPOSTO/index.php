<?php

session_start();

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Juros Compostos</title>
</head>

<body>

</body>

<div>

    <h1>Calculadora de Juros Compostos</h1>

    <div>

        <h2>1 - Juros e Montante</h2>
        <form action="processa.php" method="POST">
            <input type="hidden" name="operacao" value="1">
            <label for="capital">Capital:</label>
            <input type="number" name="capital" id="capital">
            <label for="taxa_juros">Taxa de Juros:</label>
            <input type="number" name="taxa_juros" id="taxa_juros">
            <label for="prazo">Prazo:</label>
            <input type="number" name="prazo" id="prazo">
            <input type="submit" value="Calcular">
        </form>

        <?php
        if (isset($_SESSION['juros'])) {
            echo "Juros: R$ " . number_format($_SESSION['juros'], 2, ',', '.') . "<br>";
            echo "Montante: R$ " . number_format($_SESSION['montante'], 2, ',', '.') . "<br>";
        }
        ?>

    </div>

    <div>
        <h2>2 - Juros Compostos</h2>
        <form action="processa.php" method="POST">
            <input type="hidden" name="operacao" value="2">
            <label for="juros">Juros</label>
            <input type="number" name="juros" id="juros">
            <label for="taxa_juros">Taxa de Juros</label>
            <input type="number" name="taxa_juros" id="taxa_juros">
            <label for="prazo">Prazo</label>
            <input type="number" name="prazo" id="prazo">
            <input type="submit" value="Calcular">
        </form>
    </div>

    <div>
        <h2>3 - Juros Compostos</h2>
        <form action="processa.php" method="POST">
            <input type="hidden" name="operacao" value="3">
            <label for="capital">Capital</label>
            <input type="number" name="capital" id="capital">
            <label for="juros">Juros</label>
            <input type="number" name="juros" id="juros">
            <label for="prazo">Prazo</label>
            <input type="number" name="prazo" id="prazo">
            <input type="submit" value="Calcular">
        </form>
    </div>

    <div>
        <h2>4 - Juros Compostos</h2>
        <form action="processa.php" method="POST">
            <input type="hidden" name="operacao" value="4">
            <label for="capital">Capital</label>
            <input type="number" name="capital" id="capital">
            <label for="juros">Juros</label>
            <input type="number" name="juros" id="juros">
            <label for="taxa_juros">Taxa de Juros</label>
            <input type="number" name="taxa_juros" id="taxa_juros">
            <input type="submit" value="Calcular">
        </form>
    </div>
</div>

</html>