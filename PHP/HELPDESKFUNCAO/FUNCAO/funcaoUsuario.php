<?php

function buscarPorId($conn, $id)
{
    $sql = "SELECT * FROM usuarios WHERE id = ?";

    $stmt = mysqli_prepare($conn, $sql);

    if (!$stmt)
        return false;

    mysqli_stmt_bind_param($stmt, 'i', $id);

    mysqli_stmt_execute($stmt);

    $resul = mysqli_stmt_get_result($stmt);

    $usuario = mysqli_fetch_assoc($resul);

    mysqli_stmt_close($stmt);

    return $usuario;

}

function buscarTodos($conn, $busca = null)
{

    if (!empty($busca)) {
        $sql = "SELECT * FROm usuarios WHERE nome like ? OR email like ?";

        $stmt = mysqli_prepare($conn, $sql);

        if (!$stmt)
            return false;

        $params = "%" . $busca . "%";

        mysqli_stmt_bind_param($stmt, 'ss', $params, $params);

    } else {
        $sql = "SELECT * from usuarios";

        $stmt = mysqli_prepare($conn, $sql);

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

function updateUsuario($conn, $id, $nome, $usuario, $email, $nivel, $senha = null)
{
    if (!empty($senha)) {

        $senhaHash = password_hash($senha, PASSWORD_DEFAULT);

        $sql = "UPDATE usuarios SET nome = ?, usuario = ?, email = ?, nivel = ?, senha = ? WHERE id = ?";

        $stmt = mysqli_prepare($conn, $sql);

        if (!$stmt)
            return false;

        mysqli_stmt_bind_param($stmt, 'sssssi', $nome, $usuario, $email, $nivel, $senhaHash, $id);

    } else {
        $sql = 'UPDATE usuarios SET nome = ?, usuario = ?, email = ?, nivel = ? WHERE id = ?';

        $stmt = mysqli_prepare($conn, $sql);

        if (!$stmt)
            return false;

        mysqli_stmt_bind_param($stmt, 'ssssi', $nome, $usuario, $email, $nivel, $id);
    }

    $resul = mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    return $resul;
}


function excluirUsuario($conn, $id){
    $sql = 'DELETE FROM usuarios WHERE id = ?';

    $stmt = mysqli_prepare($conn, $sql);

    if(!$stmt) return false;

    mysqli_stmt_bind_param($stmt, 'i', $id);

    $resul = mysqli_stmt_execute($stmt);

    mysqli_stmt_close($stmt);

    return $resul;
}

function insertUsuario($conn, $nome, $usuario, $email, $nivel, $senha){

    $senhaHash = password_hash($senha, PASSWORD_DEFAULT);

    $sql = 'INSERT INTO usuarios (nome, usuario, email, senha, nivel) VALUES(?, ?, ?, ?, ?)';

    $stmt = mysqli_prepare($conn, $sql);

    if(!$stmt) return false;

    mysqli_stmt_bind_param($stmt, 'sssss', $nome, $usuario, $email, $senhaHash, $nivel);

    $resul = mysqli_stmt_execute($stmt);

    mysqli_stmt_close($stmt);

    return $resul;
}

function cadastrotUsuario($conn, $nome, $usuario, $email, $senha){

    $senhaHash = password_hash($senha, PASSWORD_DEFAULT);

    $sql = 'INSERT INTO usuarios (nome, usuario, email, senha) VALUES(?, ?, ?, ?)';

    $stmt = mysqli_prepare($conn, $sql);

    if(!$stmt) return false;

    mysqli_stmt_bind_param($stmt, 'ssss', $nome, $usuario, $email, $senhaHash);

    $resul = mysqli_stmt_execute($stmt);

    mysqli_stmt_close($stmt);

    return $resul;
}