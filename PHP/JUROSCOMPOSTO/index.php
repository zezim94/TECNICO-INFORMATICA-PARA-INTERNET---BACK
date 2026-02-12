<?php
session_start();
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Juros Compostos</title>
</head>

<body>

    <?php

    if (isset($_SESSION['capital1'])) {
        $capital1 = $_SESSION['capital1'];
        $taxa_juros1 = $_SESSION['taxa_juros1'];
        $prazo1 = $_SESSION['prazo1'];
    }

    if (isset($_SESSION['juros2'])) {
        $juros2 = $_SESSION['juros2'];
        $taxa_juros2 = $_SESSION['taxa_juros2'];
        $prazo2 = $_SESSION['prazo2'];
    }

    if (isset($_SESSION['capital3'])) {
        $capital3 = $_SESSION['capital3'];
        $juros3 = $_SESSION['juros3'];
        $prazo3 = $_SESSION['prazo3'];
    }

    if (isset($_SESSION['capital4'])) {
        $capital4 = $_SESSION['capital4'];
        $juros4 = $_SESSION['juros4'];
        $taxa_juros4 = $_SESSION['taxa_juros4'];
    }
    ?>

    <h1>Calculadora de Juros Compostos</h1>

    <div class="container">
        <div class="box">
            <h2>Juros e Montante</h2>
            <form action="processa.php" method="POST">
                <input type="hidden" name="acao" value="1">

                <label for="capital1">Capital</label>
                <input type="number" id="capital1" name="capital1" value="<?= $capital1; ?>">

                <label for="taxa_juros1">Taxa de Juros</label>
                <input type="number" id="taxa_juros1" name="taxa_juros1" value="<?= $taxa_juros1; ?>">

                <label for="prazo1">Prazo</label>
                <input type="number" id="prazo1" name="prazo1" value="<?= $prazo1; ?>">

                <button type="submit">Calcular</button>

            </form>

            <div class="resultado">
                <?php
                if (isset($_SESSION['montante1'])) {
                    echo "<p>Montante: R$ " . number_format($_SESSION['montante1'], 2, ',', '.') . "</p>";
                }
                if (isset($_SESSION['juros1'])) {
                    echo "<p>Juros: R$ " . number_format($_SESSION['juros1'], 2, ',', '.') . "</p>";
                }
                ?>
            </div>
        </div>

        <div class="box">
            <h2>Capital</h2>
            <form action="processa.php" method="POST">
                <input type="hidden" name="acao" value="2">

                <label for="juros2">Juros</label>
                <input type="number" id="juros2" name="juros2" step="0.01" value="<?= $juros2; ?>">

                <label for="taxa_juros2">Taxa de Juros</label>
                <input type="number" id="taxa_juros2" name="taxa_juros2" step="0.01" value="<?= $taxa_juros2; ?>">

                <label for="prazo2">Prazo</label>
                <input type="number" id="prazo2" name="prazo2" value="<?= $prazo2; ?>">

                <button type="submit">Calcular</button>
            </form>

            <div class="resultado">
                <?php
                if (isset($_SESSION['capital2'])) {
                    echo "Capital: R$ " . number_format($_SESSION['capital2'], 2, ',', '.');
                }
                ?>
            </div>
        </div>

        <div class="box">
            <h2>Taxa de Juros</h2>
            <form action="processa.php" method="POST">
                <input type="hidden" name="acao" value="3">

                <label for="capital3">Capital</label>
                <input type="number" id="capital3" name="capital3" value="<?= $capital3; ?>">

                <label for="juros3">Juros</label>
                <input type="number" id="juros3" name="juros3" step="0.01" value="<?= $juros3; ?>">

                <label for="prazo3">Prazo</label>
                <input type="number" id="prazo3" name="prazo3" value="<?= $prazo3; ?>">

                <button type="submit">Calcular</button>
            </form>

            <div class="resultado">
                <?php
                if (isset($_SESSION['taxa_juros3'])) {
                    echo "Taxa de Juros: " . number_format($_SESSION['taxa_juros3'], 2, ',', '.') . "%";
                }
                ?>
            </div>
        </div>

        <div class="box">
            <h2>Prazo</h2>
            <form action="processa.php" method="POST">
                <input type="hidden" name="acao" value="4">

                <label for="capital4">Capital</label>
                <input type="number" id="capital4" name="capital4" value="<?= $capital4; ?>">

                <label for="juros4">Juros</label>
                <input type="number" id="juros4" name="juros4" step="0.01" value="<?= $juros4; ?>">

                <label for="taxa_juros4">Taxa Juros</label>
                <input type="number" id="taxa_juros4" name="taxa_juros4" step="0.01" value="<?= $taxa_juros4; ?>">

                <button type="submit">Calcular</button>
            </form>

            <div class="resultado">
                <?php
                if (isset($_SESSION['prazo4'])) {
                    echo "Prazo: " . number_format($_SESSION['prazo4'], 2, ',', '.') . " meses";
                }
                ?>
            </div>
        </div>

    </div>

</body>

</html>