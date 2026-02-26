<!-- Instruções
Podem usar o PROMPT/ALERT ou usar o getElementsById.
Crie um algoritmo que leia uma matriz 4X4 de valores inteiros (pode ciar a matriz em uma CONST - igual ao exemplo de aula) e exiba os elementos da matriz. Utilize duas estruturas de repetição FOR -->

<?php

$matriz = [
    [1, 21, 3, 14, 30, 9],
    [5, 26, 17, 8, 12, 4],
    [9, 10, 11, 12, 16, 8],
    [13, 14, 15, 16, 20, 12]
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

    <table>

        <?php
        $soma = 0;
        for ($i = 0; $i < count($matriz); $i++) {
            echo "<tr>";
            for ($j = 0; $j < count($matriz[$i]); $j++) {
                echo "<td>";
                echo $matriz[$i][$j];
                $soma += $matriz[$i][$j];
                echo "</td>";
            }
            echo "</tr>";
        }

        echo "<td colspan=6>";
        echo "Soma de todos os elementos da matriz: " . $soma;
        echo "</td>";
        ?>
    </table>

</body>

</html>