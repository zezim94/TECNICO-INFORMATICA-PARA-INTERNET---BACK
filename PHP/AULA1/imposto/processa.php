<?php

$nome = $_GET['nome'];
$salario = $_GET['salario'];

if($salario <= 2428.80){
    echo "Isento <br>";
} else if($salario <= 2826.65){
    echo "7,5% <br>";
    echo "Desconto: R$ ". $salario * 0.075;
} else if($salario <= 3751.05){
    echo "15,0% <br>";
    echo "Desconto: R$ ". $salario * 0.15;
} else if($salario <= 4664.68){
    echo "22,5% <br>";
    echo "Desconto: R$ ". $salario * 0.225;
} else{
    echo "27,5% <br>";
    echo  "Desconto: R$ ". $salario * 0.275;
}

?>
