<?php

session_start();

$personagem = $_POST['personagem'];

function Pigsaw($dados)
{

    $img = "img/Pigsaw.png";

    $indentidade[] = [
        "Nome verdadeiro" => "John Kramer",
        "Apelido" => "Pigsaw",
        "Arma" => "Armadilha",
        "Filme" => "Jogos Mortais",
        "descricao" => "Pigsaw é um boneco de madeira que usa uma máscara de porco e é conhecido por seus jogos mortais.",
    ];

    $perfil[] = [
        "1" => "Extremamente inteligente, engenheiro civil de formação.",
        "2" => "Diagnosticado com câncer terminal, o que influencia sua visão distorcida sobre a vida.",
        "3" => "Acredita que as pessoas não valorizam a própria vida e cria “jogos” para forçá-las a provar que querem viver.",
        "4" => "Não se vê como assassino — diz que dá às vítimas uma “chance” de sobrevivência.",
    ];

    $_SESSION['img'] = $img;
    $_SESSION['indentidade'] = $indentidade;
    $_SESSION['perfil'] = $perfil;
    header("Location: index.php");
}

function Jason($dados)
{

    $img = "img/Jason.jpg";

    $indentidade[] = [
        "Nome verdadeiro" => "Jason Voorhees",
        "Franquia" => "Sexta-Feira 13 (Friday the 13th)",
        "Primeira aparição" => "Friday the 13th (1980)",
        "Intérpretes marcantes" => "Ari Lehman (criança), Kane Hodder (vários filmes)",
    ];

    $perfil[] = [
        "1" => "Altura e porte físico grandes e intimidador.",
        "2" => "Usa máscara de hóquei (a partir do 3º filme).",
        "3" => "Roupas simples, geralmente jaqueta e calça escuras.",
        "4" => "Aparência deformada sob a máscara.",
    ];

    $_SESSION['img'] = $img;
    $_SESSION['indentidade'] = $indentidade;
    $_SESSION['perfil'] = $perfil;
    header("Location: index.php");
}

function Terrifier($dados)
{

    $img = "img/Terrifier.jpg";

    $indentidade[] = [
        "Nome verdadeiro" => "Art the Clown",
        "Franquia" => "Terrifier",
        "Primeira aparição" => "Terrifier (2016)",
        "Intérpretes marcantes" => "David Howard Thornton",
    ];

    $perfil[] = [
        "1" => "Totalmente mudo (não fala nenhuma palavra).",
        "2" => "Extremamente sádico e gosta de provocar as vítimas.",
        "3" => "Demonstra humor sombrio, fazendo mímicas e caretas antes e durante os ataques.",
        "4" => "Parece se divertir com o sofrimento.",
    ];

    $_SESSION['img'] = $img;
    $_SESSION['indentidade'] = $indentidade;
    $_SESSION['perfil'] = $perfil;
    header("Location: index.php");
}

function It($dados)
{

    $img = "img/It.jpg";

    $indentidade[] = [
        "Nome verdadeiro" => "Desconhecido (entidade cósmica chamada “IT”)",
        "Franquia" => "It",
        "Forma mais conhecida" => "Pennywise, o Palhaço Dançarino",
        "Criador" => "Stephen King",
    ];

    $perfil[] = [
        "1" => " Metamorfose (pode assumir a forma do maior medo da vítima).",
        "2" => "Manipulação psicológica.",
        "3" => "Ilusões extremamente realistas.",
        "4" => "Influência mental sobre a cidade de Derry.",
    ];

    $_SESSION['img'] = $img;
    $_SESSION['indentidade'] = $indentidade;
    $_SESSION['perfil'] = $perfil;
    header("Location: index.php");
}

function Chucky()
{

    $img = "img/Chucky.jpg";

    $indentidade[] = [
        "Nome verdadeiro" => "Charles Lee Ray",
        "Apelido" => "Chucky",
        "Primeira aparição" => "Child’s Play (1988)",
        "Criador" => "Don Mancini",
        "Ator de voz (original)" => "Brad Dourif",
    ];

    $perfil[] = [
        "1" => " Metamorfose (pode assumir a forma do maior medo da vítima).",
        "2" => "Manipulação psicológica.",
        "3" => "Ilusões extremamente realistas.",
        "4" => "Influência mental sobre a cidade de Derry.",
    ];

    $_SESSION['img'] = $img;
    $_SESSION['indentidade'] = $indentidade;
    $_SESSION['perfil'] = $perfil;
    header("Location: index.php");
}

function FreddyKrueger() {}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    switch ($personagem) {
        case 'Pigsaw':
            Pigsaw($_POST);
            break;
        case 'Jason':
            Jason($_POST);
            break;
        case 'Terrifier':
            Terrifier($_POST);
            break;
        case 'It':
            It($_POST);
            break;
        case 'Chucky':
            Chucky();
            break;
        case 'FreddyKrueger':
            FreddyKrueger();
            break;
    }
}
