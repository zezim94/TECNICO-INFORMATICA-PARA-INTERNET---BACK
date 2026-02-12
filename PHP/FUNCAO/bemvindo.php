<?php

function bemvindo($nome)
{
    echo "Bem-vindo, $nome!";
}

bemvindo("Andelson");

echo "<br>";

function bemvindo2()
{
    $nome = 'Andelson';
    return "Bem-vindo, $nome!";
}

echo bemvindo2();

echo "<br>";
