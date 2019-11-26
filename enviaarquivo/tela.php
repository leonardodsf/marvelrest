<?php
session_start();
$login = "";
$idusuario = "";
if (isset($_SESSION["login"])){
  $login = $_SESSION["login"];
  $idusuario = $_SESSION["idusuario"];
} else {
  header ("Location: ../login/login.php");
  die();
}
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <!-- Bootstrap CSS -->
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
      <link rel="shortcut icon" href="icon.png" type="image/x-icon" />
      <link rel="stylesheet" href="./styleTela.css" />
      <title>Enviar Arquivo</title>
  </head>
  <body class="body">
  <header class="header">
      <a href="../page/landingpage.php"> <img class="marvel" src="./marvel.png"> </a>
      <nav>
        <ul class="menu">
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Perfil
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="../consult/users.php">Usuarios Cadastrados</a>
              <a class="dropdown-item" href="../enviaarquivo/tela.php">Cadastrar Imagem</a>
              <a class="dropdown-item" href="../enviaarquivo/lista.php">Imagens Cadastradas</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="../logoff.php">Sair</a>
            </div>
          <li><a class="user"> <?=$login?> </a></li>
        </ul>
      </nav>
    </header>

    <div class="container">
      <br>
      <h1> Enviar arquivo </h1>
      <br>
        <p><h4>Só serão aceitos arquivos (.png e .jpg).</h4></p>
        <br>
        <form class="form" action="envia.php" method="post" enctype="multipart/form-data">
          <input type="hidden" name="idusuario" value="<?=$idusuario;?>">
            <div class="row">
              <div class="form-group col-12">
                <label>Escolha seu arquivo</label>
                <input type="file" name="arquivo" class="form-control">
              </div>
            </div>
            <div class="row">
              <div class="form-group col-12">
                <label>Descrição da imagem</label>
                <input type="text" name="descricao" class="form-control" placeholder="Descrição">
              </div>
            </div>
            <button type="submit" class="btn btn-primary col-12">Enviar</button>
        </form>
    </div>

    <!-- Imports dos JavaScripts -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>
