<?php
$lougradouroEndereco = $_POST['lougradouroEndereco'];
$bairroEndereco = $_POST['bairroEndereco'];
$cidadeEndereco = $_POST['cidadeEndereco'];
$ufEndereco = $_POST['ufEndereco'];
$complementoEndereco = $_POST['complementoEndereco'];
$referenciaEndereco = $_POST['referenciaEndereco'];
$cepEndereco = $_POST['cepEndereco'];
$idEndereco = $_POST['idEndereco'];

include('../../backend/bd/conn.php');
$conn=connBD();

$UPDATE = "UPDATE enderecocliente set lougradouroEndereco = " . "'" . $lougradouroEndereco . "'" . " , bairroEndereco = " . "'" . $bairroEndereco . "'" . " , cidadeEndereco = " . "'" . $cidadeEndereco . "'" . " , ufEndereco = " . "'" . $ufEndereco . "'" . " , complementoEndereco = " . "'" . $complementoEndereco . "'" . " , referenciaEndereco = " . "'" . $referenciaEndereco . "'" . ", cepEndereco = " . "'" . $cepEndereco . "'" . " WHERE idEndereco = " . $idEndereco;
$query = mysqli_query($conn, $UPDATE);
echo ($UPDATE);

header('Location: '."http://localhost/gerenciamento/gerenciamento/backend/routes/cliente/cliente.php");