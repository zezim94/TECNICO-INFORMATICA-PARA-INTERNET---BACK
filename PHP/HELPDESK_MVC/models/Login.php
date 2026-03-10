<?php
// CORREÇÃO: Remova o ../ pois a conexão será injetada ou incluída pelo index
// require_once 'DB/conexao.php'; // Se for necessário incluir aqui

class Login {
    private $conn;

    public function __construct($dbConnection) {
        $this->conn = $dbConnection;
    }

    public function autenticar($email, $senha) {
        $sql = "SELECT * FROM user WHERE email = ?";
        $stmt = mysqli_prepare($this->conn, $sql);
        mysqli_stmt_bind_param($stmt, "s", $email);
        mysqli_stmt_execute($stmt);

        $resultado = mysqli_stmt_get_result($stmt);

        if ($resultado && mysqli_num_rows($resultado) === 1) {
            $user = mysqli_fetch_assoc($resultado);
            if (password_verify($senha, $user['senha'])) {
                return $user;
            }
        }
        return false;
    }
}