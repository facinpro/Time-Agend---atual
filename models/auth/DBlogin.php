<?php
session_start();
require_once 'authFunctions.php';
include_once '../../config/url.php';
include_once '../../config/conection.php'; // Certifique-se de que $con seja a conexão mysqli

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $email = trim($_POST['email'] ?? '');
    $password = $_POST['password'] ?? '';
    $accessType = $_POST['accessType'] ?? '';

    if (empty($email) || empty($password) || empty($accessType)) {
        $_SESSION['erro_login'] = "Preencha todos os campos.";
        header("Location: " . BASE_URL . "/user/login.php");
        exit;
    }
        if ($email === 'adm@gmail.com' && $password === '7777777') {
            logAdm($email, $password);
            exit;
        } elseif ($accessType === 'barbeiro') {
            loginBarbeiro($email, $password);
            exit;
        } elseif ($accessType === 'user') {
            $stmt = $con->prepare("SELECT iduser, nome_user, email_user, password, tipo , phone FROM user WHERE email_user = ? LIMIT 1");
        } else {
            $_SESSION['erro_login'] = "Tipo de acesso inválido.";
            header("Location: " . BASE_URL . "/user/login.php");
            exit;
        }


    // Verifica tipo de acesso e prepara a consulta
    // if ($accessType === 'user') {
    //     $stmt = $con->prepare("SELECT iduser, nome_user, email_user, password, tipo FROM user WHERE email_user = ? LIMIT 1");
    // } elseif ($accessType === 'barbeiro') {
    //    loginBarbeiro($email, $password);
    //    exit;
    // } elseif($email === 'adm@gmail.com' && $password === '7777777'){
    //    logAdm($email, $password);
    //    exit;
    // } else {
    //     $_SESSION['erro_login'] = "Tipo de acesso inválido.";
    //     header("Location: " . BASE_URL . "/user/login.php");
    //     exit;
    // }

    if (!$stmt) {
        die("Erro ao preparar a consulta: " . $con->error);
    }

    // Faz o bind e executa
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    $usuario = $result->fetch_assoc();

    // Validação de senha
    if ($usuario && password_verify($password, $usuario['password'])) {

        if ($accessType === 'user') {
            $_SESSION['user_id'] = $usuario['iduser'];
            $_SESSION['nome_user'] = $usuario['nome_user'];
            $_SESSION['email_user'] = $usuario['email_user'];
            $_SESSION['tipo'] = $usuario['tipo'];
            $_SESSION['user_phone'] = $usuario['phone'] ?? ''; 

            if ($usuario['tipo'] === 'cliente') {
                header("Location: " . BASE_URL . "/public/index.php");
            } else {
                $_SESSION['erro_login'] = "Tipo de usuário não reconhecido.";
                header("Location: " . BASE_URL . "/user/login.php");
            }

        } 

        exit;

    } else {
        $_SESSION['erro_login'] = "Email ou senha inválidos.";
        header("Location: " . BASE_URL . "/user/login.php");
        exit;
    }
} else {
    header("Location: " . BASE_URL . "/user/login.php");
    exit;
}



// var_dump($_POST);
// exit();
// if ($_SERVER["REQUEST_METHOD"] == "POST") {
//     $email = trim($_POST["email"]);
//     $password = trim($_POST["password"]);
//     $tipo = trim($_POST["accessType"]);

//     if (loginUser($email, $password)) {
//         selectInfo($_SESSION['user_id']);
//         header("Location:". BASE_URL ."public/index.php");
//         exit();
//     } else{
//         echo "Email ou senha inválidos!";
//         $_SESSION['msg']= "Email ou senha inválidos!";
//     }
//     if(logAdm($email,$password)){
//        header("Location:" . BASE_URL . "adm/index.php");
//        exit();
//     }else{
//         echo "Erro ao logar!";
//     }
// }
// ?>
