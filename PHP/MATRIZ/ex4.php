<!-- Instruções
Podem usar o PROMPT/ALERT ou usar o getElementsById.
Crie um algoritmo que leia uma matriz 4X4 de valores inteiros (pode ciar a matriz em uma CONST - igual ao exemplo de aula) e exiba os elementos da matriz. Utilize duas estruturas de repetição FOR -->

<?php

$matriz = [
    [1, 21],
    [5, 26],
    [9, 10],
    [3, 7],
    [6, 12],
    [8, 14],
];

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <h1>Matriz</h1>

    <?php
    $maiorCinco = 0;
    for ($i = 0; $i < count($matriz); $i++) {          // percorre linhas
        for ($j = 0; $j < count($matriz[$i]); $j++) {  // percorre colunas
            echo $matriz[$i][$j] . "&nbsp;&nbsp;&nbsp;&nbsp;";
            if ($matriz[$i][$j] > 5) {
                $maiorCinco++;
            }
        }
        echo "<br>";
    }

    echo "Quantidade de elementos maiores que 5: " . $maiorCinco . "<br>";
    ?>

</body>

</html>