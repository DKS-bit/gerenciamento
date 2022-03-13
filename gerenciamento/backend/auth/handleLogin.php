<?php
require_once("sessao.php");
 $obj = json_decode(file_get_contents('php://input'));

 $usuario= $obj->Username;
 $senha = $obj->Password;

 if (!$usuario || !$senha) {
    http_response_code(500);
    echo json_encode(array("message"=> "Deum ruim no login"));
 } else {

// Conexcao com o banco de dados mandar isso para dentro de uma funcao OU objeto?
$host = "localhost"; 
$dbUsername = "root";
$dbpassword = "";
$dbName = "trabalho";

$conn = new mysqli($host, $dbUsername, $dbpassword, $dbName);
if(mysqli_connect_error()){
    die('Connect Error('.mysqli_connect_errno().')'.mysqli_connect_error());
}

//Verificar se $usuario é igual a $senha no banco
$query = "SELECT username , password From USUARIOS WHERE username = '".$usuario."'";
$resultado = mysqli_query($conn, $query);

$row = mysqli_fetch_row($resultado);


if ($usuario === $row[0] && $senha == $row[1]){

    $chave = criarSessao($usuario);

    if (!empty($chave)) {
        http_response_code(201);
        echo json_encode(array("message" => "Chave criada com sucesso.", "usuario"=> $usuario, "chave" => $chave));
    }
}
else{
    http_response_code(500);
    echo json_encode(array("message"=> "Deum ruim no login"));
}
}
