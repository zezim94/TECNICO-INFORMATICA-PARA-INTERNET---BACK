<?php

class Animal
{
    public $cor = '';
    public $latir = '';
    public $estado = '';
    public $nome = '';


    function apresentaAnimal($cor, $latir, $estado, $nome)
    {
        return 'O nome do cachorro é ' . $nome . " sua cor é " . $cor . " agora está " . $estado . " e ele faz " . $latir;
    }
}

$animal1 = new Animal();

echo $animal1->apresentaAnimal("Amarelo", "aain ain", "pulando", "Ralf");



echo "<hr>";
