<?php
require_once "basePerson.php";
require_once "classImag.php";

class Personagem extends Person implements Img
{

    public function pegarImagem()
    {
        return '<img src="" alt="">';
    }

    public function __set($atr, $valor)
    {

        return $this->$atr = $valor;
    }
    public function __get($valor)
    {

        return $this->$valor;
    }

     function session($tipo)
    {
        $_SESSION['personagem'] = $tipo;
        $_SESSION['img'] = $this->pegarImagem();
        $_SESSION['nome'] = $this->nome;
        $_SESSION['caracteristica'] = $this->caracteristica;
       
    }
}
