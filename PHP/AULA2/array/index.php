<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Array</title>
</head>

<body>

    <?php
    $array = array("nome" => "Andelson", "idade" => 31, "cidade" => "Cubatão");
    print_r($array);
    echo "<br>";

    foreach ($array as $key => $value) {
        echo $key . " : " . $value . "<br>";
    }

    echo "<hr>";

    $cidade = ["Cubatão", "São Paulo", "Rio de Janeiro", "Santos", "Guarulhos"];

    print_r($cidade);

    echo "<br>";

    foreach ($cidade as $value) {
        echo $value . "<br>";
    }

    echo "<hr>";

    $animais = ["gato", "cachorro", "pássaro", "pescoco", "coelho", "pato", "girafa", "porco", "ovelha", "abelha"];
    echo "Animais: <br>";
    foreach ($animais as $animal) {
        echo $animal  . "<br>";
    }

    ?>

</body>

</html>