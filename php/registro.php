<?php 

require_once('conexao.php');

$nome = $_POST['nome'];
$email = $_POST['email'];
$senha = $_POST['senha'];

$resultado = $conn->query("SELECT user_email FROM mb_usuarios WHERE user_email='$email'");

if($resultado->num_rows < 1){
    $senha_nova = password_hash($senha, PASSWORD_BCRYPT);
    $gravar = $conn->query("INSERT INTO mb_usuarios(user_nome, user_email, user_senha, user_token, user_admin) VALUES('$nome', '$email','$senha_nova', '$token', 0)");
    if($gravar) {
        header('Location: ../cadastro.php?s=sucesso');
        exit;
    }else {
        header('Location: ../cadastro.php?e=erro');
        exit;
    }
}else {
    header('Location: ../cadastro.php?e=ja_existe');
    exit;
}