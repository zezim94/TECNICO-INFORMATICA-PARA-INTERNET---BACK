<?php

class Animal
{

    public $nome, $idade;

    function __construct($nome, $idade)
    {
        $this->nome = $nome;
        $this->idade = $idade;
    }

    function __set($atributo, $valor)
    {
        $this->$atributo = $valor;
    }

    function __get($valor)
    {
        return $this->$valor;
    }
}

$an1 = new Animal('Cachorro', 10);
$an2 = new Animal('Galinha', 1);
$an3 = new Animal('nome', 'idade');


echo $an1->nome;
echo "<br>";
echo $an1->idade;


echo "<hr>";

echo $an2->nome;
echo "<br>";
echo $an2->idade;
