<?php
include "../config/conexao.php";

$sql = $conn->query("SELECT * FROM caminhoes");
?>

<h2>Caminhões</h2>

<a href="cadastrar_caminhao.php">Novo caminhão</a>

<table border="1">

<tr>
<th>ID</th>
<th>Nome</th>
<th>Placa</th>
<th>Motorista</th>
<th>Status</th>
</tr>

<?php while($c = $sql->fetch_assoc()){ ?>

<tr>

<td><?= $c['id'] ?></td>
<td><?= $c['nome'] ?></td>
<td><?= $c['placa'] ?></td>
<td><?= $c['motorista'] ?></td>
<td><?= $c['status'] ?></td>

</tr>

<?php } ?>

</table>