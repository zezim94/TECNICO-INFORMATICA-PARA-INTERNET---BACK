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
    <title>EX2 MATRIZ 3x3</title>

    <style>
        td {
            background-color: #116fbdff;
            text-align: center;
            padding: 10px;
            border-radius: 5px;
        }

        .resul{
            background-color: #0a8f63ff;
        }
    </style>
</head>

<body>

    <h1>EX2 MATRIZ 3x3</h1>
    <a href="index.php" style="text-decoration: none;">voltar</a>
    <table>


        <?php
        $soma = 0;
        for ($i = 0; $i < count($matriz); $i++) {
            echo "<tr>";
            $soma = 0;
            for ($j = 0; $j < count($matriz[$i]); $j++) {
                echo "<td>";
                echo $matriz[$i][$j] . "&nbsp;&nbsp;&nbsp;&nbsp;";
                $soma += $matriz[$i][$j];
                echo "</td>";
            }

            echo "<td class='resul'>";
            echo "Linha " . ($i + 1) . " soma: " . $soma . "<br>";
            echo "</td>";

            echo "</tr>";
        }
        ?>
    </table>

</body>

</html>