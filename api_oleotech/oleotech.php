<?php
header("Access-Control-Allow-Origin: *");
 
header("Content-Type: application/json; charset=UTF-8");
 
header("Access-Control-Allow-Methods: GET, POST");
 
// header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers,
// Authorization, X-Requested-With");
 
$servidor = "localhost";
$usuario = "root";
$senha = "";
$banco = "oleotech";
 
$conn = new mysqli($servidor, $usuario, $senha, $banco);
 
if ($conn->connect_error) {
 die(json_encode(["sucesso" => false, "mensagem" => "Falha na conexão: " . $conn->connect_error]));
}
 
$metodo = $_SERVER['REQUEST_METHOD'];
 
 
if ($metodo === 'GET') {
 $sql = "SELECT id_empresa, nome, cep, nome_local , localizacao_y , localizacao_x FROM tb_empresas ORDER BY id_empresa DESC";
 $resultado = $conn->query($sql);
 
 $empresa = [];
 
 $empresa = [];
 if ($resultado->num_rows > 0) {
 
 
 // Pega cada linha do resultado e adiciona ao array $pessoas
  while($linha = $resultado->fetch_assoc()) {
//  // Converte a idade para número para consistência no JSON
  $empresa[] = $linha;
  }
 }
 echo json_encode($empresa);
}



 
// if (isset($data->email) && isset($data->senha)) {
//     $email = $data->email;
//     $senha = $data->senha;
//     // continue com a lógica de login
// } else {
//     echo json_encode([
//         "sucesso" => false,
//         "mensagem" => "Dados ausentes ou malformados"
//     ]);
// }
 
// // Verifica em tb_coletores
// $stmt1 = $conn->prepare("SELECT id_coletor FROM tb_coletores WHERE email = ?");
// $stmt1->bind_param("s", $email);
// $stmt1->execute();
// $result1 = $stmt1->get_result();
 
// if ($row1 = $result1->fetch_assoc()) {
//   if (password_verify($coletor, $row1['coletor'])) {
//     echo json_encode(["sucesso" => true, "tipo" => "coletor"]);
//     exit;
//   }
// }
 
// // Verifica em tb_clientes
// $stmt2 = $conn->prepare("SELECT id_cliente  FROM tb_clientes WHERE email = ?");
// $stmt2->bind_param("s", $email);
// $stmt2->execute();
// $result2 = $stmt2->get_result();
 
// if ($row2 = $result2->fetch_assoc()) {
//   if (password_verify($cliente, $row2['cliente'])) {
//     echo json_encode(["sucesso" => true, "tipo" => "cliente"]);
//     exit;
//   }
// }
 
// echo json_encode(["sucesso" => false, "mensagem" => "Email ou senha inválidos"]);
$conn->close();
 
 
 
?>