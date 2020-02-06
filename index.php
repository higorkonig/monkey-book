<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="css/hacker.css">
  <title>Desafio</title>
</head>

<body>


  <div class="container">
    <div class="col-md-4">

    </div>
    <div class="col-md-4" style="margin-top: 20%;">
    <h1 class="mb-2">Login </h1>
      <form>
        <div class="form-group">
          <label>E-mail</label>
          <input type="email" class="form-control"name="email" placeholder="E-mail">
        </div>
        <div class="form-group">
          <label >Senha</label>
          <input type="password" class="form-control" name="senha" placeholder="Senha">
        </div>
        <button type="submit" class="btn btn-primary">Entrar</button>
      </form>

      <?php 
      
    if(isset($_GET['senha'])) {
      echo $_GET['senha'];
    }else {
      
    }
      
      ?>
    </div>
    <div class="col-md-4">

    </div>
  </div>

  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</body>

</html>