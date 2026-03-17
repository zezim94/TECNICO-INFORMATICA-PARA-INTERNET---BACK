<?php

require_once '../verificaLogin.php';

require_once '../DB/conexao.php';
$conn = conectaBanco();

require_once '../FUNCAO/funcaoUsuario.php';

$id = $_GET['id'] ?? null;

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if ($id && excluirUsuario($conn, $id)) {
        header('Location: usuarios.php?message=deleted');
        exit;
    } else {
        header('Location: usuarios.php?message=error');
        exit;
    }
}