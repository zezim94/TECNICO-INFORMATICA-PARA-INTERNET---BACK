<?php
session_start();
?>


<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Cinema</title>
</head>

<body>

    <div class="container">


        <h1>Avatar: Fogo e Cinzas</h1>

        <form action="processa.php" method="POST">

            <div class="group">
                <label for="name">Nome:</label>
                <input type="text" id="name" name="name" required>
            </div>

            <div class="group">
                <label for="idade">Idade:</label>
                <input type="number" id="idade" name="idade" required>
            </div>

            <div class="group">

                <label>Sexo:</label>
                <div class="sexo">
                    <input type="radio" id="sexom" name="sexo" value="Masculino">
                    <label for="sexom">Masculino</label>
                    <input type="radio" id="sexof" name="sexo" value="Feminino">
                    <label for="sexof">Feminino</label>
                </div>
            </div>

            <div class="group">
                <label for="nota">O que você achou do filme?</label>
                <select name="nota" id="nota">
                    <option value="excelente">Excelente</option>
                    <option value="bom">Bom</option>
                    <option value="regular">Regular</option>
                    <option value="pessimo">Péssimo</option>
                </select>
            </div>
            <input type="submit" value="Enviar">
        </form>



        <div class="resultado">

            <?php


            if (isset($_SESSION['dados'])) { ?>

                <h2>Resultado</h2>

                <h3>Total de Pessoas: </h3>
                <p><?php echo $_SESSION['totalPessoas']; ?></p>
                <h3>Total Idade:</h3>
                <p><?php echo $_SESSION['totalIdade']; ?></p>
                <h3>Média Idade:</h3>
                <p><?php echo $_SESSION['mediaIdade']; ?></p>

                <h3>Total Homens:</h3>
                <p><?php echo $_SESSION['totalMas']; ?></p>
                <h3>Total Mulheres:</h3>
                <p><?php echo $_SESSION['totalFem']; ?></p>
                <h3>Masculino:</h3>
                <p><?php echo $_SESSION['mas']; ?>%</p>
                <h3>Feminino:</h3>
                <p><?php echo $_SESSION['fem']; ?>%</p>

                <h3>Excelente:</h3>
                <p><?php echo $_SESSION['excelente']; ?>%</p>
                <h3>Bom:</h3>
                <p><?php echo $_SESSION['bom']; ?>%</p>
                <h3>Regular:</h3>
                <p><?php echo $_SESSION['regular']; ?>%</p>
                <h3>Péssimo:</h3>
                <p><?php echo $_SESSION['pessimo']; ?>%</p>

            <?php
            }
            ?>
        </div>
    </div>

</body>

</html>