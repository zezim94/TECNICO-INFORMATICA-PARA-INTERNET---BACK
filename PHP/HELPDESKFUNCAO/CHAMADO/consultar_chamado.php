<?php

require_once('../verificaLogin.php');

require_once '../DB/conexao.php';
require_once '../FUNCAO/funcaoChamado.php';
$conn = conectaBanco();

$linhas = buscarTodos($conn);

?>
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
              <?php foreach ($linhas as $linha):
                if ($_SESSION['nivel'] !== 'admin' && $_SESSION['id'] != $linha['idUser']) {
                  continue;
                }
              ?>
                <div class="col">
                  <div class="card h-100 bg-light">
                    <div class="card-body">
                      <h3 class="card-title"><?= htmlspecialchars($linha['nome']) ?></h3>
                      <h4 class="card-title"><?= htmlspecialchars($linha['titulo']) ?></h4>
                      <h5 class="card-title"><?= htmlspecialchars($linha['categoria']) ?></h5>
                      <p class="card-text text-muted"><?= htmlspecialchars($linha['descricao']) ?></p>
                      <?php if ($linha['preco']): ?>
                        <p class="card-text text-muted">R$ <?= htmlspecialchars($linha['preco'] ?? '') ?></p>
                      <?php endif ?>
                    </div>
                    <div class="d-flex justify-content-around align-items-center">
                      <form action="editarChamado.php" method="post" class="d-inline">
                        <input type="hidden" name="id" value="<?= $linha['id'] ?>">
                        <button type="submit" class="btn btn-info">Editar</button>
                      </form>

                      <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                        data-bs-target="#modalExcluir<?= $linha['id'] ?>">
                        Excluir
                      </button>

                      <div class="modal fade" id="modalExcluir<?= $linha['id'] ?>" tabindex="-1">
                        <div class="modal-dialog">
                          <div class="modal-content">

                            <form action="excluirChamado.php" method="POST">

                              <div class="modal-header">
                                <h5 class="modal-title">Confirmar exclusão</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                              </div>

                              <div class="modal-body">
                                Deseja excluir o chamado:
                                <strong><?= htmlspecialchars($linha['titulo']) ?></strong> ?
                                <input type="hidden" name="id" value="<?= $linha['id'] ?>">
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
                <a href="../home.php" class="btn btn-warning w-100">Voltar</a>
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