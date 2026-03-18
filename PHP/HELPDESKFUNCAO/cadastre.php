  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <div class="modal-body">
      <form action="processaCadastro.php" method="post">
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

          <button type="submit" class="btn btn-primary">Cadastrar</button>
      </form>
        <a class="btn btn-lg btn-info btn-block" href="index.php">Voltar</a>
  </div>