<?php
require_once 'DB/conexao.php';
$conn = conectaBanco();

require_once 'FUNCAO/funcaoUsuario.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = $_POST['nome'];
    $usuario = $_POST['usuario'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    if (cadastrotUsuario($conn, $nome, $usuario, $email, $nivel, $senha)) {
        header("Location: index.php?message=insert");
        exit;
    } else {
        header("Location: index.php?message=danger");
        exit;
    }
} else {
    header('Location: index.php');
}
