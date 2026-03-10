<?php
require_once '../DB/conexao.php';
require_once '../models/Chamado.php';
require_once '../models/Categoria.php';

class ChamadoController
{

    private $conn;
    private $chamadoModel;

    public function __construct()
    {

        $db = new Conexao();

        $this->conn = $db->conectaBanco();
        $this->chamadoModel = new Chamado($this->conn);

    }

    public function listar()
    {

        $chamado = $this->chamadoModel->buscarTodos();

        require '../views/CHAMADO/consultar_chamado.php';
    }

    public function editarChamado()
    {

        if ($_SERVER['REQUEST_METHOD'] == 'GET') {

            $id = $_GET['id'];

            $chamado = $this->chamadoModel->buscarPorId($id);
            $catModel = new Categoria($this->conn);
            $categorias = $catModel->buscarTodasCategorias();

            require '../views/CHAMADO/editarChamado.php';
        }
    }

    public function atualizaChamado()
    {

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $id = $_POST['id'];
            $titulo = $_POST['titulo'];
            $categoria = $_POST['categoria'];
            $descricao = $_POST['descricao'];
            $preco = !empty($_POST['preco']) ? $_POST['preco'] : null;

            $resultado = $this->chamadoModel->atualizaChamado($titulo, $categoria, $descricao, $preco, $id);

            if ($resultado) {
                // Adicione um parâmetro de sucesso para o alerta aparecer
                header('Location: index.php?acao=consultar_chamado&msg=sucesso');
                exit;
            } else {
                header('Location: index.php?acao=consultar_chamado&msg=erro');
                exit;
            }
        }
    }

    public function abrirChamado()
    {
        // 1. SEMPRE busca as categorias antes de qualquer coisa
        $catModel = new Categoria($this->conn);
        $categorias = $catModel->buscarTodasCategorias();

        // 2. Se o usuário enviou o formulário (POST), tentamos salvar
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $titulo = $_POST['titulo'];
            $categoria = $_POST['categoria'];
            $descricao = $_POST['descricao'];
            $userId = $_SESSION['id'];

            $resultado = $this->chamadoModel->abrirChamado($titulo, $categoria, $descricao, $userId);

            if ($resultado) {
                header('Location: index.php?acao=consultar_chamado&msg=sucesso');
                exit;
            }
        }

        // 3. Se for apenas para abrir a tela (GET) ou se o salvamento falhou, 
        // carregamos a view. A variável $categorias estará disponível aqui.
        require_once '../views/CHAMADO/abrir_chamado.php';
    }

    public function excluirChamado()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id = $_POST['id'];
            $resultado = $this->chamadoModel->excluirChamado($id);

            if ($resultado) {
                header('Location: index.php?acao=consultar_chamado&msg=sucesso');
                exit;
            }
        }
    }

    public function salvarCategoria()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $nome = $_POST['categoria'];
            $catModel = new Categoria($this->conn);
            $resultado = $catModel->novaCategoria($nome);

            if ($resultado) {
                // Volta para a tela de abertura de chamado com a nova categoria na lista
                header('Location: index.php?acao=novoChamado&msg=sucesso');
                exit;
            }
        }
    }

    public function excluirCategoria()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            $id = $_GET['id'];
            $catModel = new Categoria($this->conn);
            $resultado = $catModel->excluirCategoria($id);

            if ($resultado) {
                header('Location: index.php?acao=abrirChamado&msg=sucesso');
                exit;
            }
        }
    }

    public function editarCategoria()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['id'])) {
            $id = $_GET['id'];
            $catModel = new Categoria($this->conn);
            $categoria = $catModel->buscarCategoriaPorId($id);

            // Se não encontrou a categoria, volta para a lista
            if (!$categoria) {
                header('Location: index.php?acao=abrirChamado&msg=erro_nao_encontrado');
                exit;
            }

            require_once '../views/CHAMADO/editarCategoria.php';
        }
    }

    public function atualizarCategoria()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id = $_POST['id'];
            $nome = $_POST['categoria'];

            $catModel = new Categoria($this->conn);
            $resultado = $catModel->editarCategoria($id, $nome);

            if ($resultado) {
                header('Location: index.php?acao=abrirChamado&msg=editado');
                exit;
            } else {
                header('Location: index.php?acao=abrirChamado&msg=erro');
                exit;
            }
        }
    }
}