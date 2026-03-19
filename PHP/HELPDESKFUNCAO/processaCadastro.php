<?php
require_once 'DB/conexao.php';
$conn = conectaBanco();

require_once 'FUNCAO/funcaoUsuario.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = $_POST['nome'];
    $usuario = $_POST['usuario'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    //   $senhaHash = password_hash($senha, PASSWORD_DEFAULT);

    if (cadastrotUsuario($conn, $nome, $usuario, $email, $senha)) {

        // echo  $senhaHash;
        // echo  $senha;
        header("Location: index.php?message=insert");
        exit;
    } else {
        header("Location: index.php?message=danger");
        exit;
    }
} else {
    header('Location: index.php');
}
