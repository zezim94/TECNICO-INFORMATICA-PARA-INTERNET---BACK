<style>
    body{
        background-color: #0284fdff;
    }
</style>

<?php

abstract class Times
{
    public $nome, $titulos, $local, $tecnico;

    public function __construct($nome, $titulos, $local, $tecnico)
    {
        $this->nome = $nome;
        $this->titulos = $titulos;
        $this->local = $local;
        $this->tecnico = $tecnico;
    }

    public function hino($letra)
    {
        echo $letra;
    }

    public function bandeira($bandeira)
    {
        echo $bandeira;
    }

    public function __set($propriedade, $valor)
    {
        $this->$propriedade = $valor;
    }

    public function __get($propriedade)
    {
        return $this->$propriedade;
    }
}

class Selecao extends Times
{
    public $sede, $continente;
}

class Clubes extends Times
{
    public $divisao, $rebaixado;
}

class ClubesAmadores extends Clubes
{
    public $patrocinador, $categoria;
}

$brasil = new Selecao("Brasil", 5, "América do Sul", "Carlo");
$brasil->sede = "2 vezes";
$brasil->continente = "América do Sul";

echo "Seleção: " . $brasil->nome;
echo "<br>";
echo " continente: " . $brasil->continente;
echo "<br>";
echo " titulos: " . $brasil->titulos;
echo "<br>";
echo " local: " . $brasil->local;
echo "<br>";
echo " tecnico: " . $brasil->tecnico;
echo "<br>";
echo " já foi sede: " . $brasil->sede;
echo "<br>";
"Hino: " .$brasil->hino("Ouviram do Ipiranga as margens plácidas
                De um povo heroico, o brado retumbante
                E o Sol da liberdade, em raios fúlgidos
                Brilhou no céu da pátria nesse instante");

echo "<br>";
$brasil->bandeira('<img src="img/brasil.webp" alt="brasil">');


echo "<hr>";


$cruzeiro = new Clubes("Cruzeiro", 5, "Minas Gerais", "Artur Jorge");
$cruzeiro->divisao = '1º divisão';
$cruzeiro->rebaixado = 'Siim, uma vez';

echo "Clube: " . $cruzeiro->nome;
echo "<br>";
echo " titulos: " . $cruzeiro->titulos;
echo "<br>";
echo " local: " . $cruzeiro->local;
echo "<br>";
echo " técnico: " . $cruzeiro->tecnico;
echo "<br>";
"Hino: " .$cruzeiro->hino("Existe um grande clube na cidade
                Que mora dentro do meu coração
                Eu vivo cheio de vaidade
                Pois na realidade é um grande campeão");

                
echo "<br>";
$brasil->bandeira('<img src="img/cruzeiro.webp" alt="brasil">');
echo "<hr>";
