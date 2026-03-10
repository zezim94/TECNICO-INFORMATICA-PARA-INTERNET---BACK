
<html>

<head>
    <meta charset="utf-8" />
    <title>App Help Desk</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        .card-consultar-chamado {
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

            <div class="card-consultar-chamado">
                <div class="card p-3">
                    <?php
                    exibirAlerta();
                    ?>
                    <div class="card-header">
                        Editar Chamado
                    </div>

                    <div class="card-body">

                        <form action="index.php?acao=atualizaChamado" method="POST" class="mx-auto" style="max-width: 500px;">
                            <input type="hidden" name="id" value="<?= $chamado['id'] ?>">
                            <div class="mb-3">
                                <label for="titulo" class="form-label">Titulo</label>
                                <input type="text" name="titulo" class="form-control" id="titulo"
                                    aria-describedby="emailHelp"
                                    value="<?= htmlspecialchars($chamado['titulo'] ?? '') ?>">
                            </div>

                            <div class="mb-3">
                                <label for="categoria" class="form-label">Categoria</label>
                                <select name="categoria" id="categoria" class="form-select">
                                    <option value="" disabled>Selecione uma categoria</option>
                                    <?php
                                    foreach ($categorias as $categoria):
                                    ?>
                                        <option value="<?=$categoria['id']?>"
                                        <?=(isset($chamado['categoria_id']) && $chamado['categoria_id'] === $categoria['id']) ? 'selected' : '' ?>>
                                        <?= htmlspecialchars($categoria['categoria']) ?>
                                        </option>
                                     <?php
                                    endforeach  
                                    ?>

                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="descricao" class="form-label">Descrição</label>
                                <textarea name="descricao" id="descricao" class="form-control"
                                    rows="4"><?= htmlspecialchars($chamado['descricao'] ?? '') ?></textarea>
                            </div>

                            <?php 
                            if($_SESSION['nivel'] !== 'user'):
                            ?>

                              <div class="mb-3">
                                <label for="preco" class="form-label">Preço</label>
                                <input type="number" step="0.01" name="preco" id="preco" class="form-control"
                                    rows="4" value="<?= htmlspecialchars($chamado['preco'] ?? '') ?>">
                            </div>

                             <?php endif ?>

                            <div class="d-grid gap-2">
                                <button type="submit" class="btn btn-primary w-100">Salvar</button>
                                <a href="index.php?acao=consultar_chamado" class="btn btn-warning w-100">Voltar</a>
                            </div>
                        </form>

                    </div>

                </div>
            </div>

        </div>
    </div>

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