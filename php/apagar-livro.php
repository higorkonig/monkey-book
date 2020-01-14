<?php

require_once('conexao.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $result = $conn->query("SELECT * FROM mb_livros WHERE livro_id='$id'");
    $linha = $result->fetch_array();

    $capa = $linha['livro_capa'];
    $livro = $linha['livro_pdf'];

    if ((unlink("../uploads/capa/$capa")) && (unlink("../uploads/livros/$livro"))) {

        $del = $conn->query("DELETE FROM mb_livros WHERE livro_id='$id'");

        if ($del) {
            header('Location: ../livros.php?s=sucesso');
            exit;
        } else {
            header('Location: ../livros.php?e=erro');
            exit;
        }
    } else {
        header('Location: ../livros.php?e=error');
        exit;
    }
}
