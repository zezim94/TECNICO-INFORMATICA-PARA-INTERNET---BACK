<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ficha Completa</title>
</head>

<body>

    <?php

    $name = "Andelson";
    $age = 31;
    $cidade = "Cubatão";
    $salario = 20000;

    echo "<hr>";

    $ficha = "Meu nome é {$name} e tenho {$age} anos, moro em {$cidade} e ganho R$ {$salario},00 por mes";

    echo $ficha;

    echo "<hr>";

    $ficha2 = "Meu nome é " . $name . " e tenho " . $age . " anos, moro em " . $cidade . " e ganho R$ " . $salario . ",00 por mes";

    echo $ficha2;

    echo "<hr>";

    $ficha3 = "Meu nome é: <strong> {$name} </strong>\n";
    $ficha3 .= "Tenho {$age} anos\n";
    $ficha3 .= "Moro em {$cidade}\n";
    $ficha3 .= "Ganho R$ {$salario},00 por mes\n";

    echo $ficha3 ?? "nao existe";

    echo "<hr>";

    $ficha4 = "Meu nome é: <strong> {$name} </strong>, tenho {$age} anos, moro em {$cidade} e ganho R$ {$salario},00 por mes";

    echo $ficha4 ?? "nao existe";

    ?>

</body>

</html>