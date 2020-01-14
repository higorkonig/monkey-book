<?php
session_start();
require_once('conexao.php');

$nome = $_POST['nome'];
$email = $_POST['email'];
$senha = $_POST['senha'];
$id = $_SESSION['token_acesso'];


if ($senha == '') {
    $update = $conn->query("UPDATE mb_usuarios SET user_nome='$nome', user_email='$email' WHERE user_id ='$id'");
} else {
    $senha_nova = password_hash($senha, PASSWORD_BCRYPT);
    $update = $conn->query("UPDATE mb_usuarios SET user_nome='$nome', user_email='$email', user_senha='$senha_nova' WHERE user_id ='$id'");
}

if ($update) {
    header('Location: ../editar-perfil.php?s=sucesso');
    exit;
} else {
    header('Location: ../editar-perfil.php?e=erro');
    exit;
}
