<?php

$obj = json_decode(file_get_contents('php://input'));

$idEndereco = $obj->idEndereco;

// Conexcao com o banco de dados mandar isso para dentro de uma funcao OU objeto?
$host = "localhost";
$dbUsername = "root";
$dbpassword = "";
$dbName = "trabalho";

$conn = new mysqli($host, $dbUsername, $dbpassword, $dbName);
if (mysqli_connect_error()) {
    die('Connect Error(' . mysqli_connect_errno() . ')' . mysqli_connect_error());
}
// $arr = array();
$query = "DELETE FROM `enderecocliente` where idEndereco = " . $idEndereco;
$delete = mysqli_query($conn, $query);
http_response_code(200);
echo json_encode(array("message" => "Cliente deletado com sucesso."));
