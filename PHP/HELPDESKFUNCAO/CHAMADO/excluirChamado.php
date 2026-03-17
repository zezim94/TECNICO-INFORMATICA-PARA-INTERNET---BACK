<?php

require_once '../verificaLogin.php';

require_once '../DB/conexao.php';
require_once '../FUNCAO/funcaoChamado.php';

$conn = conectaBanco();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $id = $_POST['id'];

    if (excluirChamado($conn, $id)) {
        header('Location: consultar_chamado.php?message=deleted');
        exit;
    }

    header('Location: consultar_chamado.php?message=error');
    exit;
} else {
    header('Location: home.php');
}