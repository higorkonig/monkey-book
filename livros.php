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
      <?php

      if (isset($_GET['s'])) {
        $sucesso = $_GET['s'];
        if ($sucesso == "sucesso") {
          echo "<div class='sucesso'>
                                <span>Deletado com sucesso com sucesso!</span>
                        </div>";
        } else {
          echo "";
        }
      }

      ?>
      <h1>Gerenciamento de Livros</h1>
      <a href="up-livros.php"><button class="btn">Adicionar Livro</button></a>
      <table>
        <thead>
          <th>Capa</th>
          <th>Nome do livre</th>
          <th>Opções</th>
        </thead>
        <tbody>
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
            $id = $linha['livro_id'];


            echo "<tr>
                                <td><img src='uploads/capa/$capa' width='30'></td>
                                <td>$nome</td>
                                <td><a href='php/apagar-livro.php?id=$id'>Apagar</a></td>
                            </tr>";
          }
          ?>
        </tbody>
      </table>
      <?php
      $anterior = $pac - 1;
      $proximo = $pac + 1;

      if ($pac > 1) {
        echo "<div class='paginacao'>";
        echo "<h6>$pac</h6>";
        echo "<a href='livros.php?pagina=1'>Inicio &nbsp;&nbsp;&nbsp;</a>";
        echo "<a href='livros?pagina=$anterior'><- Anterior</a> ";
      } else {
        echo "<div class='paginacao'>";
      }
      echo " | ";
      if ($tr == $total_reg) {
        echo " <a href='livros.php?pagina.php=$proximo'>Próximo -></a>";
        echo "</div>";
      } else {
        echo "</div>";
      }
      ?>
    </div>
  </div>

  <footer class="footer">
    <p>Desenvolvido por <a target="_blank" href="https://www.instagram.com/higor.konig/" style="text-decoration: none;">@higor.konig</a></p>
    <p>GitHub <a target="_blank" href="https://www.github.com/higorkonig/" style="text-decoration: none;">higorkonig</a></p>
  </footer>
</body>

</html>