<?php
require_once '../verificaLogin.php';
require_once '../DB/conexao.php';
require_once '../FUNCAO/funcaoUsuario.php';
$conn = conectaBanco();

if (!isset($_GET['id'])) {
    header("Location: usuarios.php");
    exit;
}

$id = (int) $_GET['id'];

$usuario = buscarPorId($conn, $id);

if (!$usuario) {
    header("Location: usuarios.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Editar Usuário</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">
    <nav class="navbar navbar-dark bg-dark">
        <a class="navbar-brand" href="#">
            <img src="../img/logo.png" width="30" height="30" class="d-inline-block align-top" alt="">
            App Help Desk
        </a>

        <ul class="navbar-nav">
            <li class="nav-item">
                <a href="logout.php" class="nav-link">SAIR</a>
            </li>
        </ul>
    </nav>

    <div class="container mt-5">
        <div class="card shadow">
            <div class="card-header bg-primary text-white">
                Editar Usuário
            </div>
            <div class="card-body">

                <form action="updateUser.php" method="POST">

                    <input type="hidden" name="id" value="<?= $usuario['id'] ?>">

                    <div class="mb-3">
                        <label class="form-label">Nome</label>
                        <input type="text" name="nome" class="form-control"
                            value="<?= htmlspecialchars($usuario['nome']) ?>" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Usuário</label>
                        <input type="text" name="usuario" class="form-control"
                            value="<?= htmlspecialchars($usuario['usuario']) ?>" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">E-mail</label>
                        <input type="email" name="email" class="form-control"
                            value="<?= htmlspecialchars($usuario['email']) ?>" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">
                            Nova Senha (deixe em branco para não alterar)
                        </label>
                        <input type="password" name="senha" class="form-control">
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Nível</label>
                        <select name="nivel" class="form-select" required>
                            <option value="admin" <?= $usuario['nivel'] == 'admin' ? 'selected' : '' ?>>Administrador</option>
                            <option value="user" <?= $usuario['nivel'] == 'user' ? 'selected' : '' ?>>Usuário</option>
                            <option value="tecnico" <?= $usuario['nivel'] == 'tecnico' ? 'selected' : '' ?>>Técnico</option>
                        </select>
                    </div>

                    <button type="submit" class="btn btn-success">
                        Atualizar
                    </button>

                    <a href="usuarios.php" class="btn btn-secondary">
                        Cancelar
                    </a>

                </form>

            </div>
        </div>
    </div>

</body>

</html>