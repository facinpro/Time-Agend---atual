<?php
file_put_contents("log_debug.txt", file_get_contents("php://input"));

// Conexão com o banco
$host = "localhost";
$dbname = "barbearia";
$user = "root";
$senha = "123456";

$conn = new mysqli($host, $user, $senha, $dbname);

// Verifica conexão
if ($conn->connect_error) {
    die("Erro de conexão: " . $conn->connect_error);
}

// Recebe dados do JavaScript (JSON)
$dados = json_decode(file_get_contents("php://input"), true);

$tipoServico = $conn->real_escape_string($dados['tipoServico']);
$profissional = $conn->real_escape_string($dados['profissional']);
$data = $conn->real_escape_string($dados['data']);
$horario = $conn->real_escape_string($dados['horario']);
$valor = $conn->real_escape_string($dados['valor']);

// Insere no banco
$sql = "INSERT INTO agendamentos (tipo_servico, profissional, data, horario, valor)
        VALUES ('$tipoServico', '$profissional', '$data', '$horario', '$valor')";

if ($conn->query($sql) === TRUE) {
    echo "Agendamento salvo com sucesso!";
} else {
    echo "Erro: " . $conn->error;
}

$conn->close();
?>
