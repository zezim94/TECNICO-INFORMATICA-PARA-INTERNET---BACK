<?php

class Funcionario
{

    public $nome = null;
    public $filhos = null;
    public $idade = null;

    function resumirFunc()
    {
        return $this->nome . " possui " . $this->filhos . " filhos e tem " . $this->idade . " anos";
    }

    function alterarFilhos($filhos)
    {
        $this->filhos = $filhos;
    }

    function alterarNome($nome)
    {
        $this->nome = $nome;
    }

    function alterarIdade($idade)
    {
        $this->idade = $idade;
    }
}


$func1 = new Funcionario();

echo $func1->resumirFunc();

$func1->alterarFilhos(5);
echo $func1->resumirFunc();

echo '<hr>';

$func1->alterarNome('Andelson');
echo $func1->resumirFunc();

echo '<hr>';

$func1->alterarIdade(18);
echo $func1->resumirFunc();

echo '<hr>';


echo '########################## Novo funcionário ##########################';

echo '<hr>';

$func2 = new Funcionario();

$func2->alterarFilhos(10);
$func2->alterarIdade(22);
$func2->alterarNome("Agatha");

echo $func2->resumirFunc();

echo '<hr>';
$func2->alterarNome("João");
echo $func2->resumirFunc();
