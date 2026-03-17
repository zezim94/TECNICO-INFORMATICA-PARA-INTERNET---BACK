<?php

require_once '../DB/conexao.php';
$conn = conectaBanco();

require_once '../FUNCAO/FuncaoCategoria.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $categoria = $_POST['categoria'];
    novaCategoria($conn, $categoria);
    header('Location: abrir_chamado.php?message=success');
    exit;
} else{
    header('Location: abrir_chamado.php?message=error');
    exit;
}