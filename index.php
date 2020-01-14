<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <link rel="shortcut icon" href="img/icon.png" type="image/x-icon">
  <link rel="stylesheet" href="css/style.css">
  <title>Login - Mokey Book</title>
</head>

<body>
  <div class="container">
    <form action="php/login.php" method="POST" class="login">
      <img src="img/login.png" class="img">
      <input class="campo" type="email" name="email" placeholder="Email" required>
      <input class="campo" type="password" name="senha" placeholder="Senha" required>
      <button class="btn" type="submit">Entrar</button>
      <?php
      if (isset($_GET['e'])) {
        $erro = $_GET['e'];
        if ($erro == "incorreto") {
          echo "<div class='error'>
                  <span>Login e/ou senha incorreto(s)!</span>
              </div>";
        } else if ($erro == "nao_existe") {
          echo "<div class='error'>
                  <span>Usuário não existe</span>
              </div>";
        } else {
          echo "";
        }
      }
      ?>

      <a href="cadastro.php" class="esqueciSenha">Cadastre-se</a><br>
      <a href="" class="esqueciSenha">Esqueceu a senha?</a>

    </form>
  </div>

  <footer class="footer">
    <p>Desenvolvido por <a target="_blank" href="https://www.instagram.com/higor.konig/" style="text-decoration: none;">@higor.konig</a></p>
    <p>GitHub <a target="_blank" href="https://www.github.com/higorkonig/" style="text-decoration: none;">higorkonig</a></p>
  </footer>
</body>

</html>