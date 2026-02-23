<?php
session_start();
$selecionado = $_SESSION['personagem'] ?? '';
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Personagens</title>
</head>

<body>

    <div class="container">
        <form action="funcao.php" method="POST">
            <select name="personagem" id="personagens">
                <option value="">Selecione um personagem...</option>
                <option value="FreddyKrueger" <?= $selecionado == 'FreddyKrueger' ? 'selected' : '' ?>>Freddy Krueger
                </option>
                <option value="JasonVoorhees" <?= $selecionado == 'JasonVoorhees' ? 'selected' : '' ?>>Jason Voorhees
                </option>
                <option value="MichaelMyers" <?= $selecionado == 'MichaelMyers' ? 'selected' : '' ?>>Michael Myers</option>
                <option value="Pennywise" <?= $selecionado == 'Pennywise' ? 'selected' : '' ?>>Pennywise</option>
                <option value="Chucky" <?= $selecionado == 'Chucky' ? 'selected' : '' ?>>Chucky</option>
                <option value="Leatherface" <?= $selecionado == 'Leatherface' ? 'selected' : '' ?>>Leatherface</option>
                <option value="Ghostface" <?= $selecionado == 'Ghostface' ? 'selected' : '' ?>>Ghostface</option>
                <option value="ReganMacNeil" <?= $selecionado == 'ReganMacNeil' ? 'selected' : '' ?>>Regan MacNeil</option>
                <option value="Annabelle" <?= $selecionado == 'Annabelle' ? 'selected' : '' ?>>Annabelle</option>
                <option value="SamaraMorgan" <?= $selecionado == 'SamaraMorgan' ? 'selected' : '' ?>>Samara Morgan</option>
            </select>
            <input type="submit" value="Enviar">
        </form>

        <div class="exibir">
            <?php

            if (isset($_SESSION['img'])) { ?>
                <div class="img">
                    <img src=" <?= $_SESSION['img'] ?> " alt=" <?= $_SESSION['nome'] ?> ">

                    <div class="nome">
                        <p> <?= $_SESSION['nome'] ?> </p>
                    </div>
                </div>

                <div class="detalhes">
                    <div class="descricao">
                        <h3>Descrição:</h3>
                        <p> <?= $_SESSION['descricao'] ?> </p>
                    </div>

                    <div class="caracteristicas">
                        <h3>Caracteristicas:</h3>
                        <p> <?php
                        foreach ($_SESSION['caracteristicas'] as $value) {
                            foreach ($value as $v) {
                                echo $v . "<br>";
                            }
                        }

                        ?> </p>
                    </div>

                    <div class="resumo">
                        <h3>Resumo:</h3>
                        <p> <?= $_SESSION['resumo'] ?> </p>
                    </div>
                </div>

                <?php
            }

            ?>
        </div>
    </div>

</body>

</html>