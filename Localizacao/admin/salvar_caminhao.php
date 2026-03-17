<?php

include "../config/conexao.php";

$nome = $_POST['nome'];
$placa = $_POST['placa'];
$motorista = $_POST['motorista'];
$status = $_POST['status'];

$sql = "INSERT INTO caminhoes
(nome,placa,motorista,status)
VALUES
('$nome','$placa','$motorista','$status')";

$conn->query($sql);

header("Location: caminhoes.php");