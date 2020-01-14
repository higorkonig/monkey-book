<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <link rel="shortcut icon" href="img/icon.png" type="image/x-icon">
  <link rel="stylesheet" href="css/style.css">
  <title>Cadastro - Mokey Book</title>
</head>

<body>
  <div class="container">
    <form action="php/registro.php" method="POST" class="login">
      <img src="img/cadastro.png" class="img">
      <p class="info">Campos com * são obrigátorios</p>
      <label>Nome*: </label>
      <input class="campo" type="text" name="nome" placeholder="Ex. José Carlos" required>
      <label>Email*: </label>
      <input class="campo" type="email" name="email" placeholder="jose.carlos@casadosmeninos.com" required>
      <label>Senha*: </label>
      <input class="campo" type="password" name="senha" placeholder="******" required>
      <button class="btn" type="submit">Cadastrar-se</button>
      <?php
      if (isset($_GET['s'])) {
        $sucesso = $_GET['s'];
        if ($sucesso == "sucesso") {
          echo "<div class='sucesso'>
                                <span>Cadastro realizado com sucesso!</span>
                            <a href='index'><button class='btn' type='button' style='padding-left: 50px; padding-right: 50px;'>Entrar</button></a>
                            </div>";
        } else {
          echo "";
        }
      }

      if (isset($_GET['e'])) {
        $erro = $_GET['e'];
        if ($erro == "ja_existe") {
          echo "<div class='error'>
                            <span>E-mail já está em uso!</span>
                        </div>";
        } else if ($erro == "erro") {
          echo "<div class='error'>
                            <span>Erro ao cadastrar</span>
                        </div>";
        } else {
          echo "";
        }
      }
      ?>
      <a href='index.php' class="retorno">Voltar</a>
    </form>
  </div>

  <footer class="footer">
    <p>Desenvolvido por <a target="_blank" href="https://www.instagram.com/higor.konig/" style="text-decoration: none;">@higor.konig</a></p>
    <p>GitHub <a target="_blank" href="https://www.github.com/higorkonig/" style="text-decoration: none;">higorkonig</a></p>
  </footer>
</body>

</html>