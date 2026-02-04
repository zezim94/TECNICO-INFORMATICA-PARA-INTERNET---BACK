<?php
$name = $_GET['nome'];
$peso = $_GET['peso'];
$altura = $_GET['altura'];


$peso = (float) $peso;
$altura = (float) $altura;

$imc = ($peso / ($altura * $altura));

$imc = number_format($imc, 2);

echo $name . " seu IMC é: " . $imc;
echo "<br>";
if ($imc < 18.5) {
    echo "Abaixo do peso";
} elseif ($imc < 25) {
    echo "Peso normal";
} elseif ($imc < 30) {
    echo "Sobrepeso";
} else {
    echo "Obesidade";
}
