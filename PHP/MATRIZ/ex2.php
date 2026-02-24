<!-- Instruções
Podem usar o PROMPT/ALERT ou usar o getElementsById.
Crie um algoritmo que leia uma matriz 4X4 de valores inteiros (pode ciar a matriz em uma CONST - igual ao exemplo de aula) e exiba os elementos da matriz. Utilize duas estruturas de repetição FOR -->

<?php

$matriz = [
    [1, 21, 3],
    [5, 26, 17],
    [9, 10, 11]
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

        echo "Soma dos elementos da linha " . $i +1 . ": " . $matriz[$i][0] + $matriz[$i][1] + $matriz[$i][2] . "<br>";
    }
    ?>

</body>

</html>