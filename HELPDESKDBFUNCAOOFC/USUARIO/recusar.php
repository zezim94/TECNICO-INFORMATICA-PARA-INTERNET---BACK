<?php
include '../conexao.php';

$conn = conexao();

$id =  $_POST['id'];

$sql = "UPDATE user SET status = 2, nivel = 'user' WHERE id = :id";
$stmt = $conn->prepare($sql);

$resul = $stmt->execute([
    'id' => $id

]);

if ($resul) {

    header("Location: usuarios_pedidos.php");
} else {
    header("Location: usuarios_pedidos.php");
}
