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
            Consulta de chamados
          </div>

          <div class="card-body">
            <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-3">
              <?php foreach ($chamado as $chamad):
                if (($_SESSION['nivel'] !== 'admin' && $_SESSION['nivel'] !== 'tecnico') && $_SESSION['id'] != $chamad['idUser']) {
                  continue;
                }
                ?>
                <div class="col">
                  <div class="card h-100 bg-light">
                    <div class="card-body">
                      <h3 class="card-title"><?= htmlspecialchars($chamad['nome']) ?></h3>
                      <h4 class="card-title"><?= htmlspecialchars($chamad['titulo']) ?></h4>
                      <h5 class="card-title"><?= htmlspecialchars($chamad['categoria']) ?></h5>
                      <p class="card-text text-muted"><?= htmlspecialchars($chamad['descricao']) ?></p>
                      <?php if ($chamad['preco']): ?>
                        <p class="card-text text-muted">R$ <?= htmlspecialchars($chamad['preco'] ?? '') ?></p>
                      <?php endif ?>
                    </div>
                    <div class="d-flex justify-content-around align-items-center">
                      <a href="index.php?acao=editarChamado&id=<?= $chamad['id'] ?>" class="btn btn-info">
                        Editar
                      </a>

                      <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                        data-bs-target="#modalExcluir<?= $chamad['id'] ?>">
                        Excluir
                      </button>

                      <div class="modal fade" id="modalExcluir<?= $chamad['id'] ?>" tabindex="-1">
                        <div class="modal-dialog">
                          <div class="modal-content">

                            <form action="index.php?acao=excluirChamado" method="POST">

                              <div class="modal-header">
                                <h5 class="modal-title">Confirmar exclusão</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                              </div>

                              <div class="modal-body">
                                Deseja excluir o chamad:
                                <strong><?= htmlspecialchars($chamad['titulo']) ?></strong> ?
                                <input type="hidden" name="id" value="<?= $chamad['id'] ?>">
                              </div>

                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                  Cancelar
                                </button>
                                <button type="submit" class="btn btn-danger">
                                  Confirmar
                                </button>
                              </div>

                            </form>

                          </div>
                        </div>
                      </div>

                    </div>
                  </div>
                </div>
              <?php endforeach; ?>
            </div>

            <div class="row mt-4">
              <div class="col-6">
                <a href="index.php?acao=home" class="btn btn-warning w-100">Voltar</a>
              </div>
            </div>
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
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>