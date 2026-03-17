<?php

function conectaBanco()
{

    $host = 'localhost';
    $user = 'root';
    $pass = '';
    $db = 'helpdesk';

    $conn = mysqli_connect($host, $user, $pass, $db);

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    return $conn;
}

function exibirAlerta()
{
    $message = $_GET['message'] ?? '';

    $alerts = [
        'success' => ['texto' => 'Operação realizada com sucesso!', 'tipo' => 'success'],
        'error' => ['texto' => 'Ocorreu um erro!', 'tipo' => 'danger'],
        'updated' => ['texto' => 'Uuário atualizado com sucesso!', 'tipo' => 'success'],
        'deleted' => ['texto' => 'Usuário deletado com sucesso!', 'tipo' => 'success'],
        'insert' => ['texto' => 'Usuário adicionado com sucesso!', 'tipo' => 'success'],
    ];

    if (isset($alerts[$message])) {
        $alert = $alerts[$message];
        echo "<div class='alert alert-{$alert['tipo']}'>{$alert['texto']}</div>";
    }
}