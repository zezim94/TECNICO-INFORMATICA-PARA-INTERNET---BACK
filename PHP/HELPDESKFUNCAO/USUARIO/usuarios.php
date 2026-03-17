<?php
require_once '../verificaLogin.php';
require_once '../DB/conexao.php';

$conn = conectaBanco();

require_once '../FUNCAO/funcaoUsuario.php';
$busca = $_GET['busca'] ?? null;

$usuarios = buscarTodos($conn, $busca);
?>

<html>

<head>
    <meta charset="utf-8" />
    <title>App Help Desk</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .card-abrir-chamado {
            padding: 30px 0 0 0;
            width: 100%;
            margin: 0 auto;
        }
    </style>
</head>

<body>

    <nav class="navbar navbar-dark bg-dark">
        <a class="navbar-brand" href="#">
            <img src="../img/logo.png" width="30" height="30" class="d-inline-block align-top" alt="">
            App Help Desk
        </a>
    </nav>

    <div class="container">
        <div class="row">
            <?php
            exibirAlerta();
            ?>

            <div class="card-abrir-chamado">
                <div class="card">
                    <div class="card-header">
                        Abertura de chamado
                    </div>
                    <a href="../home.php" type="button" class="btn btn-primary">
                        Voltar
                    </a>
                    <form action="usuarios.php" method="get">
                        <div class="input-group mb-3">
                            <input type="text" name="busca" class="form-control"
                                placeholder="Pesquise por nome ou e-mail" aria-label="Recipient's username"
                                aria-describedby="button-addon2"
                                value="<?= htmlspecialchars($_GET['busca'] ?? null) ?>">
                            <button class="btn btn-outline-secondary" type="submit" id="button-addon2">Pesquisar</button>
                        </div>
                    </form>
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                        data-bs-target="#staticBackdrop">
                        Novo Usuário
                    </button>
                    <div class="card-body">
                        <div class="row">

                            <div class="col">

                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Nome</th>
                                            <th scope="col">Usuário</th>
                                            <th scope="col">E-mail</th>
                                            <th scope="col">Nivel</th>
                                            <th scope="col">Data cadastro</th>
                                            <th scope="col">Ações</th>
                                        </tr>
                                    </thead>
                                    <tbody>


                                        <?php
                                        $i = 0;
                                        foreach ($usuarios as $user):
                                            $i++ ?>
                                            <tr>
                                                <td scope="row"><?= $i ?></td>
                                                <td><?= $user['nome'] ?></td>
                                                <td><?= $user['usuario'] ?></td>
                                                <td><?= $user['email'] ?></td>
                                                <td><?= $user['nivel'] ?></td>
                                                <td><?= date('d/m/Y', strtotime($user['dataCadastro'])) ?></td>
                                                <td>
                                                    <a href="editUser.php?id=<?= $user['id'] ?>"
                                                        class="btn btn-warning">Editar</a>
                                                    <a href="deleteUser.php?id=<?= $user['id'] ?>"
                                                        class="btn btn-danger">Deletar</a>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>

                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>



        <!-- Modal -->
        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
            aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Adicionar Usuário</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="addUser.php" method="post">
                            <div class="mb-3">
                                <label for="nome" class="form-label">Nome</label>
                                <input type="nome" name="nome" class="form-control" id="nome">

                            </div>
                            <div class="mb-3">
                                <label for="usuario" class="form-label">Usuário</label>
                                <input type="usuario" name="usuario" class="form-control" id="usuario">

                            </div>
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Email</label>
                                <input type="email" name="email" class="form-control" id="exampleInputEmail1"
                                    aria-describedby="emailHelp">

                            </div>
                            <div class="mb-3">
                                <label for="senha" class="form-label">Senha</label>
                                <input type="password" name="senha" class="form-control" id="senha">
                            </div>

                            <div class="mb-3">
                                <label for="nivel" class="form-label">Nível</label>
                                <select name="nivel" id="nivel" class="form-select">
                                    <option value="">Selecione o nível</option>
                                    <option value="admin">Administrador</option>
                                    <option value="user">Usuário</option>
                                    <option value="tecnico">Técnico</option>
                                </select>
                            </div>

                            <button type="submit" class="btn btn-primary">Cadastrar</button>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Option 1: Bootstrap Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
            crossorigin="anonymous"></script>

    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const params = new URLSearchParams(window.location.search);
            const modalId = params.get('modal');

            if (modalId) {
                const modalElement = document.getElementById(modalId);
                if (modalElement) {
                    const modal = new bootstrap.Modal(modalElement);
                    modal.show();
                }
            }
        });
    </script>
    <script>
        const alerta = document.querySelector('.alert');
        if (alerta) {
            setTimeout(() => {
                alerta.remove();
            }, 2000);
        }
    </script>
</body>

</html>