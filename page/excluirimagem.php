<?php
if (empty($_GET['idpostagem'])){
  header("Location: landingpage.php");
  //header direciona o servidor pra outra pagina ou localização
  die ();
}
?>
<?php
session_start();
$login = "";
if (isset($_SESSION["login"])){
  $login = $_SESSION["login"];
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
    <link rel="stylesheet" href="./style2.css" />
    <link rel="shortcut icon" href="icon.png" type="image/x-icon" />
    <title>Imagem Deletada</title>
  </head>
  <body>
    <style>
    .body {
      background-color:#ffffff;
    }
    </style>
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
              <a class="dropdown-item" href="#">Cadastrar Imagem</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="../logoff.php">Sair</a>
            </div>
          <li><a class="user"> <?=$login?> </a></li>
        </ul>
      </nav>
    </header>
    <br>
    <div class="container">   
      <br>
      <h1>Excluída</h1>
      <br>
      <?php
      require '../banco.php';
      $idpostagem = $_GET['idpostagem'];
      $sql = "DELETE FROM marvelpostagem WHERE idpostagem = $idpostagem";
      if ($conn->query($sql) === TRUE) {
          echo "<div class='alert alert-success col-12'
          role='alert'>Imagem excluída com sucesso!</div>";
      } else {
          echo "<div class='alert alert-danger'
          role='alert'>Erro: $sql<br/>$conn->error</div>";
      }
      $conn->close();
      ?>
      <a class="btn btn-success" href="./landingpage.php" role="button">Voltar</a>
    </div>
  </div>
    <!-- Imports dos JavaScripts -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>
