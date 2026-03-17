<?php
include "../config/conexao.php";

$rotas = $conn->query("SELECT * FROM rotas");
?>

<h2>Rotas</h2>

<a href="nova_rota.php">Nova rota</a>

<style>
    .card {
        border: 1px solid #ccc;
        padding: 15px;
        margin: 10px;
        width: 200px;
        cursor: pointer;
        border-radius: 8px;
        display: inline-block;
        background: #f5f5f5;
    }

    .card:hover {
        background: #e9e9e9;
    }
</style>

<?php while ($r = $rotas->fetch_assoc()) { ?>

    <div class="card" onclick="abrirRota(<?= $r['id'] ?>)">

        <h3><?= $r['nome_rota'] ?></h3>

        <p>ID: <?= $r['id'] ?></p>

    </div>

<?php } ?>

<script>

    function abrirRota(id) {

        window.location = "pontos_rota.php?rota=" + id;

    }

</script>