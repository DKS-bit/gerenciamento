<?php

//AQUI RECEBE O ID ENDERECO
 $obj = json_decode(file_get_contents('php://input'));

 $idEndereco = $obj->idEndereco;

 include('../../backend/bd/conn.php');
 $conn=connBD();
 
$query = "SELECT * FROM enderecocliente where idEndereco = " . $idEndereco;
$manda = mysqli_query($conn, $query);
$string = "[";
while ($row = mysqli_fetch_object($manda)) {
    $string = $string . json_encode($row) . ", ";
}
$string = rtrim($string, ", ");
$string = $string . "]";

http_response_code(201);
echo ($string);
