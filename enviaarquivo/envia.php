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
    <link rel="shortcut icon" href="icon.png" type="image/x-icon" />
    <link rel="stylesheet" href="./styleEnvia.css" />
    <title>Marvel | HQS</title>
  </head>
  <body>
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
      <?php
      require '../banco.php';
      $target_dir = "../arquivos/";
      $target_file = $target_dir . basename($_FILES["arquivo"]["name"]);
      $uploadOk = 1;
      //1 pra sim
      $fileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

      if (file_exists($target_file)) {
          echo "<br/><p>Arquivo já existe!</p>";
          $uploadOk = 0;
          //0 pra não
      }
      //multiplica sempre por 1024 para definir o tamanho, Ex: pra 50mb será (50*1024)
      if ($_FILES["arquivo"]["size"] > 10000000) {
          echo "<br/><p>O tamanho do arquivo excede o limite permitido.</p>";
          $uploadOk = 0;
      }
      // Permitir somente arquivos png e jpg
      if($fileType != "png" && $fileType != "jpg") {
          echo "<br/><p>Só serão aceitos imagens em png e jpg</p>";
          $uploadOk = 0;
      }

      if ($uploadOk == 0) {
          echo "<br/><p>Seu arquivo não foi enviado.</p>";
      } else {
          if (move_uploaded_file($_FILES["arquivo"]["tmp_name"], $target_file)) {
              echo "<br/><p>O arquivo ". basename($_FILES["arquivo"]["name"]). " foi enviado com sucesso!</p>";
              $idusuario = $_POST['idusuario'];
              $descricao = $_POST['descricao'];
              $imagem = $_FILES["arquivo"]["name"];
              if (empty($descricao) || empty($imagem) ) {
                echo "<br/><p><b>Preencha todos os campos!</b></>";
              } else {
                $sql = "INSERT INTO marvelpostagem (idusuario, imagem, descricao) VALUES ($idusuario , '$imagem', '$descricao')";
                if ($conn->query($sql) === TRUE) {
                  echo "<br/><div class='alert alert-success'
                  role='alert'>Postagem cadastrada com sucesso!</div>";
                } else {
                  echo "<br><p>Erro ao cadastrar a postagem...</p>";
                }
                $conn->close();
              }
          } else {
              echo "<br/><p>Ouve um erro ao enviar o seu arquivo.</p>";
          }
      }

      ?>
      <br/>
      <button type="submit" class="btn btn-warning col-12"><a href="./tela.php">Voltar</a></button>
    </div>
    <!-- Imports dos JavaScripts -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>
