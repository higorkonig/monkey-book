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
    <ul class="lista">
      <?php
      $total_reg = '6';

      @$pagina = $_GET['pagina'];

      if (!$pagina) {
        $pac = '1';
      } else {
        $pac = $pagina;
      }

      $inicio = $pac - 1;
      $inicio = $inicio * $total_reg;

      $procura = $conn->query("SELECT * FROM mb_livros ORDER BY livro_nome ASC LIMIT $inicio,$total_reg");

      $tr = $procura->num_rows;
      $tp = $tr / $total_reg;
      $tp = ceil($tp);


      while ($linha = $procura->fetch_array()) {

        $nome = $linha['livro_nome'];
        $resumo = $linha['livro_resumo'];
        $capa = $linha['livro_capa'];
        $livro = $linha['livro_pdf'];


        echo "<li class='linhas'>
                <img class='img-list' src='uploads/capa/$capa' alt='' />
                <footer class='descricao'>
                    <strong>$nome</strong>
                    <p>$resumo</p>
                </footer>
                <div class='buttons'>
                    <a href='uploads/livros/$livro' target='_blank'>
                        <img src='img/ver.png' width='45' alt='Visualizar' />
                    </a>
                    <a href='uploads/livros/$livro' download='$nome'>
                        <img src='img/baixar.png' width='30' alt='Baixar' />
                    </a>
                </div>
            </li>";
      }
      ?>
    </ul>
    <?php
    $anterior = $pac - 1;
    $proximo = $pac + 1;

    if ($pac > 1) {
      echo "<div class='paginacao'>";
      echo "<h6>$pac</h6>";
      echo "<a href='index.php?pagina=1'>Inicio &nbsp;&nbsp;&nbsp;</a>";
      echo "<a href='index.php?pagina=$anterior'><- Anterior</a> ";
    } else {
      echo "<div class='paginacao'>";
    }
    echo " | ";
    if ($tr == $total_reg) {
      echo " <a href='index.php?pagina=$proximo'>Próximo -></a>";
      echo "</div>";
    } else {
      echo "</div>";
    }
    ?>
  </div>



  <footer class="footer">
    <p>Desenvolvido por <a target="_blank" href="https://www.instagram.com/higor.konig/" style="text-decoration: none;">@higor.konig</a></p>
    <p>GitHub <a target="_blank" href="https://www.github.com/higorkonig/" style="text-decoration: none;">higorkonig</a></p>
  </footer>
</body>

</html>