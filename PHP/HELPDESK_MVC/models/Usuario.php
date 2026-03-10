<?php

class Usuario
{
    private $conn;

    public function __construct($dbConection)
    {
        $this->conn = $dbConection;
    }

    public function buscarPorId($id)
    {
        $sql = "SELECT * FROM user WHERE id = ?";

        $stmt = mysqli_prepare($this->conn, $sql);

        if (!$stmt)
            return false;

        mysqli_stmt_bind_param($stmt, 'i', $id);

        mysqli_stmt_execute($stmt);

        $resul = mysqli_stmt_get_result($stmt);

        $usuario = mysqli_fetch_assoc($resul);

        mysqli_stmt_close($stmt);

        return $usuario;

    }

    public function buscarTodos($busca = null)
    {

        if (!empty($busca)) {
            $sql = "SELECT * FROm user WHERE nome like ? OR email like ?";

            $stmt = mysqli_prepare($this->conn, $sql);

            if (!$stmt)
                return false;

            $params = "%" . $busca . "%";

            mysqli_stmt_bind_param($stmt, 'ss', $params, $params);

        } else {
            $sql = "SELECT * from user";

            $stmt = mysqli_prepare($this->conn, $sql);

            if (!$stmt)
                return false;

        }

        if (!mysqli_stmt_execute($stmt))
            return false;

        $resul = mysqli_stmt_get_result($stmt);

        $usuarios = [];

        while ($row = mysqli_fetch_assoc($resul)) {
            $usuarios[] = $row;
        }

        mysqli_stmt_close($stmt);

        return $usuarios;
    }

    public function atualizar($id, $nome, $usuario, $email, $nivel, $senha = null)
    {
        if (!empty($senha)) {

            $senhaHash = password_hash($senha, PASSWORD_DEFAULT);

            $sql = "UPDATE user SET nome = ?, usuario = ?, email = ?, nivel = ?, senha = ? WHERE id = ?";

            $stmt = mysqli_prepare($this->conn, $sql);

            if (!$stmt)
                return false;

            mysqli_stmt_bind_param($stmt, 'sssssi', $nome, $usuario, $email, $nivel, $senhaHash, $id);

        } else {
            $sql = 'UPDATE user SET nome = ?, usuario = ?, email = ?, nivel = ? WHERE id = ?';

            $stmt = mysqli_prepare($this->conn, $sql);

            if (!$stmt)
                return false;

            mysqli_stmt_bind_param($stmt, 'ssssi', $nome, $usuario, $email, $nivel, $id);
        }

        $resul = mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);

        return $resul;
    }
    public function excluirUsuario($id)
    {
        $sql = 'DELETE FROM user WHERE id = ?';

        $stmt = mysqli_prepare($this->conn, $sql);

        if (!$stmt)
            return false;

        mysqli_stmt_bind_param($stmt, 'i', $id);

        $resul = mysqli_stmt_execute($stmt);

        mysqli_stmt_close($stmt);

        return $resul;
    }

    public function insertUsuario($nome, $usuario, $email, $nivel, $senha)
    {

        $senhaHash = password_hash($senha, PASSWORD_DEFAULT);

        $sql = 'INSERT INTO user (nome, usuario, email, senha, nivel) VALUES(?, ?, ?, ?, ?)';

        $stmt = mysqli_prepare($this->conn, $sql);

        if (!$stmt)
            return false;

        mysqli_stmt_bind_param($stmt, 'sssss', $nome, $usuario, $email, $senhaHash, $nivel);

        $resul = mysqli_stmt_execute($stmt);

        mysqli_stmt_close($stmt);

        return $resul;
    }
}