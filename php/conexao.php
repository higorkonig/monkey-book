<?php

$servidor = "localhost:3306";
$user = "root";
$senha = "";
$bd = "monkey_book";

$conn = mysqli_connect($servidor, $user, $senha, $bd);

if (!$conn) {
    echo "Falha na conexão com o banco de dados";
}
