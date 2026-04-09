<?php

class Animal
{
    public $cor = '';
    public $latir = '';
    public $estado = '';
    public $nome = '';


    function alterarAnimal()
    {
        return
            "Nome: $this->nome <br>
            Latir: $this->latir <br>
            Estado: $this->estado <br>
            Cor: $this->cor <br>";
    }

    function apresentaAnimal($cor, $latir, $estado, $nome)
    {
        $this->cor = $cor;
        $this->latir = $latir;
        $this->estado = $estado;
        $this->nome = $nome;
    }
}

$animal1 = new Animal();

$animal1->apresentaAnimal("Amarelo", "aain ain", "pulando", "Ralf");
echo $animal1->alterarAnimal();
echo "<hr>";
$animal1->apresentaAnimal("Preto", "au ain", "dormindo", "Peter");
echo $animal1->alterarAnimal();
