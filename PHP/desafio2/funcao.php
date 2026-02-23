<?php

session_start();

$personagem = $_POST['personagem'];

function freddyKrueger($dados)
{

    $img = 'img/FreddyKrueger.webp';

    $nome = 'Freddy Krueger';

    $descricao = 'Assassino que ataca suas vítimas nos sonhos.';

    $caracteristicas[] = [
        '1' => 'Rosto queimado',
        '2' => 'Suéter listrado vermelho e verde',
        '3' => 'Chapéu fedora',
        '4' => 'Luva com lâminas'
    ];

    $resumo = 'Após ser morto por pais vingativos, Freddy retorna como entidade sobrenatural que mata adolescentes enquanto dormem, na franquia A Hora do Pesadelo.';

    $_SESSION['img'] = $img;
    $_SESSION['nome'] = $nome;
    $_SESSION['descricao'] = $descricao;
    $_SESSION['caracteristicas'] = $caracteristicas;
    $_SESSION['resumo'] = $resumo;
    $_SESSION['personagem'] = 'FreddyKrueger';

    header('Location: index.php');
}

function jasonVoorhees($dados)
{

    $img = 'img/JasonVoorhees.avif';

    $nome = 'Jason Voorhees';

    $descricao = 'Assassino silencioso do acampamento Crystal Lake.';

    $caracteristicas[] = [
        '1' => 'Máscara de hóquei',
        '2' => 'força sobre-humana',
        '3' => 'uso de facão'
    ];

    $resumo = 'Considerado morto quando criança, Jason retorna para se vingar de todos que se aproximam do lago onde teria se afogado.';

    $_SESSION['img'] = $img;
    $_SESSION['nome'] = $nome;
    $_SESSION['descricao'] = $descricao;
    $_SESSION['caracteristicas'] = $caracteristicas;
    $_SESSION['resumo'] = $resumo;
    $_SESSION['personagem'] = 'JasonVoorhees';

    header('Location: index.php');
}

function michaelMyers($dados)
{

    $img = 'img/MichaelMyers.jpg';

    $nome = 'Michael Myers';

    $descricao = 'Assassino mascarado conhecido como “A Forma”';

    $caracteristicas[] = [
        '1' => 'Máscara branca sem expressão',
        '2' => 'fmacacão azul',
        '3' => 'comportamento silencioso.'
    ];

    $resumo = 'Após matar a própria irmã quando criança, escapa de um hospital psiquiátrico e passa a perseguir Laurie Strode.';

    $_SESSION['img'] = $img;
    $_SESSION['nome'] = $nome;
    $_SESSION['descricao'] = $descricao;
    $_SESSION['caracteristicas'] = $caracteristicas;
    $_SESSION['resumo'] = $resumo;
    $_SESSION['personagem'] = 'MichaelMyers';

    header('Location: index.php');
}

function pennywise($dados)
{
    $img = 'img/Pennywise.jpg';

    $nome = 'Pennywise';

    $descricao = 'Entidade cósmica que assume a forma de palhaço.';

    $caracteristicas[] = [
        '1' => 'Balão vermelho',
        '2' => 'sorriso macabro',
        '3' => 'manipulação de medos'
    ];

    $resumo = 'Em It, aterroriza as crianças da cidade de Derry, alimentando-se do medo delas.';

    $_SESSION['img'] = $img;
    $_SESSION['nome'] = $nome;
    $_SESSION['descricao'] = $descricao;
    $_SESSION['caracteristicas'] = $caracteristicas;
    $_SESSION['resumo'] = $resumo;
    $_SESSION['personagem'] = 'Pennywise';

    header('Location: index.php');
}

function chucky($dados)
{

    $img = 'img/Chucky.jpeg';

    $nome = 'Chucky';

    $descricao = 'Boneco possuído por um assassino em série.';

    $caracteristicas[] = [
        '1' => 'Aparência infantil',
        '2' => 'faca na mão',
        '3' => 'humor sarcástico'
    ];

    $resumo = 'O espírito do criminoso Charles Lee Ray transfere sua alma para um boneco, iniciando uma série de assassinatos.';

    $_SESSION['img'] = $img;
    $_SESSION['nome'] = $nome;
    $_SESSION['descricao'] = $descricao;
    $_SESSION['caracteristicas'] = $caracteristicas;
    $_SESSION['resumo'] = $resumo;
    $_SESSION['personagem'] = 'Chucky';

    header('Location: index.php');
}

function leatherface($dados)
{

    $img = 'img/Leatherface.webp';

    $nome = 'Leatherface';

    $descricao = 'Assassino canibal do interior do Texas.';

    $caracteristicas[] = [
        '1' => 'Máscara feita de pele humana',
        '2' => 'motosserrra',
        '3' => 'comportamento brutal'
    ];

    $resumo = 'Membro de uma família perturbada, caça viajantes que cruzam seu caminho.';

    $_SESSION['img'] = $img;
    $_SESSION['nome'] = $nome;
    $_SESSION['descricao'] = $descricao;
    $_SESSION['caracteristicas'] = $caracteristicas;
    $_SESSION['resumo'] = $resumo;
    $_SESSION['personagem'] = 'Leatherface';

    header('Location: index.php');
}

function ghostface($dados)
{

    $img = 'img/Ghostface.jpg';

    $nome = 'Ghostface';

    $descricao = 'Assassino mascarado da franquia Pânico.';

    $caracteristicas[] = [
        '1' => 'Máscara branca alongada',
        '2' => 'manto preto',
        '3' => 'ligações ameaçadoras'
    ];

    $resumo = 'Diferentes pessoas assumem a identidade de Ghostface para cometer assassinatos inspirados em filmes de terror.';

    $_SESSION['img'] = $img;
    $_SESSION['nome'] = $nome;
    $_SESSION['descricao'] = $descricao;
    $_SESSION['caracteristicas'] = $caracteristicas;
    $_SESSION['resumo'] = $resumo;
    $_SESSION['personagem'] = 'Ghostface';

    header('Location: index.php');
}

function reganMacNeil($dados)
{

    $img = 'img/ReganMacNeil.jpg';

    $nome = 'Regan MacNeil';

    $descricao = 'Menina possuída por uma entidade demoníaca.';

    $caracteristicas[] = [
        '1' => 'Voz alterada',
        '2' => 'comportamento agressivo',
        '3' => 'fenômenos sobrenaturais'
    ];

    $resumo = 'Em O Exorcista, sua possessão leva dois padres a realizarem um exorcismo dramático.';

    $_SESSION['img'] = $img;
    $_SESSION['nome'] = $nome;
    $_SESSION['descricao'] = $descricao;
    $_SESSION['caracteristicas'] = $caracteristicas;
    $_SESSION['resumo'] = $resumo;
    $_SESSION['personagem'] = 'ReganMacNeil';

    header('Location: index.php');
}

function annabelle($dados)
{

    $img = 'img/Annabelle.webp';

    $nome = 'Annabelle';

    $descricao = 'Boneca supostamente possuída por entidade demoníaca.';

    $caracteristicas[] = [
        '1' => 'Aparência infantil perturbadora',
        '2' => 'presença silenciosa',
        '3' => 'eventos paranormais'
    ];

    $resumo = 'Parte do universo Invocação do Mal, está ligada a diversos acontecimentos sobrenaturais investigados pelos Warren.';

    $_SESSION['img'] = $img;
    $_SESSION['nome'] = $nome;
    $_SESSION['descricao'] = $descricao;
    $_SESSION['caracteristicas'] = $caracteristicas;
    $_SESSION['resumo'] = $resumo;
    $_SESSION['personagem'] = 'Annabelle';

    header('Location: index.php');
}

function samaraMorgan($dados)
{

    $img = 'img/SamaraMorgan.webp';

    $nome = 'Samara Morgan';

    $descricao = 'Espírito vingativo ligado a uma fita amaldiçoada.';

    $caracteristicas[] = [
        '1' => 'Cabelos longos cobrindo o rosto',
        '2' => 'vestido branco sujo',
        '3' => 'aparição em telas'
    ];

    $resumo = 'Quem assiste ao vídeo amaldiçoado recebe uma ligação dizendo que morrerá em sete dias.';

    $_SESSION['img'] = $img;
    $_SESSION['nome'] = $nome;
    $_SESSION['descricao'] = $descricao;
    $_SESSION['caracteristicas'] = $caracteristicas;
    $_SESSION['resumo'] = $resumo;
    $_SESSION['personagem'] = 'SamaraMorgan';

    header('Location: index.php');
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $personagem = $_POST['personagem'];

    if ($personagem == '') {
        header('Location: index.php');
        exit;
    }

    $dados = $_POST;
    switch ($personagem) {
        case 'FreddyKrueger':
            freddyKrueger($_POST);
            break;
        case 'JasonVoorhees':
            jasonVoorhees($_POST);
            break;
        case 'MichaelMyers':
            michaelMyers($_POST);
            break;
        case 'Pennywise':
            pennywise($_POST);
            break;
        case 'Chucky':
            chucky($_POST);
            break;
        case 'Leatherface':
            leatherface($_POST);
            break;
        case 'Ghostface':
            ghostface($_POST);
            break;
        case 'ReganMacNeil':
            reganMacNeil($_POST);
            break;
        case 'Annabelle':
            annabelle($_POST);
            break;
        case 'SamaraMorgan':
            samaraMorgan($_POST);
            break;
    }
}