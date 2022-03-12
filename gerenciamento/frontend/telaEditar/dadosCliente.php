<?php

//AQUI RECEBE O CPF CLIENTE
 $obj = json_decode(file_get_contents('php://input'));

 $cpfCliente = $obj->cpfCliente;

// Conexcao com o banco de dados mandar isso para dentro de uma funcao OU objeto?
$host = "localhost";
$dbUsername = "root";
$dbpassword = "";
$dbName = "trabalho";

$conn = new mysqli($host, $dbUsername, $dbpassword, $dbName);
if (mysqli_connect_error()) {
    die('Connect Error(' . mysqli_connect_errno() . ')' . mysqli_connect_error());
}
$query = "SELECT * FROM clientes where cpfCliente = " . $cpfCliente;
$manda = mysqli_query($conn, $query);
$string = "[";
while ($row = mysqli_fetch_object($manda)) {
    $string = $string . json_encode($row) . ", ";
}
$string = rtrim($string, ", ");
$string = $string . "]";

http_response_code(201);
echo ($string);
