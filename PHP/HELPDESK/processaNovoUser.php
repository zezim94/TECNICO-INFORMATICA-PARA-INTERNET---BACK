<?php
include 'verificaLogin.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $nome = trim($_POST['nome']);
    $email = trim($_POST['email']);
    $senha = trim($_POST['senha']);
    $nivel = trim($_POST['nivel']);

    $senhaHash = md5($senha);

    //$usuarios = file('../../../helpdesk/login.txt');
    $novoUser = fopen('../../../helpdesk/login.txt', 'a');
    $id = uniqid();

    fwrite($novoUser, $id . ';' . $nome . ';' . $nivel . ';' . $email . ';' . $senhaHash . PHP_EOL);

    fclose($novoUser);

    header('Location: usuarios.php');
    exit;
} else {
    header('Location: index.php');
    exit;
}
