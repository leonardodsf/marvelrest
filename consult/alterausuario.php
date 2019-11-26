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
<html lang="en">
  <head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Alterar Usuario</title>
    <link rel="stylesheet" href="style.css"/>
    <link rel="shortcut icon" href="icon.png" type="image/x-icon" />
  </head>
  <body class="body">
    <section class="form-section">
      <h1>Preencha para alterar</h1>
      <div class="form-wrapper">                
        <form action="alterausuario.php?idusuario=<?=$_GET['idusuario'];?>" method="post" class="row">            
          <input type="hidden" name="idusuario" value= "<?=$_GET['idusuario']?>">
          <?php
        require "../banco.php";
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (empty($_POST["login"]) || empty($_POST["senha"]) || empty($_POST['idusuario']) || empty($_POST['email'])) {
              echo "<p><b>Preencha todos os campos!</b></p>";
            } else {
              $login = $_POST["login"];
              $senha = md5($_POST["senha"]);
              $email = $_POST["email"];
              $idusuario = $_POST["idusuario"];
              $sql = "UPDATE marvelusuario SET
               login = '$login',
               senha = '$senha',
               email = '$email'
               WHERE idusuario = $idusuario";
              if ($conn->query($sql) === TRUE) {
              echo "<b><div class='alert alert-success col-4'
              role='alert'>Usuario alterado com sucesso!</div></b><br/>";
            } else {
                echo "<b><div class='alert alert-danger'
                role='alert'>Erro: $sql<br/>$conn->error</div><b/><br/>";
              }
              $conn->close();
            }
        }
        $loginBanco;
        $emailBanco;
        require "../banco.php";
        $sql = "SELECT * FROM marvelusuario
                WHERE idusuario = " . $_GET['idusuario'];
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                 while ($row = $result->fetch_assoc()) {
                 $loginBanco = $row['login'];
                 $emailBanco = $row['email'];
                 }
               }
        ?>
          <div class="input-block">
            <label for="login">Login</label>
            <input type="login" value="<?=$loginBanco;?>" name="login" placeholder="Digite um novo login" id="login"/>
          </div>
          <div class="input-block">
            <label for="login-email">Email</label>
            <input type="email" value="<?=$emailBanco;?>" name="email" placeholder="Digite um novo email" id="login-email" />
          </div>
          <div class="input-block">
            <label for="login-password">Senha</label>
            <input type="password" name="senha" placeholder="Digite uma nova senha" id="login-password" />
          </div>
          <div>
          <button type="submit" class="btn-login">Alterar</button>
          <br>
          <button type="submit" class="btn-sign"><a href="../consult/users.php">Voltar</a></button>
          </div>         
        </form>
      </div>
    </section>

    <ul class="squares"></ul>
  </body>
</html>
