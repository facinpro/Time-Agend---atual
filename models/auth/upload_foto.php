<?php
session_start();
include_once '../../config/url.php';
include_once '../../config/conection.php';

if (!isset($_SESSION['user_id'])) {
    echo "Usuário não logado.";
    exit;
}

$user_id = $_SESSION['user_id'];

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["imagem"])) {
    $imagem = $_FILES["imagem"];

    if ($imagem["error"] === 0) {
        $extensao = strtolower(pathinfo($imagem["name"], PATHINFO_EXTENSION));
        $extensoes_permitidas = ["jpg", "jpeg", "png", "gif"];

        if (in_array($extensao, $extensoes_permitidas)) {

            // Recupera a foto antiga
            $sql = "SELECT foto_perfil FROM user WHERE iduser = ?";
            $stmt = $con->prepare($sql);
            $stmt->bind_param("i", $user_id);
            $stmt->execute();
            $result = $stmt->get_result();
            $usuario = $result->fetch_assoc();

            if ($usuario && $usuario['foto_perfil'] != 'img/uploads/default.png') {
                $foto_antiga = $_SERVER['DOCUMENT_ROOT'] . '/TimeAgend/' . $usuario['foto_perfil'];
                if (file_exists($foto_antiga)) {
                    unlink($foto_antiga);
                }
            }

            // Cria novo nome do arquivo
            $nome_arquivo = "perfil_" . $user_id . "_" . uniqid() . "." . $extensao;
            $upload_dir = $_SERVER['DOCUMENT_ROOT'] . "/TimeAgend/img/uploads/";

            if (!is_dir($upload_dir)) {
                mkdir($upload_dir, 0777, true);
            }

            $caminho = $upload_dir . $nome_arquivo;

            if (move_uploaded_file($imagem["tmp_name"], $caminho)) {
                $caminho_relativo = "img/uploads/" . $nome_arquivo;

                $sql = "UPDATE user SET foto_perfil = ? WHERE iduser = ?";
                $stmt = $con->prepare($sql);
                $stmt->bind_param("si", $caminho_relativo, $user_id);
                $stmt->execute();

                echo json_encode([
                    "status" => "success",
                    "mensagem" => "Upload realizado com sucesso!",
                    "foto" => BASE_URL . $caminho_relativo
                ]);
            } else {
                echo json_encode(["status" => "error", "mensagem" => "Erro ao mover o arquivo."]);
            }

        } else {
            echo json_encode(["status" => "error", "mensagem" => "Formato inválido. Use JPG, JPEG, PNG ou GIF."]);
        }

    } else {
        echo json_encode(["status" => "error", "mensagem" => "Erro ao enviar a imagem."]);
    }

} else {
    echo json_encode(["status" => "error", "mensagem" => "Nenhum arquivo enviado."]);
}
?>
