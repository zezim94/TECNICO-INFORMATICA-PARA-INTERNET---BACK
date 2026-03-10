<?php
session_start();

// 1. Subir um nível (../) para encontrar as pastas fora da public
require_once '../DB/conexao.php';
require_once '../controllers/LoginController.php';
require_once '../controllers/UsuarioController.php';
require_once '../controllers/ChamadoController.php';

$db = new Conexao();
$conn = $db->conectaBanco();

$acao = $_GET['acao'] ?? 'login';

$rotasPublicas = ['login', 'autenticar'];

if (!isset($_SESSION['logado']) || $_SESSION['logado'] !== true) {
    if (!in_array($acao, $rotasPublicas)) {
        header('Location: index.php?acao=login&erro=logar');
        exit;
    }
}

switch ($acao) {
    case 'login':
        // Carrega o index.php da raiz (seu formulário)
        require_once '../index.php';
        break;

    case 'logout':
        $controller = new LoginController($conn);
        $controller->logout();
        break;

    case 'autenticar':
        $controller = new LoginController($conn);
        $controller->logar();
        break;

    case 'home':
        require_once '../views/home.php';
        break;

    case 'listar_usuarios':
        $controller = new UsuarioController();
        $controller->listar();
        break;

    case 'atualizar':
        $controller = new UsuarioController();
        $controller->atualizar();
        break;

    case 'editar':
        $controller = new UsuarioController();
        $controller->editar();
        break;

    case 'insertUser':
        $controller = new UsuarioController();
        $controller->novoUsuario();
        break;

    case 'deleteUser':
        $controller = new UsuarioController();
        $controller->deletarUser();
        break;

    case 'buscarFiltro':
        $controller = new UsuarioController();
        $controller->buscarFiltro();
        break;

    case 'consultar_chamado':
        $controller = new ChamadoController();
        $controller->listar();
        break;

    case 'editarChamado':
        $controller = new ChamadoController();
        $controller->editarChamado();
        break;

    case 'atualizaChamado':
        $controller = new ChamadoController();
        $controller->atualizaChamado();
        break;

    case 'abrirChamado':
        $controller = new ChamadoController();
        $controller->abrirChamado();
        break;

    case 'nova_categoria':
        $controller = new ChamadoController();
        $controller->salvarCategoria();
        break;

    case 'excluirChamado':
        $controller = new ChamadoController();
        $controller->excluirChamado();
        break;

    case 'excluir_categoria':
        $controller = new ChamadoController();
        $controller->excluirCategoria();
        break;

    case 'editar_categoria':
        $controller = new ChamadoController();
        $controller->editarCategoria();
        break;

    case 'atualizar_categoria':
        $controller = new ChamadoController();
        $controller->atualizarCategoria();
        break;

    default:
        require_once '../views/home.php';
        break;
}