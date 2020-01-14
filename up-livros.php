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

    <form action="php/processo-livros.php" method="POST" enctype="multipart/form-data" id="up">
      <?php
      if (isset($_GET['s'])) {
        $sucesso = $_GET['s'];
        if ($sucesso == "sucesso") {
          echo "<div class='sucesso'>
                            <span>Livro cadastrado com sucesso!</span>
                        </div>";
        } else {
          echo "";
        }
      }
      if (isset($_GET['e'])) {
        $erro = $_GET['e'];
        if ($erro == "erro") {
          echo "<div class='error'>
                            <span>Erro ao cadastrar o livro</span>
                        </div>";
        } else {
          echo "";
        }
      }
      if (isset($_GET['a'])) {
        $erro = $_GET['a'];
        if ($erro == "capa") {
          echo "<div class='alerta'>
                            <span>Só aceitamos PNG, JPG e JPEG como extensão da capa</span>
                        </div>";
        } else if ($erro == "livro") {
          echo "<div class='alerta'>
                            <span>Só aceitamos livros em PDF</span>
                        </div>";
        } else {
          echo "";
        }
      }
      ?>
      <p class="info">Campos com * são obrigátorios<br>Ao clicar em cadastrar aguerda o aviso de sucesso!</p>
      <label>Nome*: </label>
      <input class="campo" type="text" name="nome" placeholder="Harry Potter e a câmara secreta" required>

      <label>Sinopse*: </label>
      <textarea type="text" name="resumo" rows="10" placeholder="Harry Potter é um garoto órfão que vive infeliz com seus tios, os Dursleys. Ele recebe uma carta contendo um convite para ingressar em Hogwarts, uma famosa escola especializada em formar jovens bruxos. Inicialmente, Harry é impedido de ler a carta por seu tio, mas logo recebe a visita de Hagrid, o guarda-caça de Hogwarts, que chega para levá-lo até a escola. Harry adentra um mundo mágico que jamais imaginara, vivendo diversas aventuras com seus novos amigos, Rony Weasley e Hermione Granger." required></textarea>

      <label>Capa do livro*: </label>
      <input class="campo arquivo" type="file" name="capa" required>

      <label>Livro em PDF*: </label>

      <input class="campo arquivo" type="file" name="livro" required>
      <button class="btn" type="submit">Cadastrar</button>
    </form>
  </div>

  <footer class="footer">
    <p>Desenvolvido por <a target="_blank" href="https://www.instagram.com/higor.konig/" style="text-decoration: none;">@higor.konig</a></p>
    <p>GitHub <a target="_blank" href="https://www.github.com/higorkonig/" style="text-decoration: none;">higorkonig</a></p>
  </footer>
</body>

</html>