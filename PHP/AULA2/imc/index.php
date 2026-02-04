<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IMC</title>
</head>

<body>

    <form action="processa.php" method="GET">
        <label for="nome">Nome:</label>
        <input type="text" name="nome" id="nome" placeholder="Digite seu nome">
        <br>
        <label for="peso">Peso:</label>
        <input type="number" name="peso" id="peso" step="0.01" placeholder="Digite seu peso">
        <br>
        <label for="altura">Altura:</label>
        <input type="number" name="altura" id="altura" step="0.01" placeholder="Digite sua altura">
        <br>
        <button type="submit">Calcular</button>
    </form>

</body>

</html>