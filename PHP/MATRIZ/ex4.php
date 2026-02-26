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

    <table>


        <?php
        $maiorCinco = 0;
        for ($i = 0; $i < count($matriz); $i++) {
            echo "<tr>";
            for ($j = 0; $j < count($matriz[$i]); $j++) {
                echo "<td>";
                echo $matriz[$i][$j];
                if ($matriz[$i][$j] > 5) {
                    $maiorCinco++;
                }
                echo "</td>";
            }
            echo "<tr>";
             
        }

        echo "<td colspan=2>";
        echo "Quantidade de elementos maiores que 5: " . $maiorCinco ;
        echo "</td>";

        
        ?>

    </table>

</body>

</html>