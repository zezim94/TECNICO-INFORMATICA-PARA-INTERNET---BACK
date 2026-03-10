<?php

require_once '../DB/conexao.php';
require_once '../models/Usuario.php';

class UsuarioController
{
    private $conn;
    private $usuarioModel;

    public function __construct()
    {
        $db = new Conexao();
        $this->conn = $db->conectaBanco();
        $this->usuarioModel = new Usuario($this->conn);
    }

    public function listar()
    {
        $busca = $_GET['busca'] ?? '';
        $usuarios = $this->usuarioModel->buscarTodos($busca);

        require_once '../views/USUARIO/usuarios.php';
    }

    public function buscarFiltro()
    {
        $busca = $_GET['busca'] ?? '';
        $usuarios = $this->usuarioModel->buscarTodos($busca);

        require_once '../views/USUARIO/usuarios.php';
    }

    public function editar()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            $id = $_GET['id'];
            $usuario = $this->usuarioModel->buscarPorId($id); // método da model que retorna os dados
            require_once '../views/USUARIO/editUser.php';      // formulário preenchido
        }
    }

    public function atualizar()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id = $_POST['id'];
            $nome = $_POST['nome'];
            $usuario = $_POST['usuario'];
            $email = $_POST['email'];
            $nivel = $_POST['nivel'];
            $senha = !empty($_POST['senha']) ? $_POST['senha'] : null;

            $resultado = $this->usuarioModel->atualizar($id, $nome, $usuario, $email, $nivel, $senha);

            if ($resultado) {
                header('Location: index.php?acao=listar_usuarios');
                exit;
            }
        }
    }

    public function novoUsuario()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $nome = $_POST['nome'];
            $usuario = $_POST['usuario'];
            $email = $_POST['email'];
            $senha = $_POST['senha'];
            $nivel = $_POST['nivel'];

            $resultado = $this->usuarioModel->insertUsuario($nome, $usuario, $email, $nivel, $senha);

            if ($resultado) {
                // Redireciona para a listagem com mensagem de sucesso
                header("Location: index.php?acao=listar_usuarios&msg=sucesso");
                exit;
            } else {
                // Redireciona de volta com mensagem de erro
                header("Location: index.php?acao=listar_usuarios&msg=erro");
                exit;
            }
        }
    }

    public function deletarUser()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            $id = $_GET['id'];

            $resultado = $this->usuarioModel->excluirUsuario($id);

            if ($resultado) {
                header("Location: index.php?acao=listar_usuarios&msg=sucesso");
                exit;
            } else {
                // Redireciona de volta com mensagem de erro
                header("Location: index.php?acao=listar_usuarios&msg=erro");
                exit;
            }

        }
    }

}

