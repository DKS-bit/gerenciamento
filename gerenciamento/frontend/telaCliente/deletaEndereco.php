<?php

$obj = json_decode(file_get_contents('php://input'));

$idEndereco = $obj->idEndereco;

include('../../backend/bd/conn.php');
$conn=connBD();

// $arr = array();
$query = "DELETE FROM `enderecocliente` where idEndereco = " . $idEndereco;
$delete = mysqli_query($conn, $query);
http_response_code(200);
echo json_encode(array("message" => "Cliente deletado com sucesso."));
