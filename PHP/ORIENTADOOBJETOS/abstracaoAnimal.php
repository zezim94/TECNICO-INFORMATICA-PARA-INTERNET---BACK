<?php

class Animal
{
    public $cor = 'braco';
    public $latir = '';
    public $estado = '';
    public $nome = '';


    function apresentaAnimal()
    {
        return 'O nome do cachorro é ' . $this->nome . " sua cor é " . $this->cor . " agora está " . $this->estado . " e ele faz " . $this->latir;
    }

    function alteraNome($nome)
    {
        $this->nome = $nome;
    }

    function alteraLatido($latido)
    {
        $this->latir = $latido;
    }

    function alteraEstado($estado)
    {
        $this->estado = $estado;
    }

    function alteraCor($cor)
    {
        $this->cor = $cor;
    }
}

$animal1 = new Animal();

echo $animal1->apresentaAnimal();

$animal1->alteraNome("Ralf");
$animal1->alteraLatido("ai ai");
$animal1->alteraEstado("correndo");
$animal1->alteraCor("marron");

echo "<hr>";


echo $animal1->apresentaAnimal();
