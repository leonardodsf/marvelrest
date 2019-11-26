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
<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <link rel="stylesheet" href="./style.css" />
    <link rel="shortcut icon" href="icon.png" type="image/x-icon" />
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/ed54e5833d.js" crossorigin="anonymous"></script>
    <link rel="shortcut icon" href="icon2.png" type="image/x-icon" />
    <title>Marvel | HQs</title>
  </head> 
  <body class="body">
    <header class="header">
      <a href="landingpage.php"> <img class="marvel" src="./marvel.png"> </a>
      <nav>
        <ul class="menu">
          <form>
          <div class="search-box">

              <input class="search-txt" type="text" name="pesquisa" placeholder="Pesquisar imagens ...">
              <a class="search-btn" href="pesquisa">
              <i class="fas fa-search"></i>

          </div>
        </form>
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
    <!--     IMAGES      -->
<section class="section">
  <?php
    require '../banco.php';
    $sql = "";
    if (isset($_GET['pesquisa'])) {
      $pesquisa = $_GET['pesquisa'];
      $sql = "SELECT * FROM marvelpostagem mp LEFT JOIN marvelusuario mu ON mp.idusuario = mu.idusuario WHERE mp.descricao like '%$pesquisa%';";
    } else {
        $sql = "SELECT * FROM marvelpostagem mp LEFT JOIN marvelusuario mu ON mp.idusuario = mu.idusuario;";
    }
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
        ?>
      	<div class="postagem">
          <p>Postado por: <?=$row['login'] ?></p>
      		<img src="../arquivos/<?=$row['imagem'] ?>">
          <p><?=$row['descricao'] ?></p>
          <!-- button -->
          <a class="btn btn-danger btn-sm col-12" href="excluirimagem.php?idpostagem=<?=$row["idpostagem"];?>" role="button">Excluir Imagem</a>
        </div>
        
      <?php
          }
        } else {
          echo "<p class='msg_notFound'> Nenhuma postagem cadastrada! </p>";
        }

      ?>
</section>
<section class="bloc1">

</section>
    <!-- Imports dos JavaScripts -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body
</html>
