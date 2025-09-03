<?php
include_once("authfunctions.php");


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = trim($_POST["cadastro-username"]);
    $email = trim($_POST["cadastro-email"]);
    $phone = trim($_POST["cadastro-numero"]);
    $password = password_hash(trim($_POST["cadastro-senha"]), PASSWORD_DEFAULT);

    $sql = "INSERT INTO user (nome_user,phone,email_user, password) VALUES (?, ?, ?, ?)";
    $stmt = $con->prepare($sql);
    $stmt->bind_param("ssss", $name,$phone, $email,  $password);

    if ($stmt->execute()) {
        echo "Cadastro realizado com sucesso!";
    } else {
        echo "Erro no cadastro.";
    }
    
}
?>
