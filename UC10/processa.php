<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $idade = $_POST["idade"];
    $sexo = $_POST["sexo"];
    $nota = $_POST["nota"];



    $total_pessoas = 0;
    $total_idade = 0;
    $total_homens = 0;
    $total_mulheres = 0;
    $total_excelentes = 0;
    $total_bons = 0;
    $total_regulares = 0;
    $total_pesimos = 0;

    $_SESSION['dados'][] = [
        'nome' => $name,
        'idade' => $idade,
        'sexo' => $sexo,
        'nota' => $nota
    ];

    foreach ($_SESSION['dados'] as $dado) {
        $total_pessoas++;

        $total_idade += $dado['idade'];


        if ($sexo == "Masculino") {
            $total_homens++;
        } else {
            $total_mulheres++;
        }

        if ($nota == "Excelente") {
            $total_excelentes++;
        } elseif ($nota == "Bom") {
            $total_bons++;
        } elseif ($nota == "Regular") {
            $total_regulares++;
        } elseif ($nota == "Péssimo") {
            $total_pesimos++;
        }
    }

    $_SESSION['totalPessoas'] = count($_SESSION['dados']);
    $_SESSION['totalMas'] = $total_homens;
    $_SESSION['totalFem'] = $total_mulheres;
    $_SESSION['mas'] = number_format($total_homens / $total_pessoas * 100, 2);
    $_SESSION['fem'] = number_format($total_mulheres / $total_pessoas * 100, 2);

    $_SESSION['excelente'] = number_format($total_excelentes / $total_pessoas * 100, 2);
    $_SESSION['bom'] = number_format($total_bons / $total_pessoas * 100, 2);
    $_SESSION['regular'] = number_format($total_regulares / $total_pessoas * 100, 2);
    $_SESSION['pessimo'] = number_format($total_pesimos / $total_pessoas * 100, 2);

    $_SESSION['totalIdade'] = $total_idade / $total_pessoas;
    $_SESSION['mediaIdade'] = number_format($total_idade / $total_pessoas, 2);

    header('Location: index.php');
} else {
    header("Location: index.php");
}
