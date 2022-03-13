<?php
$nomeCliente = $_POST['nomeCliente'];
$dtNascCliente = $_POST['dtNascCliente'];
$cpfCliente = $_POST['cpfCliente'];
$rgCliente = $_POST['rgCliente'];
$telefoneCliente = $_POST['telefoneCliente'];
$host = "localhost";
$dbUsername = "root";
$dbpassword = "";
$dbName = "trabalho";
$conn = new mysqli($host, $dbUsername, $dbpassword, $dbName);
if (mysqli_connect_error()) {
    die('Connect Error(' . mysqli_connect_errno() . ')' . mysqli_connect_error());
}
//UPDATE `clientes` SET `nomeCliente`='[value-1]',`dtNascCliente`='[value-2]',`cpfCliente`='[value-3]',`rgCliente`='[value-4]',`telefoneCliente`='[value-5]' WHERE 1
$UPDATE = 'UPDATE clientes SET nomeCliente = "' . $nomeCliente . '" , dtNascCliente = '."'" . $dtNascCliente . "' , rgCliente = " . $rgCliente . ", telefoneCliente = " . $telefoneCliente . " WHERE cpfCliente = " . $cpfCliente;
$query =mysqli_query($conn, $UPDATE);
echo ($UPDATE);

header('Location: '."http://localhost/gerenciamento/gerenciamento/backend/routes/gerenciamento/gerenciamento.php");