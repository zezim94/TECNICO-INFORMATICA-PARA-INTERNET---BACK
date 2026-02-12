<?php
session_start();

function jurosEMontante($dados)
{
    $capital = $dados['capital1'];
    $taxa_juros = $dados['taxa_juros1'];
    $prazo = $dados['prazo1'];

    if ($capital == null || $taxa_juros == null || $prazo == null) {
        header("Location: index.php");
        exit;
    }

    $montante = $capital * pow((1 + $taxa_juros / 100), $prazo);
    $juros = $montante - $capital;

    $_SESSION['capital1'] = $capital;
    $_SESSION['taxa_juros1'] = $taxa_juros;
    $_SESSION['prazo1'] = $prazo;

    $_SESSION['montante1'] = $montante;
    $_SESSION['juros1'] = $juros;

    header("Location: index.php");
}

function capital($dados)
{
    $juros = $dados['juros2'];
    $taxa_juros = $dados['taxa_juros2'];
    $prazo = $dados['prazo2'];

    if ($juros == null || $taxa_juros == null || $prazo == null) {
        header("Location: index.php");
        exit;
    }

    $capital = $juros / pow((1 + $taxa_juros / 100), $prazo);

    $_SESSION['juros2'] = $juros;
    $_SESSION['taxa_juros2'] = $taxa_juros;
    $_SESSION['prazo2'] = $prazo;

    $_SESSION['capital2'] = $capital;

    header("Location: index.php");
}

function taxaDeJuros($dados)
{
    $capital = $dados['capital3'];
    $juros = $dados['juros3'];
    $prazo = $dados['prazo3'];

    if ($capital == null || $juros == null || $prazo == null) {
        header("Location: index.php");
        exit;
    }

    $taxa_juros = (pow(($capital + $juros) / $capital, 1 / $prazo) - 1) * 100;

    $_SESSION['capital3'] = $capital;
    $_SESSION['juros3'] = $juros;
    $_SESSION['prazo3'] = $prazo;

    $_SESSION['taxa_juros3'] = $taxa_juros;

    header("Location: index.php");
}

function prazo($dados)
{
    $capital = $dados['capital4'];
    $juros = $dados['juros4'];
    $taxa_juros = $dados['taxa_juros4'];

    if ($capital == null || $juros == null || $taxa_juros == null) {
        header("Location: index.php");
        exit;
    }

    $montante = $capital + $juros;
    $prazo = log($montante / $capital) / log(1 + $taxa_juros / 100);

    $_SESSION['capital4'] = $capital;
    $_SESSION['juros4'] = $juros;
    $_SESSION['taxa_juros4'] = $taxa_juros;

    $_SESSION['prazo4'] = $prazo;

    header("Location: index.php");
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $acao = $_POST['acao'];
    switch ($acao) {
        case '1':
            jurosEMontante($_POST);
            break;
        case '2':
            capital($_POST);
            break;
        case '3':
            taxaDeJuros($_POST);
            break;
        case '4':
            prazo($_POST);
            break;
    }
}