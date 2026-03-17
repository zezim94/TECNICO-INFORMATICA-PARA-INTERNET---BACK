<?php
require_once('../verificaLogin.php');

require_once '../DB/conexao.php';
$conn = conectaBanco();
require_once '../FUNCAO/FuncaoCategoria.php';


$categorias = buscarTodasCategorias($conn);
$idCategoria = $categorias[0]['id'];

?>

<html>

<head>
  <meta charset="utf-8" />
  <title>App Help Desk</title>

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
    integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

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

      <div class="card-abrir-chamado">
        <div class="card">

          <?php
          exibirAlerta();
          ?>

          <div class="card-header">
            Abertura de chamado
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col">

                <form action="processaChamado.php" method="post">
                  <div class="form-group">
                    <label>Título</label>
                    <input type="text" name="titulo" class="form-control" placeholder="Título">
                  </div>

                  <?php
                  if ($_SESSION['nivel'] != 'user'):
                    ?>
                    <!-- Botão que abre o modal -->
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                      Adicionar categoria
                    </button>

                    <?php
                  endif
                  ?>

                  <div class="form-group">
                    <label>Categoria</label>
                    <select name="categoria" class="form-control">
                      <?php
                      foreach ($categorias as $categoria):
                        ?>
                        <option value="<?= $categoria['id'] ?>">
                          <?= htmlspecialchars($categoria['categoria']) ?>
                        </option>

                        <?php
                      endforeach
                      ?>
                    </select>
                  </div>

                  <div class="form-group">
                    <label>Descrição</label>
                    <textarea name="descricao" class="form-control" rows="3"></textarea>
                  </div>

                  <div class="row mt-5">
                    <div class="col-6">
                      <a class="btn btn-lg btn-warning btn-block" href="../home.php">Voltar</a>
                    </div>

                    <div class="col-6">
                      <button class="btn btn-lg btn-info btn-block" type="submit">Abrir</button>
                    </div>
                  </div>
                </form>

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
            <h5 class="modal-title" id="staticBackdropLabel">Título do Modal</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
          </div>

          <div class="modal-body">
            <form class="row g-3" action="processaCategoria.php" method="post">

              <div class="col-auto">
                <label for="categoria" class="visually-hidden">Categoria</label>
                <input type="text" name="categoria" class="form-control" id="categoria" placeholder="Categoria">
              </div>
              <div class="col-auto">
                <button type="submit" class="btn btn-primary mb-3">Adicionar</button>
              </div>
            </form>
          </div>

          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
          </div>

        </div>
      </div>
    </div>

    <!-- Scripts Bootstrap 5 -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

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