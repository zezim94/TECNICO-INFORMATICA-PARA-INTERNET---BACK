<?php

session_start();

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

    <form action="funcao.php" method="POST">
        <select name="personagem" id="personagem">
            <option value="#">Selecione um personagem</option>
            <option name="Pigsaw" value="Pigsaw">Pigsaw</option>
            <option name="Jason" value="Jason">Jason</option>
            <option name="Terrifier" value="Terrifier">Terrifier</option>
            <option name="It" value="It">It</option>
            <option name="Chucky" value="Chucky">Chucky</option>
            <option name="FreddyKrueger" value="FreddyKrueger">Freddy Krueger</option>

        </select>
        <button type="submit">Enviar</button>
    </form>

    <div class="exibir">

        <?php
        if (isset($_SESSION['img'])) {
            echo '<img src="' . $_SESSION['img'] . '" alt="" width="100px">';
        }

        if (isset($_SESSION['indentidade'])) {
            foreach ($_SESSION['indentidade'] as  $value) {
                foreach ($value as $key => $value) {
                    echo '<p>' . $key . ': ' . $value . '</p>';
                }
            }
        }

        if (isset($_SESSION['perfil'])) {
            foreach ($_SESSION['perfil'] as $value) {
                foreach($value as $key => $value){
                    echo '<p>'  . $value . '</p>';
                }
            }
        }
        ?>
    </div>

</body>

</html>