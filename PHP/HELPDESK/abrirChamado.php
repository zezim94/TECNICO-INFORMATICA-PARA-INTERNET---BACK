<?php
include('verificaLogin.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $titulo = $_POST['titulo'];
    $categoria = $_POST['categoria'];
    $descricao = $_POST['descricao'];


    $_SESSION['titulo'] = $titulo;
    $_SESSION['categoria'] = $categoria;
    $_SESSION['descricao'] = $descricao;

    header('Location: home.php');
   
} else {
    header('Location: abrir_chamado.php');
}
