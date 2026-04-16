<?php
require_once "basePerson.php";
require_once "classImag.php";

class Personagem extends Person implements Img
{

    public function pegarImagem()
    {
        return "<img src='img/img.jpg' alt='imagem'>";
    }

    public function __set($atr, $valor)
    {

        return $this->$atr = $valor;
    }
    public function __get($valor)
    {

        return $this->$valor;
    }
}
