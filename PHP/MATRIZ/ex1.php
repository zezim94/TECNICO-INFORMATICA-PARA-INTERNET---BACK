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
    <title>EX1 MATRIZ 4x4</title>

    <style>
        td {
            background-color: #116fbdff;
            text-align: center;
            padding: 10px;
        }
    </style>

</head>

<body>

    <h1>EX1 MATRIZ 4x4</h1>
    <table>

        <?php
        for ($i = 0; $i < count($matriz); $i++) {
            echo "<tr>";
            $soma = 0;
            for ($j = 0; $j < count($matriz[$i]); $j++) {
                echo "<td>";
                echo $matriz[$i][$j];
                echo "</td>";
            }

            echo "</tr>";
        }

        ?>
    </table>

</body>

</html>