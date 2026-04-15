<?php

interface ligaDesliga
{
    public function liga();
    public function desliga();

    public function status();
}


class Eletronico implements ligaDesliga
{

    public function liga()
    {
        return 'Liga';
    }

    public function desliga()
    {
        return 'Desliga';
    }

    public function funcionando()
    {
        return 'está funcionando';
    }

    public function status()
    {
        return 'Está em perfeito estado de novo';
    }
}

$tv = new Eletronico();

echo $tv->liga();
echo "<br>";
echo $tv->desliga();
echo "<br>";
echo $tv->funcionando();
echo "<br>";
echo $tv->status();
