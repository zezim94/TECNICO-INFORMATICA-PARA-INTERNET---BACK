<style>
    body {
        background-color: #103e69ff;
        color: #fff;
        font-weight: bold;
        font-size: 24px;
    }
</style>

<?php

class Pessoa
{
    public $nome;
    private $idade;
    protected $clube;
    private  $senha = 123;
    public $bandeira = "<img src='img/brasil.webp' alt='brasil' width=150px>";

    public function getNome($nome)
    {
        return $this->nome = $nome;
    }

    public function getIdade($idade)
    {
        return $this->idade = $idade;
    }

    public function getClube($clube)
    {
        return $this->clube = $clube;
    }

    public function __set($atributo, $valor)
    {
        $this->$atributo = $valor;
    }

    public function __get($valor)
    {
        return $this->$valor;
    }

    protected function idade()
    {
        return $this->idade;
    }

    private function clube()
    {
        return $this->clube;
    }

    public function senha()
    {
        return $this->senha;
    }

    public function bandeira(){
        return $this->bandeira;
    }

    public function apresentaPessoa()
    {
        $num = rand(1, 9);

        if ($num > 4 && $num < 8) {
            return "Nome: " . $this->getNome('Sarah') . "<br>" .  "Idade: " . $this->idade();
        } else {
            return "Idade: " . $this->getIdade(24) . "<br>" . "Clube: " . $this->clube();
        }
    }

    public function verifica()
    {
        $nome = $this->nome;

        if (strlen($nome) >= 6) {
            return "Sua senha é: " . $this->senha();
        } else {
            return "Acesso inválido";
        }
    }
}


$p1 = new Pessoa;

echo $p1->getNome("João");
echo "<br>";
echo $p1->getIdade(15);
echo "<br>";
echo $p1->getClube("Brasil");
echo "<hr>";

$p1->__set("nome", "Joanas");
$p1->__set("idade", 20);
$p1->__set("clube", "Brasil");

echo "Nome: " . $p1->__get("nome");
echo "<br>";
echo "Idade: " . $p1->__get("idade");
echo "<br>";
echo "Clube: " . $p1->__get("clube");
echo "<br>";
echo $p1->bandeira();

echo "<hr>";

echo $p1->apresentaPessoa();
echo "<br>";
echo $p1->verifica();
