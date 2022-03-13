<?php
$username = $_POST['username'];
$password = $_POST['password'];
// Fazer validacao aqui 


// Conexcao com o banco de dados mandar isso para dentro de uma funcao OU objeto?
$host = "localhost";
$dbUsername = "root";
$dbpassword = "";
$dbName = "trabalho";

$conn = new mysqli($host, $dbUsername, $dbpassword, $dbName);
if (mysqli_connect_error()) {
    die('Connect Error(' . mysqli_connect_errno() . ')' . mysqli_connect_error());
}
$INSERT = "INSERT INTO usuarios(username, password) VALUES ('$username','$password')";
mysqli_query($conn, $INSERT);

header('Location: '."http://localhost/gerenciamento/gerenciamento/backend/routes/login/login.php");