<?php
session_start();
if (empty($_GET['nome']) || empty($_GET['peso']) || empty($_GET['altura'])) {
    header("Location: index.php");
    $_SESSION['erro'] = "Preencha todos os campos";
    exit;
}

$name = $_GET['nome'];
$peso = $_GET['peso'];
$altura = $_GET['altura'];


$peso = (float) $peso;
$altura = (float) $altura;

$imc = ($peso / ($altura * $altura));

$imc = number_format($imc, 2);

$classificacao = "";

echo $name . " seu IMC é: " . $imc;
echo "<br>";
if ($imc < 18.5) {
    $classificacao = "Abaixo do peso";
} elseif ($imc < 25) {
    $classificacao = "Peso normal";
} elseif ($imc < 30) {
    $classificacao = "Sobrepeso";
} else {
    $classificacao = "Obesidade";
}

header("Location: index.php?classificacao=" . $classificacao . "&imc=" . $imc . "&nome=" . $name . "&peso=" . $peso . "&altura=" . $altura);