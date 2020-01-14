<?php

require_once('conexao.php');


$nome = $_POST['nome'];
$resumo = $_POST['resumo'];
$capa = $_FILES['capa'];
$livro = $_FILES['livro'];

$capaNome = mt_rand();
$capaNome .= $capa['name'];

$livroNome = mt_rand();
$livroNome .= $livro['name'];

$tipo_permitidos_capa = ['jpg', 'jpeg', 'png'];

$tipo_permitidos_livro = ['pdf'];

$tipo_do_arquivo_livro = explode('.', $livroNome);
$tipo_do_arquivo_livro = end($tipo_do_arquivo_livro);

$tipo_do_arquivo_capa = explode('.', $capaNome);
$tipo_do_arquivo_capa = end($tipo_do_arquivo_capa);

$novo_nome_capa = md5($capaNome) . '.' . $tipo_do_arquivo_capa;
$novo_nome_livro = md5($livroNome) . '.' . $tipo_do_arquivo_livro;

if (in_array($tipo_do_arquivo_capa, $tipo_permitidos_capa)) {
    if (in_array($tipo_do_arquivo_livro, $tipo_permitidos_livro)) {
        $insert = $conn->query("INSERT INTO mb_livros(livro_nome, livro_resumo, livro_capa, livro_pdf) VALUES('$nome', '$resumo', '$novo_nome_capa', '$novo_nome_livro')");
        if (true) {
            move_uploaded_file($capa['tmp_name'], '../uploads/capa/' . $novo_nome_capa);
            move_uploaded_file($livro['tmp_name'], '../uploads/livros/' . $novo_nome_livro);
            header('Location: ../up-livros.php?s=sucesso');
            exit;
        } else {
            header('Location: ../up-livros.php?e=erro');
            exit;
        }
    } else {
        header('Location: ../up-livros.php?a=livro');
        exit;
    }
} else {
    header('Location: ../up-livros.php?a=capa');
    exit;
}
