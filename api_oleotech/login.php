<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");

$servidor = "localhost";
$usuario = "root";
$senha_db = "";
$banco = "oleotech";

$conn = new mysqli($servidor, $usuario, $senha_db, $banco);

if ($conn->connect_error) {
  die(json_encode(["sucesso" => false, "mensagem" => "Falha na conexão: " . $conn->connect_error]));
}

$raw = file_get_contents("php://input");
$data = json_decode($raw, true);

$email = trim($data["email"] ?? "");
$senha = trim($data["senha"] ?? "");




// if (empty($email) || empty($senha)) {
//   echo json_encode(["erro" => "Preencha os Campos"]);
//   exit;
// }

// Verifica em tb_clientes
$stmt1 = $conn->prepare("SELECT id_cliente, senha FROM tb_clientes WHERE email = ?");
$stmt1->bind_param("s", $email);
$stmt1->execute();
$result1 = $stmt1->get_result();



if ($row1 = $result1->fetch_assoc()) {
  if (password_verify($senha, $row1['senha'])) {
    echo json_encode(["sucesso" => true, "tipo" => "cliente"]);
    file_put_contents("log.txt", "Email: $email | Senha: $senha\n", FILE_APPEND);
    exit;
  }
}

if (!$result1) {
  echo json_encode(["sucesso" => false, "mensagem" => "Erro na consulta clientes"]);
  exit;
}

// Verifica em tb_coletores
$stmt2 = $conn->prepare("SELECT id_coletor, senha FROM tb_coletores WHERE email = ?");
$stmt2->bind_param("s", $email);
$stmt2->execute();
$result2 = $stmt2->get_result();

if ($row2 = $result2->fetch_assoc()) {
  if (password_verify($senha, $row2['senha'])) {
    echo json_encode(["sucesso" => true, "tipo" => "coletor"]);
    file_put_contents("log.txt", "Email: $email | Senha: $senha\n", FILE_APPEND);
    exit;
  }
}


if (!$result2) {
  echo json_encode(["sucesso" => false, "mensagem" => "Erro na consulta coletores"]);
  exit;
}

echo json_encode(["sucesso" => false, "mensagem" => "Email ou senha inválidos"]);
$conn->close();
?>