<!-- Instruções
Podem usar o PROMPT/ALERT ou usar o getElementsById.
Crie um algoritmo que leia uma matriz 4X4 de valores inteiros (pode ciar a matriz em uma CONST - igual ao exemplo de aula) e exiba os elementos da matriz. Utilize duas estruturas de repetição FOR -->

<?php

$matriz = [
    [1, 21, 3],
    [5, 26, 17],
    [9, 10, 11],
    [13, 14, 15],
    [50, 18, 20],
];

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EX3 MATRIZ 5x3</title>
</head>

<body>

    <h1>EX3 MATRIZ 5x3</h1>

    <table>


        <?php
        $soma = 0;
        for ($i = 0; $i < count($matriz); $i++) {
            echo '<tr>';
            for ($j = 0; $j < count($matriz[$i]); $j++) {
                echo '<td>';
                echo $matriz[$i][$j] . "&nbsp;&nbsp;&nbsp;&nbsp;";
                $soma += $matriz[$i][$j];
                echo '</td>';
            }
            //echo "<br>";
            echo '</tr>';
        }

        echo '<td colspan=3>';
        echo "Media de todos os elementos da matriz: " . $soma / count($matriz);
        echo '</td>';

        ?>
    </table>

</body>

</html>