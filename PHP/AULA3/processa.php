<?php

if (!empty($_POST)) {
    $numero = $_POST['numero'];

    if ($numero < 1 || $numero > 10) {
        echo "Digite um número válido !!"  . "<br>";
        echo "<a href='index.php'>Voltar</a>";
    } else {
        echo "<h2> Tabuada do número {$numero} </h2>";

        for ($i = 0; $i < 11; $i++) {

            echo "{$numero} x {$i} = " . $numero * $i;
            echo "<br>";
        }

        echo "<br>";
        echo "<a href='index.php'>Voltar</a>";
    }
}
