<?php
$nomeCliente = $_POST['nomeCliente'];
$dtNascCliente = $_POST['dtNascCliente'];
$cpfCliente = $_POST['cpfCliente'];
$rgCliente = $_POST['rgCliente'];
$telefoneCliente = $_POST['telefoneCliente'];
// Fazer validacao aqui 


// Conexcao com o banco de dados mandar isso para dentro de uma funcao OU objeto?
$host = "localhost"; 
$dbUsername = "root";
$dbpassword = "";
$dbName = "trabalho";

$conn = new mysqli($host, $dbUsername, $dbpassword, $dbName);
if(mysqli_connect_error()){
    die('Connect Error('.mysqli_connect_errno().')'.mysqli_connect_error());
}

    $INSERT = "INSERT INTO clientes( nomeCliente, dtNascCliente, cpfCliente, rgCliente, telefoneCliente) VALUES ('$nomeCliente','$dtNascCliente'
    ,'$cpfCliente','$rgCliente','$telefoneCliente')";
    mysqli_query($conn, $INSERT);


?>
