<!-- Instruções
Podem usar o PROMPT/ALERT ou usar o getElementsById.
Crie um algoritmo que leia uma matriz 4X4 de valores inteiros (pode ciar a matriz em uma CONST - igual ao exemplo de aula) e exiba os elementos da matriz. Utilize duas estruturas de repetição FOR -->

<?php

$matriz = [
    [1, 21, 3, 14],
    [5, 26, 17, 8],
    [9, 10, 11, 12],
    [13, 14, 15, 16]
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
    $soma = 0;
    for ($i = 0; $i < count($matriz); $i++) {          // percorre linhas
        for ($j = 0; $j < count($matriz[$i]); $j++) {  // percorre colunas
            echo $matriz[$i][$j] . "&nbsp;&nbsp;&nbsp;&nbsp;";
            $soma += $matriz[$i][$j];
        }
        echo "<br>";

        echo "Soma dos elementos da linha " . $i . ": " . $matriz[$i][0] + $matriz[$i][1] + $matriz[$i][2] + $matriz[$i][3] . "<br>";
    }

    echo  "Elementos da linha 1 coluna 1: " . $matriz[0][0] . "<br>";
    echo  "Elementos da linha 2 coluna 2: " . $matriz[1][1] . "<br>";
    echo  "Elementos da linha 3 coluna 3: " . $matriz[2][2] . "<br>";
    echo  "Elementos da linha 4 coluna 4: " . $matriz[3][3] . "<br>";

    echo "Elementos da linha 1 coluna 2: " . $matriz[0][1] . "<br>";
    echo "Elementos da linha 2 coluna 2: " . $matriz[1][1] . "<br>";
    echo "Elementos da linha 3 coluna 3: " . $matriz[2][2] . "<br>";
    echo "Elementos da linha 4 coluna 4: " . $matriz[3][3] . "<br>";

    echo "Elementos da linha 1 coluna 3: " . $matriz[0][2] . "<br>";
    echo "Elementos da linha 2 coluna 2: " . $matriz[1][1] . "<br>";
    echo "Elementos da linha 3 coluna 3: " . $matriz[2][2] . "<br>";
    echo "Elementos da linha 4 coluna 4: " . $matriz[3][3] . "<br>";

    echo "Elementos da linha 1 coluna 4: " . $matriz[0][3] . "<br>";
    echo "Elementos da linha 2 coluna 2: " . $matriz[1][1] . "<br>";
    echo "Elementos da linha 3 coluna 3: " . $matriz[2][2] . "<br>";
    echo "Elementos da linha 4 coluna 4: " . $matriz[3][3] . "<br>";

    echo "Soma de todos os elementos da matriz: " . $soma . "<br>";
    echo "Media de todos os elementos da matriz: " . $soma / count($matriz) . "<br>";
    echo "Soma dos elementos da linha 1: " . $matriz[0][0] + $matriz[0][1] + $matriz[0][2] + $matriz[0][3] . "<br>";
    echo "Soma dos elementos da linha 2: " . $matriz[1][0] + $matriz[1][1] + $matriz[1][2] + $matriz[1][3] . "<br>";
    echo "Soma dos elementos da linha 3: " . $matriz[2][0] + $matriz[2][1] + $matriz[2][2] + $matriz[2][3] . "<br>";
    echo "Soma dos elementos da linha 4: " . $matriz[3][0] + $matriz[3][1] + $matriz[3][2] + $matriz[3][3] . "<br>";
    ?>

</body>

</html>