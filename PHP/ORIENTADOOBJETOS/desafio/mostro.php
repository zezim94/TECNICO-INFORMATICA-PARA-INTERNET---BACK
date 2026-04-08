<?php

session_start();


class Monstro
{
    private $img;
    private $nome;
    private $descricao;
    private $caracteristicas;
    private $resumo;

    function __construct($img, $nome, $descricao, $caracteristicas, $resumo)
    {
        $this->img = $img;
        $this->nome = $nome;
        $this->descricao = $descricao;
        $this->caracteristicas = $caracteristicas;
        $this->resumo = $resumo;
    }

    function session()
    {
        $_SESSION['img'] = $this->img;
        $_SESSION['nome'] = $this->nome;
        $_SESSION['descricao'] = $this->descricao;
        $_SESSION['caracteristicas'] = $this->caracteristicas;
        $_SESSION['resumo'] = $this->resumo;
    }
}


