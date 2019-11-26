<html lang="en">
  <head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Faça seu Login</title>
    <link rel="stylesheet" href="style.css" />
    <link rel="shortcut icon" href="icon.png" type="image/x-icon" />
  </head>
  <body>
    <section class="form-section">
      <h1>Entre! ou Cadastre-se</h1>
      <div class="form-wrapper">
        <form action="login.php" method="post" class="row">
          <div class="input-block">
            <label for="login">Login</label>
            <input type="login" name="login" placeholder="Digite seu login" id="login"/>
          </div>
          <div class="input-block">
            <label for="login-password">Senha</label>
            <input type="password" name="senha" placeholder="Digite sua senha" id="login-password" />
          </div>
          <div>
          <button type="submit" class="btn-login">Entrar</button>
          <br>
          <button type="submit" class="btn-sign"><a href="../register/register.php">Cadastrar-se</a></button>
          <br>
          <button type="submit" class="btn-login"><a href="../login/esqueci.php">Esqueci minha senha</a></button>      
          </div>
          <?php
        require '../banco.php';
        session_start();

        if ($_SERVER["REQUEST_METHOD"] == "POST"){
          if (empty($_POST["login"]) || empty($_POST["senha"])){
            echo "<br><div class='alert alert-danger col-3' role='alert'> Preencha todos os campos! </div>";
          } else {
            $sql = "SELECT * FROM marvelusuario WHERE login = '".$_POST["login"]."'";
            $result = $conn->query($sql);
            if ($result->num_rows > 0){
              while ($row = $result->fetch_assoc()) {
                $senha = $_POST["senha"];
                $senhaMD5 = md5($senha);
                $senhaBanco = $row["senha"];
                if ($senhaMD5 == $senhaBanco) {
                  $_SESSION["login"] = $row["login"];
                  $_SESSION["idusuario"] = $row["idusuario"];
                  header ("Location: ../page/landingpage.php");
                  die();
                } else {
                  echo "<br><div class='alert alert-danger col-3' role='alert'>Senha incorreta!</div>";
                }
              }
            } else {
                  echo "<br><div class='alert alert-danger col-3' role='alert'>Usuário não encontrado!</div>";
            }
            $conn->close();
          }
        }
        ?>
        </form>
      </div>
    </section>

    <ul class="squares"></ul>
  </body>
</html>
