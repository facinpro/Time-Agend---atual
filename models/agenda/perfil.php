<?php 
include_once(__DIR__ . '/../../config/conection.php');
include_once(__DIR__ . '/../../config/url.php');

session_start();

$user = $_SESSION['user_id'] ?? null;

if (!$user) {
    die("Usuário não está logado.");
}

function historico($user){
    global $con;
    $stmt = $con->prepare("SELECT * FROM agendamento WHERE iduser = ?");
    $stmt->bind_param("i", $user);
    $stmt->execute();         
    $result = $stmt->get_result();
    return $result->fetch_all(MYSQLI_ASSOC);
}

function nomeServico($idservico){
    global $con;
    $stmt = $con->prepare("SELECT nome_servico, preco FROM servico WHERE idservico = ?");
    $stmt->bind_param("i", $idservico);
    $stmt->execute();         
    $result = $stmt->get_result();
    $servico = $result->fetch_assoc();
    return $servico ?? null;
}

function nomeBarbeiro($idbarbeiro){
    global $con;
    $stmt = $con->prepare("SELECT nome_barbeiro FROM barbeiro WHERE idbarbeiro = ?");
    $stmt->bind_param("i", $idbarbeiro);
    $stmt->execute();
    $result = $stmt->get_result();
    $barbeiro = $result->fetch_assoc();
    return $barbeiro['nome_barbeiro'] ?? 'Barbeiro não encontrado';
}

$agendamentos = historico($user);

foreach ($agendamentos as $agendamento) {
    $servico = nomeServico($agendamento['idservico']);
    $barbeiro = nomeBarbeiro($agendamento['idbarbeiro']);

    $dataHora = new DateTime($agendamento['data']);
    $dataFormatada = $dataHora->format('d/m/Y');
    $horaFormatada = (new DateTime($agendamento['horario']))->format('H:i');

    if ($servico) {
        echo "Data: " . $dataFormatada . 
             " - Hora: " . $horaFormatada . 
             " - Serviço: " . $servico['nome_servico'] . 
             " - Barbeiro: " . $barbeiro .
             " - Preço: R$" . number_format($servico['preco'], 2, ',', '.') . "<br>";
    } else {
        echo "Data: " . $dataFormatada . 
             " - Hora: " . $horaFormatada . 
             " - Serviço não encontrado<br>";
    }
}
