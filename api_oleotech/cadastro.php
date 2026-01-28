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
if ($metodo === 'POST') {
    $dados = json_decode(file_get_contents("php://input"));

    if (!isset($dados->nome) || !isset($dados->email) || !isset($dados->senha) || !isset($dados->cep) || !isset($dados->cpf) || !isset($dados->telefone)) {
        echo json_encode(["sucesso" => false, "mensagem" => "Todos os campos são obrigatórios."]);
        exit;
    }

    $nome = $dados->nome;
    $email = $dados->email;
    $senha = $dados->senha;
    $cep = $dados->cep;
    $cpf = $dados->cpf;
    $telefone = $dados->telefone;

    $stmt = $conn->prepare("INSERT INTO tb_clientes (nome, email, senha, cep, cpf, telefone) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssss", $nome, $email, $senha, $cep, $cpf, $telefone);

    if ($stmt->execute()) {
        echo json_encode(["sucesso" => true, "mensagem" => "Usuario Cadastrado!"]);
    } else {
        echo json_encode(["sucesso" => false, "mensagem" => "Erro ao adicionar usuario: " . $stmt->error]);
    }

    $stmt->close();
}
 
 

// Fecha a conexão com o banco
$conn->close();
?> 