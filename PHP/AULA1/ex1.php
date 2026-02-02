<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IMC</title>
</head>
<body>

<?php

$altura = $_GET['altura'];
$peso = $_GET['peso'];

$imc = $peso / ($altura * $altura);

echo "Seu IMC é: {$imc} <br>";

if($imc < 18.5){
    echo "Abaixo do peso";
} else if($imc < 25){
    echo "Peso normal";
} else if($imc < 30){
    echo "Acima do peso";
} else{
    echo "Obesidade";
}
    
?>
    
</body>
</html>