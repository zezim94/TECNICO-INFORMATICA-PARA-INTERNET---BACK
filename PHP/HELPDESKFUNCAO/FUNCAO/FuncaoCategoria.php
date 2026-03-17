<?php

function buscarCategoriaPorId($conn, $id)
{

    $sql = 'SELECT * FROM categoria 

    WHERE id = ?';

    $stmt = mysqli_prepare($conn, $sql);

    if (!$stmt)
        return false;

    mysqli_stmt_bind_param($stmt, 'i', $id);

    $resul = mysqli_stmt_execute($stmt);

    mysqli_stmt_close($stmt);

    return $resul;
}

function buscarTodasCategorias($conn)
{
    $sql = 'SELECT * FROM categoria ORDER BY categoria';

    $stmt = mysqli_prepare($conn, $sql);

    if (!$stmt)
        return [];

    mysqli_stmt_execute($stmt);

    $resul = mysqli_stmt_get_result($stmt);

    $categorias = [];

    while ($categoria = mysqli_fetch_assoc($resul)) {

        $categorias[] = $categoria;

    }

    return $categorias;
}

function novaCategoria($conn, $categoria)
{

    $sql = 'INSERT INTO categoria (categoria) VALUES(?)';

    $stmt = mysqli_prepare($conn, $sql);

    if (!$stmt)
        return false;

    mysqli_stmt_bind_param($stmt, 's', $categoria);

    $resul = mysqli_stmt_execute($stmt);

    mysqli_stmt_close($stmt);

    return $resul;

}