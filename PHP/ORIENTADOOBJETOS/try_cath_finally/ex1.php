<?php

function dividir($n1, $n2)
{

    try { // primeiro tenta executar o try
        if ($n2 === 0) {
            throw new Exception("Não pode dividir por $n2! <br>"); // cria uma exceção
            // $resul = $n1 / $n2;

            // echo $resul;
        }

        $resul = $n1 / $n2;

        echo $resul;
    } catch (Exception $e) { // caso der erro cai aqui
        echo "Error: " . $e->getMessage();
    } finally { // esse é sempre executado
        echo "<br> Finalizado <br>";
        echo "################";
        echo "<br> <br>";
    }
}

// nesse caso aqui não vai cair no catch pois tem um if no try que pega o erro (cria uma exceção)
dividir(10, 0);

dividir(186, 15);
dividir(90, 7);
