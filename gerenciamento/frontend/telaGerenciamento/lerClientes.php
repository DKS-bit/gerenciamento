<?php
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
$query = "SELECT * FROM clientes LIMIT 2";
$cliente = mysqli_query($conn, $query);
echo "[";
while ($row = mysqli_fetch_object($cliente)) {
    echo json_encode($row);
    echo ",";
}

echo "]";
