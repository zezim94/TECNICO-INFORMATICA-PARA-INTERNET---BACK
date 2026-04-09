<?php

class Funcionario
{

    public $nome, $idade, $cargo, $salario, $empresa;

    function __set($atributo, $valor)
    {

        $this->$atributo = $valor;
    }

    function __get($valor)
    {
        return $this->$valor;
    }
}

$func = new Funcionario();

$func->__set('nome', "Andelson");
$func->__set('idade', 31);

echo "Meu nome é " .  $func->__get("nome") . " e tenho " . $func->__get('idade') . " anos";

$func2 = new Funcionario();

$func2->__set('salario', 25800);
$func2->__set('empresa', 'Senac');
$func2->__set('cargo', 'técnico');

echo "<hr>";

echo 'Meu salário é ' . $func2->__get('salario') . " trabalho no " . $func2->__get('empresa') . " e sou " . $func2->__get('cargo');
