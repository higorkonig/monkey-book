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
$name = $linha['user_nome'];
$email = $linha['user_email'];




?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <link rel="shortcut icon" href="img/icon.png" type="image/x-icon">
  <link rel="stylesheet" href="css/style.css">
  <title>Início - Monkey Book</title>
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
    <form action="php/update-parfil.php" method="POST" enctype="multipart/form-data" id="up">
      <?php
      if (isset($_GET['s'])) {
        $sucesso = $_GET['s'];
        if ($sucesso == "sucesso") {
          echo "<div class='sucesso'>
                            <span>Dados Salvos com sucesso!</span>
                        </div>";
        } else {
          echo "";
        }
      }
      if (isset($_GET['e'])) {
        $erro = $_GET['e'];
        if ($erro == "erro") {
          echo "<div class='error'>
                            <span>Erro ao salvar seus dados</span>
                        </div>";
        } else {
          echo "";
        }
      }
      ?>
      <label>Nome: </label>
      <input class="campo" type="text" name="nome" value="<?= $name ?>">
      <label>E-mail: </label>
      <input class="campo" type="text" name="email" value="<?= $email ?>">

      <label>Nova Senha: </label>
      <input class="campo" type="password" name="senha" placeholder="Nova senha">

      <button class="btn" type="submit">Salvar</button>
    </form>
  </div>


  <footer class="footer">
    <p>Desenvolvido por <a target="_blank" href="https://www.instagram.com/higor.konig/" style="text-decoration: none;">@higor.konig</a></p>
    <p>GitHub <a target="_blank" href="https://www.github.com/higorkonig/" style="text-decoration: none;">higorkonig</a></p>
  </footer>
</body>

</html>