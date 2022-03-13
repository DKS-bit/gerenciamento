<?php
$username = $_POST['username'];
$password = $_POST['password'];
// Fazer validacao aqui 

include('../../backend/bd/conn.php');
$conn=connBD();

$INSERT = "INSERT INTO usuarios(username, password) VALUES ('$username','$password')";
mysqli_query($conn, $INSERT);

header('Location: '."http://localhost/gerenciamento/gerenciamento/backend/routes/login/login.php");