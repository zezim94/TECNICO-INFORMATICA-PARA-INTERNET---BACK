<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cinema</title>
</head>

<body>
    <h1>Avatar: Fogo e Cinzas</h1>

    <form action="processa.php" method="POST">

        <label for="name">Nome:</label>
        <input type="text" id="name" name="name" required>
        <br><br>
        <label for="idade">Idade:</label>
        <input type="number" id="idade" name="idade" required>
        <br><br>
        <label for="sexo">Sexo:</label>
        <input type="radio" id="sexo" name="sexo" value="Masculino">
        <label for="sexo">Masculino</label>
        <input type="radio" id="sexo" name="sexo" value="Feminino">
        <label for="sexo">Feminino</label>
        <br><br>
        <label for="nota">O que você achou do filme?</label>
        <select name="nota" id="nota">
            <option value="1">Excelente</option>
            <option value="2">Bom</option>
            <option value="3">Regular</option>
            <option value="4">Péssimo</option>
        </select>
        <br><br>
        <input type="submit" value="Enviar">
    </form>


</body>

</html>