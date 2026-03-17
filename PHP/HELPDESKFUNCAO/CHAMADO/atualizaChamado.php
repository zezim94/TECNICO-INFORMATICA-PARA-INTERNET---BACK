<?php
require_once('../verificaLogin.php');
require_once '../DB/conexao.php';
require_once '../FUNCAO/funcaoChamado.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $conn = conectaBanco();

    $idChamado = $_POST['id'];
    $titulo = $_POST['titulo'];
    $idCategoria = $_POST['categoria'];
    $descricao = $_POST['descricao'];
    $preco = $_POST['preco'];

    if (atualizaChamado($conn, $titulo, $idCategoria, $descricao, $preco, $idChamado)) {
        header('Location: consultar_chamado.php?message=success');
        exit;
    }

    header('Location: consultar_chamado.php?message=error');
    exit;

} else {
    header('Location: home.php');
}