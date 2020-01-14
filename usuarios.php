<?php
require_once('php/conexao.php');
session_start();

if (!isset($_SESSION['token_acesso'])) {
  header('Location: index.php');
  exit;
}

$token = $_SESSION['token_acesso'];


$consulta = $conn->query("SELECT * FROM mb_usuarios WHERE user_id = '$token'");
$linha = $consulta->fetch_array();
$admin = $linha['user_admin'];

if ($admin == 0) {
  header('Location: index.php');
  exit;
}

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <link rel="shortcut icon" href="img/icon.png" type="image/x-icon">
  <link rel="stylesheet" href="css/style.css">
  <title>Livros - Monkey Book</title>
</head>

<body>

  <div class="main">
    <img src="img/monkey-book.png" width="200" alt="Logo Monkey Book" />
    <nav id="menu">
      <ul>
        <li><a href="home.php">Início</a></li>
        <?php
        if ($admin == 1) {
          echo " <li><a href='livros.php'>Gerenciar livros</a></li>";
          echo "<li><a href='usuarios.php'>Gerenciar usuários</a></li>";
        } else {
          echo "<li><a href='editar-perfil.php'>Editar Perfil</a></li>";
        }
        ?>
        <li><a href="php/sair.php">Sair</a></li>
      </ul>
    </nav>
    <div id="tabela">
      <table style="margin-left: -40px;">
        <thead>
          <th>Nome</th>
          <th>E-mail</th>
          <th>Administrador</th>
          <th>Ações</th>
        </thead>
        <tbody>
          <?php
          $procura = $conn->query("SELECT * FROM mb_usuarios ORDER BY user_nome ASC");
          while ($linha = $procura->fetch_array()) {
            $nome = $linha['user_nome'];
            $email = $linha['user_email'];
            $admin = $linha['user_admin'];
            if ($admin == 1) {
              $mostra = "Administrador";
            } else {
              $mostra = "Comum";
            }
            echo "<tr>
                                <td>$nome</td>
                                <td>$email</td>
                                <td>$mostra</td>
                                <td><a href=''>Editar</a>&nbsp;<a href=''>Apagar</a></td>
                            </tr>";
          }
          ?>
        </tbody>
      </table>
    </div>
  </div>

  <footer class="footer">
    <p>Desenvolvido por <a target="_blank" href="https://www.instagram.com/higor.konig/" style="text-decoration: none;">@higor.konig</a></p>
    <p>GitHub <a target="_blank" href="https://www.github.com/higorkonig/" style="text-decoration: none;">higorkonig</a></p>
  </footer>
</body>

</html>