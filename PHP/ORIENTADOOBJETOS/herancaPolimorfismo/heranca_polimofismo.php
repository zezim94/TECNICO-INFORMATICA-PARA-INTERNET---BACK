<?php

abstract class Veiculo
{

    public $velocidade, $ano, $cor, $nome;

    function acelerar()
    {
        echo "acelerar";
    }

    function freiar()
    {
        echo "freiar";
    }

    function marcha()
    {
        echo "mão para marcha e pé para embreagem ";
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

class Moto extends Veiculo
{
    function marcha()
    {
        echo "mão para embreagem e pé para marcha ";
    }

    function seguranca()
    {
        echo "usar capacete";
    }
}

class Carro extends Veiculo
{

    function teto()
    {
        echo "possui teto solar";
    }
}

$hornet = new Moto();
$volvo = new Carro();

$hornet->__set('velocidade', 260);
$hornet->__set('ano', 2014);
$hornet->__set('cor', "vermelha");
$hornet->__set('nome', "Hornet");

$volvo->__set('nome', 'XC60');
$volvo->__set('ano', 2026);
$volvo->__set('cor', 'prata');
$volvo->__set('velocidade', '280');


echo " Moto: " . $hornet->nome ." ,ano:  ". $hornet->ano . " ,cor: ". $hornet->cor . " ,velocidade: ". $hornet->velocidade ."km/h, ";
$hornet->marcha();

echo "<br>";
$hornet->seguranca();
echo "<br>";
$hornet->freiar();
echo "<br>";
$hornet->acelerar();

echo "<hr>";

echo " Carro: " . $volvo->nome ." ano:  ". $volvo->ano . " cor: ". $volvo->cor . " velocidade: ". $volvo->velocidade ."km/h ";
$volvo->marcha();
$volvo->teto();


