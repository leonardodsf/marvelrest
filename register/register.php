<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Faça seu Cadastro</title>
    <link rel="stylesheet" href="style.css" />
    <link rel="shortcut icon" href="icon2.png" type="image/x-icon" />
  </head>
  <body>
    <section class="form-section">
      <h1>Entre! ou Cadastre-se</h1>

      <div class="form-wrapper">
        <form method="post" class="row">

          <div class="input-block">
            <label for="login">Login</label>
            <input type="login" name="login" placeholder="Digite seu login" id="login"/>
          </div>
          <div class="input-block">
            <label for="login-email">Email</label>
            <input type="email" name="email" placeholder="Digite seu email" id="login-email" />
          </div>
          <div class="input-block">
            <label for="login-password">Senha</label>
            <input type="password" name="senha" placeholder="Digite sua senha" id="login-password" />
          </div>
          <div>
          <button type="submit" class="btn-login">Cadastrar</button>
          <br>
          <button type="submit" class="btn-sign"><a href="../login/login.php">Entrar com Usuario</a></button>
          </div>
          <?php
          require '../banco.php';
          if ($_SERVER["REQUEST_METHOD"] == "POST") {
           if (empty($_POST["login"]) || empty($_POST["email"]) || empty($_POST["senha"])) {
             echo "<p><b>Preencha todos os campos!</b></>";
           } else {
             $login = $_POST["login"];
             $email = $_POST["email"];
             $senha = md5($_POST["senha"]);
             $sql = "INSERT INTO marvelusuario (login, email, senha)
             VALUES ('$login', '$email', '$senha')";

             if ($conn->query($sql) === TRUE) {
               echo "<br><div class='alert alert-success'
               role='alert'>Usuario cadastrado com sucesso!</div>";
             } else {
               echo "<br><p>Usuario ja cadastrado</p>";
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
