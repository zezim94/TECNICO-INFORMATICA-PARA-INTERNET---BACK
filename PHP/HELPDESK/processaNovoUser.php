<?php
include 'verificaLogin.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $nome = trim($_POST['nome']);
    $email = trim($_POST['email']);
    $senha = trim($_POST['senha']);
    $nivel = trim($_POST['nivel']);

    //$usuarios = file('../../../helpdesk/login.txt');
    $novoUser = fopen('../../../helpdesk/login.txt', 'a');
    $qtd = file('../../../helpdesk/login.txt');
    $id = count($qtd) + 1;

    fwrite($novoUser, $id . ';' . $nome . ';' . $nivel . ';' . $email . ';' . $senha . PHP_EOL);

    fclose($novoUser);

    header('Location: home.php');
    exit;
} else {
    header('Location: index.php');
    exit;
}
