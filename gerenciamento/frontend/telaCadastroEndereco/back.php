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


include('../../backend/bd/conn.php');
$conn=connBD();

$INSERT = "INSERT INTO enderecocliente(cpfCliente, lougradouroEndereco, bairroEndereco, cidadeEndereco, ufEndereco, complementoEndereco, referenciaEndereco, cepEndereco) VALUES ('$cpfCliente','$lougradouroEndereco','$bairroEndereco'
,'$cidadeEndereco','$ufEndereco','$complementoEndereco','$referenciaEndereco','$cepEndereco')";
mysqli_query($conn, $INSERT);

//REDIRECIONAR DEPOIS PARA http://localhost/gerenciamento/gerenciamento/backend/routes/cliente/cliente.php
header('Location: '."http://localhost/gerenciamento/gerenciamento/backend/routes/cliente/cliente.php");