<?php
$lougradouroEndereco = $_POST['lougradouroEndereco'];
$bairroEndereco = $_POST['bairroEndereco'];
$cidadeEndereco = $_POST['cidadeEndereco'];
$ufEndereco = $_POST['ufEndereco'];
$complementoEndereco = $_POST['complementoEndereco'];
$referenciaEndereco = $_POST['referenciaEndereco'];
$cepEndereco = $_POST['cepEndereco'];
$idClienteTeste = 9;
// Fazer validacao aqui 


// Conexcao com o banco de dados mandar isso para dentro de uma funcao OU objeto?
include('../../backend/bd/conn.php');
$conn=connBD();

$INSERT = "INSERT INTO enderecocliente( cpfCliente, lougradouroEndereco, bairroEndereco, cidadeEndereco, ufEndereco, complementoEndereco, referenciaEndereco, cepEndereco) VALUES ('$idClienteTeste','$lougradouroEndereco','$bairroEndereco'
,'$cidadeEndereco','$ufEndereco','$complementoEndereco','$referenciaEndereco','$cepEndereco')";
mysqli_query($conn, $INSERT);
