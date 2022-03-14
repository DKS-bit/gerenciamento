<?php
include('../../backend/bd/conn.php');
$conn=connBD();

$query = "SELECT * FROM clientes";
$cliente = mysqli_query($conn, $query);
$string = "[";
while ($row = mysqli_fetch_object($cliente)) {
    $string = $string . json_encode($row) . ", ";
}
$string = rtrim($string, ", ");
$string = $string . "]";
echo $string;
