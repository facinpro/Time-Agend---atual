<?php 

include_once('servicos.php');
include_once(__DIR__ . '/../../config/conection.php');
include_once(__DIR__ . '/../../config/url.php');


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $telefone = $_POST['telefone'];
    $email = $_POST['email'];
    $site = $_POST['site'];
    $local = $_POST['local'];

    echo $telefone;
    echo $email;    
    echo $site;
    echo $local;

    $info = new Empresa($con);
    $info->setEmpresa($local,$telefone,$email,$site);

    header('Location: ' . BASE_URL . 'adm/index.php');
    exit;
}