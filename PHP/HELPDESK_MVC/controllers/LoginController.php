<?php

class LoginController
{
    private $login;

    public function __construct($conn)
    {
        // Como o index.php está em public/, subimos um nível para achar models/
        require_once '../models/Login.php';
        $this->login = new Login($conn);
    }

    public function logar()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $email = $_POST['email'];
            $senha = $_POST['senha'];

            $usuario = $this->login->autenticar($email, $senha);

            if ($usuario) {
                // Não chame session_start() aqui, o index.php já chamou
                $_SESSION['logado'] = true;
                $_SESSION['nome'] = $usuario['nome'];
                $_SESSION['id'] = $usuario['id'];
                $_SESSION['nivel'] = $usuario['nivel'];

                // Redireciona para a ação home do próprio roteador
                header('Location: index.php?acao=home');
                exit;
            } else {
                // Enviamos 'erro=invalido' para a URL
                header('Location: index.php?acao=login&erro=invalido');
                exit;
            }
        }
    }

    public function logout()
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        $_SESSION = [];           // limpa variáveis
        session_unset();          // remove variáveis registradas
        session_destroy();        // destrói sessão

        header('Location: index.php?acao=login');
        exit;
    }
}