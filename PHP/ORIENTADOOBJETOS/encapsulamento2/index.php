<?php

abstract class Pessoa
{
    public $nome; // público todo mundo acessa
    protected $sobrenome; // protected somente pai e filho acessa
    private $cpf = 12345678910; // somente o pai acessa

    public function __construct() {}

    // public function __set($atr, $valor) // aqui o filho acessa
    // {
    //     $this->$atr = $valor;
    // }

    // public function __get($atr)
    // {
    //     return $this->$atr;
    // }

    private function falarPessoa()
    { // como esta peivate o filho não acessa diretamente, somente por uma outra função publica
        echo $this->nome . " " . $this->sobrenome;
    }
}

class Filho extends Pessoa
{

    public function __set($atr, $valor) // não acessa se tiver private no pai
    {
        $this->$atr = $valor;
    }

    public function __get($atr)
    {
        return $this->$atr;
    }

    public function exibirPessoa()
    {
        return $this->nome . " " . $this->sobrenome . " " . $this->cpf;
    }

    public function falarPessoa()
    { // mesmo tendo a função no pai, o filho consegue alterar a exibir - polimorfismo
        echo "Olá " . $this->nome . " " . $this->sobrenome;
    }
}

$p1 = new Filho();

$p1->__set("nome", "Andelson");
$p1->__set("sobrenome", "Nascimento");
$p1->__set("cpf", "12345678910");

echo $p1->__get('cpf');

echo "<br>";

echo $p1->exibirPessoa();

echo "<br>";

echo $p1->cpf;
echo "<br>";
$p1->falarPessoa();
