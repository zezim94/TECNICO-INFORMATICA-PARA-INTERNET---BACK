<?php
session_start();
require_once 'DB/conexao.php';

$conn = conectaBanco();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $email = $_POST['email'];
    $senha = $_POST['senha'];

    // 🔒 Buscar apenas pelo email
    $sql = "SELECT * FROM user WHERE email = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "s", $email);
    mysqli_stmt_execute($stmt);

    $resultado = mysqli_stmt_get_result($stmt);

    if ($resultado && mysqli_num_rows($resultado) === 1) {

        $linha = mysqli_fetch_assoc($resultado);

        // 🔐 Verifica senha hash
        if (password_verify($senha, $linha['senha'])) {

            session_regenerate_id(true);

            $_SESSION['logado'] = true;
            $_SESSION['nome'] = $linha['nome'];
            $_SESSION['id'] = $linha['id'];
            $_SESSION['nivel'] = $linha['nivel'];

            header('Location: home.php');
            exit;
        }
    }

    // ❌ Login inválido
   
    header('Location: index.php?login=invalido');
    exit;

} else {
    header('Location: index.php');
    exit;
}