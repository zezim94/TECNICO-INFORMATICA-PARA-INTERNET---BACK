<?php

session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {



    $operacao = $_POST['operacao'];

    switch ($operacao) {
        case 1:
            $capital = $_POST['capital'];
            $taxa_juros = $_POST['taxa_juros'];
            $prazo = $_POST['prazo'];

            $montante = $capital * (1 + ($taxa_juros / 100)) ** $prazo;
            $juros = $montante - $capital;

            $_SESSION['juros'] = $juros;
            $_SESSION['montante'] = $montante;

            header("Location: index.php");
            break;

        case 2:
            $juros = $_POST['juros'];
            $taxa_juros = $_POST['taxa_juros'];
            $prazo = $_POST['prazo'];

            $capital = $juros / (1 + ($taxa_juros / 100)) ** $prazo;
            $montante = $capital + $juros;

            $_SESSION['capital'] = $capital;

            header("Location: index.php");
            break;
    }
} else {
    header("Location: index.php");
    exit;
}
