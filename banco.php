<?php
$servername = "rostirolla.com.br";
$username = "rostirol_qi";
$password = "bancodedados2";
$dbname = "rostirol_banco2";
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("<p>Erro ao conectar com o banco:"
    . $conn->conect_error . "</p>");
}
 ?>
