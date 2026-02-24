<?php
$matriz = [
    [1, 2, 3],
    [4, 5, 6],
    [7, 8, 9]
];
?>

<!-- Instruções
Podem usar o PROMPT/ALERT ou usar o getElementsById.
Crie um algoritmo que leia uma matriz 4X4 de valores inteiros (pode ciar a matriz em uma CONST - igual ao exemplo de aula) e exiba os elementos da matriz. Utilize duas estruturas de repetição FOR

Crie um algoritmo que leia uma matriz 3X3 de valores inteiros (pode ciar a matriz em uma CONST - igual ao exemplo de aula) e exiba a soma dos elementos das linhas da matriz. Utilize duas estruturas de repetição FOR
Matriz exemplo
3 - 2 - 1
5 - 9 - 3
2 - 8  - 1

Resposta esperada
Linha 1 Soma = 6
Linha 2 Soma = 17
Linha 3 Soma = 11


Crie um algoritmo que leia uma matriz 5X3 de valores reais e exiba a médias (de todos) dos elementos da matriz

Crie um algoritmo que leia uma matriz 6x2 e exiba quantos elementos maiores do que 5 existem na matriz. Utilize duas estruturas de repetição FOR

Crie um algoritmo que leia uma matriz 5X5 de valores inteiros e exiba a soma (de todos) dos elementos da matriz. Utilize duas estruturas de repetição FOR -->

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Matriz</title>
</head>

<body>

    <h1>Matriz</h1>

    <?php
    for ($i = 0; $i < count($matriz); $i++) {          // percorre linhas
        for ($j = 0; $j < count($matriz[$i]); $j++) {  // percorre colunas
            echo $matriz[$i][$j] . " " ;
            
        }
        echo "<br>";
    }
    ?>

</body>

</html>