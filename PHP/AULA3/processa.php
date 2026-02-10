<?php
session_start();

if (!empty($_POST)) {
    $numero = $_POST['numero'];

    if ($numero < 1 || $numero > 10) {
       $_SESSION['erro'] = "Digite um número válido !!"  . "<br>";
        header("Location: index.php");
        exit;
    } else {
        

        $resultado = '';

        for ($i = 0; $i < 11; $i++) {

            $resultado .= "{$numero} x {$i} = " . $numero * $i . '<br>';
        }
        $_SESSION['resultado'] = $resultado;
        header("Location: index.php");
        exit;
    }
} else {
    header("Location: index.php");
    exit;
}
