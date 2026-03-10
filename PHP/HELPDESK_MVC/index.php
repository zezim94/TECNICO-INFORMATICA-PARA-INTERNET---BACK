<?php
// Captura as mensagens vindas da URL (parâmetro 'erro' ou 'login')
$erro = $_GET['erro'] ?? $_GET['login'] ?? '';
$message = '';

if ($erro === 'logar') {
    $message = 'Acesso negado. Necessário logar.';
} elseif ($erro === 'invalido') {
    $message = 'Usuário ou senha incorretos.';
}
?>

<html>

<head>
    <meta charset="utf-8" />
    <title>App Help Desk</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <style>
        .card-login {
            padding: 30px 0 0 0;
            width: 350px;
            margin: 0 auto;
        }
    </style>
</head>

<body>

    <nav class="navbar navbar-dark bg-dark">
        <a class="navbar-brand" href="#">
            <img src="public/img/logo.png" width="30" height="30" class="d-inline-block align-top" alt="">
            App Help Desk
        </a>
    </nav>

    <div class="container">
        <div class="row">

            <div class="card-login">
                <div class="card">
                    <div class="card-header">
                        Login
                    </div>
                    <div class="card-body">
                        <form action="index.php?acao=autenticar" method="post">
                            <div class="form-group">
                                <input type="email" name="email" class="form-control" placeholder="E-mail">
                            </div>
                            <div class="form-group">
                                <input type="password" name="senha" class="form-control" placeholder="Senha">
                            </div>
                            <?php if (!empty($message)): ?>
                                <div class="alert alert-danger aviso" role="alert">
                                    <?= $message ?>
                                </div>
                            <?php endif; ?>
                            <button class="btn btn-lg btn-info btn-block" type="submit">Entrar</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>

        <script>
            const aviso = document.querySelector('.aviso')

            setTimeout(() => {
                aviso.remove()
            }, 2000);
        </script>
</body>

</html>