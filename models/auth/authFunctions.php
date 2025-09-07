<?php
require_once __DIR__ ."/../../config/url.php"; 
require_once __DIR__ . "/../../config/conection.php"; 

function loginBarbeiro($email, $password) {
    global $con;

    $stmt = $con->prepare("SELECT idbarbeiro, nome_barbeiro, email, senha FROM barbeiro WHERE email = ? LIMIT 1");
    
    if (!$stmt) {
        die("Erro ao preparar a consulta: " . $con->error);
    }

    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    $usuario = $result->fetch_assoc();
    $stmt->close();




    if ($usuario && $password === $usuario['senha']) {
        // Login bem-sucedido
        $_SESSION['idbarbeiro'] = $usuario['idbarbeiro'];
        $_SESSION['nome_barbeiro'] = $usuario['nome_barbeiro'];
        $_SESSION['email_barbeiro'] = $usuario['email'];
        $_SESSION['tipo'] = 'barbeiro';

        // Redireciona para o painel do barbeiro
        header("Location: " . BASE_URL . "/adm/index.php");
        exit;
    } else {
        // Login falhou
        $_SESSION['erro_login'] = "Email ou senha inválidos para barbeiro.";
        header("Location: " . BASE_URL . "user/login.php");
        exit;
    }
}


function isAuthenticated() {
     return isset($_SESSION['user_id']) && isset($_SESSION['nome_user']);
    
}

function logoutUser() {
    unset($_SESSION['user_id']); 
    unset($_SESSION['username']);
    
}

function selectInfo( $iduser){
    global $con;
    $sql = "SELECT nome_user, email_user , phone FROM user WHERE iduser = ?";
     $stmt = $con -> prepare($sql);
     $stmt -> bind_param("i", $iduser);
     $stmt -> execute();
     $result = $stmt -> get_result();
     $user = $result -> fetch_assoc();

    if($result -> num_rows > 0){
        $_SESSION['user_name'] = $user['nome_user'];
        $_SESSION['user_email'] = $user['email_user'];
        $_SESSION['user_phone'] = $user['phone'];
        return true;
    }else{
        return false;
    }
}

function logAdm($email,$password){
  $chave = "adm@gmail.com";
  $numero = "7777777";
  if ($email == $chave && $password == $numero){
    $_SESSION['adm'] = $chave;
    header("Location: " . BASE_URL . "/adm/index.php");
    exit();
  }else{
        return false;
        // echo "Erro ao Logar!";
  }
}

function history($iduser){
    global $con;
    $sql = "SELECT 
    a.idagendamento,
    a.data_hora AS data_agendamento,
    p.idpedido,
    p.valor_total,
    p.status AS status_pedido,
    b.name AS barbeiro,
    GROUP_CONCAT(s.nome SEPARATOR ', ') AS servicos
    FROM agendamento a
    JOIN pedido p ON a.idpedido = p.idpedido
    JOIN barbeiros b ON p.idbarbeiro = b.idbarbeiro
    JOIN pedido_servicos ps ON p.idpedido = ps.idpedido
    JOIN servicos s ON ps.idservico = s.idservico
    WHERE p.iduser = ?  -- Substitua pelo ID do usuário
    GROUP BY a.idagendamento
    ORDER BY a.data_hora DESC";
    $stmt = $con -> prepare($sql);
    $stmt -> bind_param(("i") , $iduser);
    $stmt -> execute();
    $result = $stmt -> get_result();



}

class User{
    
    private $con;
    private $iduser;
    private $nome_user;
    private $email_user;
    private $password;
    private $phone;

    public function __construct($con){
        $this->con = $con;
    }


    public function countUser(){
        try {
            $stmt = $this ->con->prepare("SELECT COUNT(*) AS iduser FROM user");
            $stmt->execute();
            $resultado = $stmt->get_result();
            return $resultado->fetch_all(MYSQLI_ASSOC);
        } catch (Exception $e) {
            echo "Erro ao contar usuários: " . $e->getMessage();
            return 0;
        }
    }

    
}

$countUser = new User($con);
$countUser->countUser();