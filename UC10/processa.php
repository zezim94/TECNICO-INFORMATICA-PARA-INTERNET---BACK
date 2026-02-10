<?php


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $idade = $_POST["idade"];
    $sexo = $_POST["sexo"];
    $nota = $_POST["nota"];

    $dados[] = array($name, $idade, $sexo, $nota);

    $total_pessoas = 0;
    $total_idade = 0;

    foreach ($dados as $dado) {
        $total_pessoas++;

        $total_idade += $idade;


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

    $mas = $total_homens / $total_pessoas * 100;
    $fem = $total_mulheres / $total_pessoas * 100;

    $excelente = $total_excelentes / $total_pessoas * 100;
    $bom = $total_bons / $total_pessoas * 100;
    $regular = $total_regulares / $total_pessoas * 100;
    $pessimo = $total_pesimos / $total_pessoas * 100;

    $media_idade = $total_idade / $total_pessoas;
}else{
    header("Location: index.php");
}
