<?php

$obj = json_decode(file_get_contents('php://input'));

$cpfCliente = $obj->cpfCliente;

include('../../backend/bd/conn.php');
$conn=connBD();

$query = "DELETE FROM `clientes` where cpfCliente = ".$cpfCliente;
$delete = mysqli_query($conn, $query);
http_response_code(200);
echo json_encode(array("message" => "Cliente deletado com sucesso."));

?>