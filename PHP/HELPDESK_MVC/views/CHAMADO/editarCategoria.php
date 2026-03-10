
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
            <img src="img/logo.png" width="30" height="30" class="d-inline-block align-top" alt="">
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
                Editar categoria
            </div>
            <div class="card-body">

                <form action="index.php?acao=atualizar_categoria" method="POST">

                    <input type="hidden" name="id" value="<?= $categoria['id'] ?>">

                    <div class="mb-3">
                        <label class="form-label">Categoria</label>
                        <input type="text" name="categoria" class="form-control"
                            value="<?= htmlspecialchars($categoria['categoria']) ?>" required>
                    </div>

                    <button type="submit" class="btn btn-success">
                        Atualizar
                    </button>

                    <a href="index.php?acao=abrirChamado" class="btn btn-secondary">
                        Cancelar
                    </a>

                </form>

            </div>
        </div>
    </div>

</body>

</html>