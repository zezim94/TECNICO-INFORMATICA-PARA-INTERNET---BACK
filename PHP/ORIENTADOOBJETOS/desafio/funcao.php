<?php

require_once 'mostro.php';

function personagem($tipo)
{
    switch ($tipo) {
        case 'FreddyKrueger':
            return new Monstro(
                'img/FreddyKrueger.webp',

                'Freddy Krueger',

                'Assassino que ataca suas vítimas nos sonhos.',

                [
                    '1' => 'Rosto queimado',
                    '2' => 'Suéter listrado vermelho e verde',
                    '3' => 'Chapéu fedora',
                    '4' => 'Luva com lâminas'
                ],

                'Após ser morto por pais vingativos, Freddy retorna como entidade sobrenatural que mata adolescentes enquanto dormem, na franquia A Hora do Pesadelo.'
            );
            break;

        case 'JasonVoorhees':

            return new Monstro(
                'img/JasonVoorhees.avif',

                'Jason Voorhees',

                'Assassino silencioso do acampamento Crystal Lake.',

                [
                    '1' => 'Máscara de hóquei',
                    '2' => 'força sobre-humana',
                    '3' => 'uso de facão'
                ],

                'Considerado morto quando criança, Jason retorna para se vingar de todos que se aproximam do lago onde teria se afogado.'
            );

            break;
        case 'MichaelMyers':
            return new Monstro(
                'img/MichaelMyers.jpg',

                'Michael Myers',

                'Assassino mascarado conhecido como “A Forma”',

                [
                    '1' => 'Máscara branca sem expressão',
                    '2' => 'fmacacão azul',
                    '3' => 'comportamento silencioso.'
                ],

                'Após matar a própria irmã quando criança, escapa de um hospital psiquiátrico e passa a perseguir Laurie Strode.'
            );

            break;
        case 'Pennywise':
            return new Monstro(
                'img/Pennywise.jpg',

                'Pennywise',

                'Entidade cósmica que assume a forma de palhaço.',

                [
                    '1' => 'Balão vermelho',
                    '2' => 'sorriso macabro',
                    '3' => 'manipulação de medos'
                ],

                'Em It, aterroriza as crianças da cidade de Derry, alimentando-se do medo delas.'
            );

            break;
        case 'Chucky':
            return new Monstro(
                'img/Chucky.jpeg',

                'Chucky',

                'Boneco possuído por um assassino em série.',

                [
                    '1' => 'Aparência infantil',
                    '2' => 'faca na mão',
                    '3' => 'humor sarcástico'
                ],

                'O espírito do criminoso Charles Lee Ray transfere sua alma para um boneco, iniciando uma série de assassinatos.'
            );

            break;
        case 'Leatherface':
            return new Monstro(
                'img/Leatherface.webp',

                'Leatherface',

                'Assassino canibal do interior do Texas.',

                [
                    '1' => 'Máscara feita de pele humana',
                    '2' => 'motosserrra',
                    '3' => 'comportamento brutal'
                ],

                'Membro de uma família perturbada, caça viajantes que cruzam seu caminho.',
            );

            break;
        case 'Ghostface':
            return new Monstro(
                'img/Ghostface.jpg',

                'Ghostface',

                'Assassino mascarado da franquia Pânico.',

                [
                    '1' => 'Máscara branca alongada',
                    '2' => 'manto preto',
                    '3' => 'ligações ameaçadoras'
                ],

                'Diferentes pessoas assumem a identidade de Ghostface para cometer assassinatos inspirados em filmes de terror.'
            );

            break;
        case 'ReganMacNeil':
            return new Monstro(
                'img/ReganMacNeil.jpg',

                'Regan MacNeil',

                'Menina possuída por uma entidade demoníaca.',

                [
                    '1' => 'Voz alterada',
                    '2' => 'comportamento agressivo',
                    '3' => 'fenômenos sobrenaturais'
                ],

                'Em O Exorcista, sua possessão leva dois padres a realizarem um exorcismo dramático.'
            );
            break;
        case 'Annabelle':
            return new Monstro(
                'img/Annabelle.webp',

                'Annabelle',

                'Boneca supostamente possuída por entidade demoníaca.',

                [
                    '1' => 'Aparência infantil perturbadora',
                    '2' => 'presença silenciosa',
                    '3' => 'eventos paranormais'
                ],

                'Parte do universo Invocação do Mal, está ligada a diversos acontecimentos sobrenaturais investigados pelos Warren.'
            );
            break;

        case 'SamaraMorgan':
            return new Monstro(
                'img/SamaraMorgan.webp',

                'Samara Morgan',

                'Espírito vingativo ligado a uma fita amaldiçoada.',

                [
                    '1' => 'Cabelos longos cobrindo o rosto',
                    '2' => 'vestido branco sujo',
                    '3' => 'aparição em telas'
                ],

                'Quem assiste ao vídeo amaldiçoado recebe uma ligação dizendo que morrerá em sete dias.'
            );

            break;

        default:
            echo 'Error';
            break;
    }
}


if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $tipo = $_POST['personagem'];

$personagem = new Monstro();

    if ($personagem == '') {
        header('Location: index.php');
        exit;
    }
}
