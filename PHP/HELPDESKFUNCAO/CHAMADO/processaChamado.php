<?php

require_once '../verificaLogin.php';
require_once '../DB/conexao.php';

require_once '../FUNCAO/funcaoChamado.php';


$conn = conectaBanco();


if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $titulo = $_POST['titulo'];
    $categoria = $_POST['categoria'];
    $descricao = $_POST['descricao'];
    $userId = $_SESSION['id'];

    if (abrirChamado($conn, $titulo, $categoria, $descricao, $userId)) {
        header('Location: consultar_chamado.php?message=success');
        exit;
    }

    header('Location: consultar_chamado.php?message=error');
    exit;
    
} else {
    header('Location: ../home.php');
    exit;
}