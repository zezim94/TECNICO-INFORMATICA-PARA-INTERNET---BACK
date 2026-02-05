<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Desafio</title>
</head>

<body>

    <h1>Desáfio</h1>

    <?php

    $numeros = [10, 5, 7, 8, 9];

    foreach ($numeros as $num) {
        if ($num === 7) {
            echo "Encontrei o número 7";
            break;
        }
    }


    echo "<br>";
    echo "<hr>";

    $sete = $numeros[2];
    $nove = $numeros[4];

    echo $sete * $nove;

    echo "<br>";



    $sorteio = rand(1, 10);

    if (!in_array($sorteio, $numeros)) {
        $numeros[] = $sorteio;
        echo "O número $sorteio foi adicionado na array";
    }
    else{
        echo "O número $sorteio já existe na array";
    }

    echo "<hr>";

    foreach ($numeros as $num) {

        echo $num;
        echo "<br>";
    }

    ?>

</body>

</html>