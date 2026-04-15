<?php

interface ligaDesliga
{
    public function liga();
    public function desliga();
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
}

$tv = new Eletronico();

echo $tv->liga();
echo "<br>";
echo $tv->desliga();
echo "<br>";
echo $tv->funcionando();
