<?php
$lougradouroEndereco = $_POST['lougradouroEndereco'];
$bairroEndereco = $_POST['bairroEndereco'];
$cidadeEndereco = $_POST['cidadeEndereco'];
$ufEndereco = $_POST['ufEndereco'];
$complementoEndereco = $_POST['complementoEndereco'];
$referenciaEndereco = $_POST['referenciaEndereco'];
$cepEndereco = $_POST['cepEndereco'];
$idEndereco = $_POST['idEndereco'];

$host = "localhost";
$dbUsername = "root";
$dbpassword = "";
$dbName = "trabalho";
$conn = new mysqli($host, $dbUsername, $dbpassword, $dbName);
if (mysqli_connect_error()) {
    die('Connect Error(' . mysqli_connect_errno() . ')' . mysqli_connect_error());
}
// UPDATE`enderecocliente` SET `idEndereco`='[value-1]',`cpfCliente`='[value-2]',`lougradouroEndereco`='[value-3]',`bairroEndereco`='[value-4]',`cidadeEndereco`='[value-5]',`ufEndereco`='[value-6]',`complementoEndereco`='[value-7]',`referenciaEndereco`='[value-8]',`cepEndereco`='[value-9]' WHERE 1
$UPDATE = "UPDATE enderecocliente set lougradouroEndereco = " . "'" . $lougradouroEndereco . "'" . " , bairroEndereco = " . "'" . $bairroEndereco . "'" . " , cidadeEndereco = " . "'" . $cidadeEndereco . "'" . " , ufEndereco = " . "'" . $ufEndereco . "'" . " , complementoEndereco = " . "'" . $complementoEndereco . "'" . " , referenciaEndereco = " . "'" . $referenciaEndereco . "'" . ", cepEndereco = " . "'" . $cepEndereco . "'" . " WHERE idEndereco = " . $idEndereco;
$query = mysqli_query($conn, $UPDATE);
echo ($UPDATE);

header('Location: '."http://localhost/gerenciamento/gerenciamento/backend/routes/cliente/cliente.php");