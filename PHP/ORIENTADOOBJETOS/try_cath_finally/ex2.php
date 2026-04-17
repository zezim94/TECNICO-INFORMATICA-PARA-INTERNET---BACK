<?php
function conectar()
{
    try {

        $dsn = "mysql:host=localhost;dbname=e";
        $user = "root";
        $pass = "";

        $pdo = new PDO($dsn, $user, $pass);


        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        echo "Conexão feita com sucesso!";
    } catch (PDOException $e) {
        echo "Erro: " . $e->getMessage();
    } finally {
        echo "<br>Finalizado.<br>";
    }
}

conectar();
?>

<?php

function conecta()
{
    try {
        $dns = "mysql:host=localhost;dbname=praia";
        $user = "root";
        $pass = "";

        $pdo = new PDO($dns, $user, $pass);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        echo "Conexão feita com sucesso!";
    } catch (PDOException $e) {
        echo "Erro: " . $e->getMessage();
    } finally {
        echo "<br>Finalizado.<br>";
    }
}


conecta();
