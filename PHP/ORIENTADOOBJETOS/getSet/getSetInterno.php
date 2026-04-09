<?php

class Pessoa
{

    public $nome, $idade, $cargo, $genero;


    function __set($atributo, $valor)
    {
        $this->$atributo = $valor;
    }

    function __get($valor)
    {
        return $this->$valor;
    }

    function escrever()
    {
        return "Meu nome é: " . $this->__get('nome') . " do sexo " . $this->__get('genero');
    }
}


$p1 = new Pessoa();

$p1->__set('nome', 'Andelson');
$p1->__set('genero', 'masculino');

echo "Nome: " . $p1->__get('nome') . " gênero: " . $p1->__get('genero');

echo '<br>';


echo $p1->escrever('Andelson', 'masculino');
