<?php
session_start();

$email = $_POST['email'];
$senha = $_POST['senha'];

$usuarios = array(

    [
        'id' => 1,
        'perfil' => 'admin',
        'nome' => 'Andelson',
        'email' => 'andelsonascimento@gmail.com',
        'senha' => '123'
    ],
    [
        'id' => 2,
        'perfil' => 'user',
        'nome' => 'Andelson',
        'email' => 'admin@admin.com',
        'senha' => '1234'
    ],
    [
        'id' => 3,
        'perfil' => 'user',
        'nome' => 'Andelson',
        'email' => 'admin@admin.com',
        'senha' => '12345'
    ],
    [
        'id' => 4,
        'perfil' => 'user',
        'nome' => 'Andelson',
        'email' => 'admin@admin.com',
        'senha' => '12'
    ],
);


$usuario_autenticado = false;


foreach ($usuarios as $user) {

    if ($user['email'] == $email && $user['senha'] == $senha) {


        $_SESSION['perfil'] = $user['perfil'];
        $_SESSION['nome'] = $user['nome'];

        $usuario_autenticado = true;
    }

    if ($usuario_autenticado) {
        $_SESSION['autenticado'] = true;
        header("Location: home.php");

    } else {
        header("Location: index.php");
        $_SESSION['autenticado'] = false;
        $_SESSION['erro_login'] = 'Usuário ou senha inválidos';
    }
}
