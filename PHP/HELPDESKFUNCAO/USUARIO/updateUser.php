<?php
require_once '../verificaLogin.php';
require_once '../DB/conexao.php';
$conn = conectaBanco();
require_once '../FUNCAO/funcaoUsuario.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $id = (int) $_POST['id'];
    $nome = $_POST['nome'];
    $usuario = $_POST['usuario'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $nivel = $_POST['nivel'];


    if (updateUsuario($conn, $id, $nome, $usuario, $email, $nivel, $senha = null)) {
        header("Location: usuarios.php?message=updated");
        exit;
    } else {
        header("Location: usuarios.php?message=error");
        exit;
    }




} else {
    header("Location: index.php");
    session_destroy();
    exit;
}