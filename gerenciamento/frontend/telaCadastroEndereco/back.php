<?php
$lougradouroEndereco = $_POST['lougradouroEndereco'];
$bairroEndereco = $_POST['bairroEndereco'];
$cidadeEndereco = $_POST['cidadeEndereco'];
$ufEndereco = $_POST['ufEndereco'];
$complementoEndereco = $_POST['complementoEndereco'];
$referenciaEndereco = $_POST['referenciaEndereco'];
$cepEndereco = $_POST['cepEndereco'];
$cpfCliente = $_POST['cpfCliente'];
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
$INSERT = "INSERT INTO enderecocliente(cpfCliente, lougradouroEndereco, bairroEndereco, cidadeEndereco, ufEndereco, complementoEndereco, referenciaEndereco, cepEndereco) VALUES ('$cpfCliente','$lougradouroEndereco','$bairroEndereco'
,'$cidadeEndereco','$ufEndereco','$complementoEndereco','$referenciaEndereco','$cepEndereco')";
mysqli_query($conn, $INSERT);

//REDIRECIONAR DEPOIS PARA http://localhost/gerenciamento/gerenciamento/backend/routes/cliente/cliente.php
