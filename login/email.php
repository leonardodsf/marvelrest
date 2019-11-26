<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="shortcut icon" href="icon.png" type="image/x-icon" />
    <link rel="stylesheet" href="styleSend.css" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <title>Redefinição de Senha</title>
  </head>
  <body>
    <div class="container">
    <section>
      <?php
      require("phpmailer/class.phpmailer.php");

      $servername = "rostirolla.com.br";
      $username = "rostirol_qi";
      $password = "bancodedados2";
      $dbname = "rostirol_banco2";

      $nome = $endereco = $login = $assunto = $mensagem = "";

      $conn = new mysqli($servername, $username, $password, $dbname);
      if ($conn->connect_error) {
          die("Erro ao conectar com o banco: ".$conn->connect_error);
      }

      $sql = "SELECT * FROM marvelusuario WHERE email = '".$_GET['email']."'";
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
          while ($row = $result->fetch_assoc()) {
              $idusuario = $row['idusuario'];
              $nome = $row['login'];
              $endereco = $row['email'];
              $login = $row['login'];
              $assunto = 'Recuperação de senha Marvelrest - '.$login;
              $senhaNova = bin2hex(openssl_random_pseudo_bytes(4));
              $senhaMD5 = md5($senhaNova);
              $sql = "UPDATE marvelusuario SET senha = '".$senhaMD5."' WHERE idusuario = ".$idusuario;
              if ($conn->query($sql) === TRUE) {
                  $mensagem = '<p>Olá '.$login.',<br/>Você acaba de realizar um pedido de alteração de senha.<br/>
                  Segue abaixo a sua nova senha:<br/><br/>'.$senhaNova.'<br/><br/>
                  Está com dúvida?<br/>Entre em contato com nossa equipe:<br/> 1+ 382-1235<br/><br/>
                  Atenciosamente,
                  <br/>Marvelrest</p>';
              } else {
                  die("<p>Erro ao gravar nova senha!</p>");
              }
          }
      } else {
          die("<p>E-mail inválido!</p>");
      }

      $mail = new PHPMailer();
      $mail->IsSMTP();
      $mail->CharSet = 'UTF-8';
      $mail->Host = "smtp.gmail.com"; // Servidor SMTP
      $mail->SMTPSecure = "tls"; // conexão segura com TLS
      $mail->Port = 587; // Porta do SMTP
      $mail->SMTPAuth = true; // Caso o servidor SMTP precise de autenticação
      $mail->Username = "tuxeww6@gmail.com"; // SMTP username - email do Gmail
      $mail->Password = "cvxhbewbncgajciz"; // SMTP password - contas com verificação de 2 etapas: https://support.google.com/accounts/answer/185833?hl=pt-BR
      $mail->From = "tuxeww6@gmail.com"; // E-mail de quem envia o email
      $mail->FromName = "Marvelrest Company" ; // Nome de quem envia o email
      $mail->AddAddress($endereco, $nome); // Email e nome de quem receberá
      $mail->WordWrap = 50; // Definir quebra de linha a cada X caracteres
      $mail->IsHTML = true ; // Enviar como HTML
      $mail->Subject = $assunto; // Assunto
      $mail->Body = $mensagem ; //Corpo da mensagem em HTML
      $mail->AltBody = $mensagem ; // Corpo da mensagem caso o recipiente não suporte HTML
      $mail->SMTPDebug  = 1;//PlainText, para caso quem receber o email não aceite o corpo HTML

      if(!$mail->Send()) // Envia o email
       {
       echo "<p>Erro no envio da mensagem...</p>";
       } else {
          echo "<p><h1>E-mail enviado com sucesso!</h1></p>";
      }
      ?>
      <button type="submit" class="btn btn-success col-3"><a href="../login/login.php">Voltar ao Login</a></button>
    </section>
    </div>

    <!-- Imports dos JavaScripts -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>
