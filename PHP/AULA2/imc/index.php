<?php
session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IMC</title>
</head>

<body>

<?php

$nome = $_GET['nome'] ?? "";
$peso = $_GET['peso'] ?? "";
$altura = $_GET['altura'] ?? "";

?>

<?php
if (isset($_SESSION['erro'])) {
    echo "<p style='color: red;'>" . $_SESSION['erro'] . "</p>";
    unset($_SESSION['erro']);
}
?>

    <form action="processa.php" method="GET">
        <label for="nome">Nome:</label>
        <input type="text" name="nome" id="nome" placeholder="Digite seu nome" value="<?php echo $nome; ?>">
        <br>
        <label for="peso">Peso:</label>
        <input type="number" name="peso" id="peso" step="0.01" placeholder="Digite seu peso" value="<?php echo $peso; ?>">
        <br>
        <label for="altura">Altura:</label>
        <input type="number" name="altura" id="altura" step="0.01" placeholder="Digite sua altura" value="<?php echo $altura; ?>">
        <br>
        <button type="submit">Calcular</button>
    </form>

    <?php
    if (isset($_GET['classificacao'])) {
        echo "<p>" . $_GET['nome'] . " seu IMC é: " . $_GET['imc'] . "</p>";
        echo "<p>" . $_GET['classificacao'] . "</p>";
    }
    ?>

</body>

</html>