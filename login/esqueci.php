<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Redefir Senha</title>
    <link rel="stylesheet" href="style.css" />
    <link rel="shortcut icon" href="icon.png" type="image/x-icon" />
  </head>
  <body>
    <section class="form-section">
      <h1>Esqueceu sua Senha</h1>
      <div class="form-wrapper">
        <form action="email.php" method="get" class="row">
          <div class="input-block">
            <label for="login-email">Email</label>
            <input type="email" name="email" placeholder="Digite seu email" id="login-email" />
          </div>
          <div>
          <button type="submit" class="btn-login">Redefinir Senha</button>
          <br>
          <button type="submit" class="btn-sign"><a href="../login/login.php">Voltar</a></button>
          </div>

        </form>
      </div>
    </section>

    <ul class="squares"></ul>
  </body>
</html>
