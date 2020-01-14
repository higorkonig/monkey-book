<?php
session_start();
require_once('conexao.php');

$email = $_POST['email'];
$senha = $_POST['senha'];

$resultado = $conn->query("SELECT user_email, user_senha, user_id FROM mb_usuarios WHERE user_email = '$email'");

 if ($resultado->num_rows < 1) {
    header('Location: ../index.php?e=nao_existe');
    exit;
}

$linha = $resultado->fetch_array();

$senha_no_bd = $linha['user_senha'];
$token = $linha['user_id'];


if (password_verify($senha, $senha_no_bd)){
    $_SESSION['token_acesso'] = $token;
    header('Location: ../home.php');
    exit;
}else {
    header('Location: ../index.php?e=incorreto');
    exit;
}

