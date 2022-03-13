<?php
$nomeCliente = $_POST['nomeCliente'];
$dtNascCliente = $_POST['dtNascCliente'];
$cpfCliente = $_POST['cpfCliente'];
$rgCliente = $_POST['rgCliente'];
$telefoneCliente = $_POST['telefoneCliente'];

include('../../backend/bd/conn.php');
$conn=connBD();

//UPDATE `clientes` SET `nomeCliente`='[value-1]',`dtNascCliente`='[value-2]',`cpfCliente`='[value-3]',`rgCliente`='[value-4]',`telefoneCliente`='[value-5]' WHERE 1
$UPDATE = 'UPDATE clientes SET nomeCliente = "' . $nomeCliente . '" , dtNascCliente = '."'" . $dtNascCliente . "' , rgCliente = " . $rgCliente . ", telefoneCliente = " . $telefoneCliente . " WHERE cpfCliente = " . $cpfCliente;
$query =mysqli_query($conn, $UPDATE);
echo ($UPDATE);

header('Location: '."http://localhost/gerenciamento/gerenciamento/backend/routes/gerenciamento/gerenciamento.php");