<?php
$nomeCliente = $_POST['nomeCliente'];
$dtNascCliente = $_POST['dtNascCliente'];
$cpfCliente = $_POST['cpfCliente'];
$rgCliente = $_POST['rgCliente'];
$telefoneCliente = $_POST['telefoneCliente'];
$lougradouroEndereco = $_POST['lougradouroEndereco'];
$bairroEndereco = $_POST['bairroEndereco'];
$cidadeEndereco = $_POST['cidadeEndereco'];
$ufEndereco = $_POST['ufEndereco'];
$complementoEndereco = $_POST['complementoEndereco'];
$referenciaEndereco = $_POST['referenciaEndereco'];
$cepEndereco = $_POST['cepEndereco'];
// Fazer validacao aqui 


include('../../backend/bd/conn.php');
$conn=connBD();

if(!validarCPF($cpfCliente)){
    die('CPF Invalido');
}



    $INSERT1 = "INSERT INTO clientes( nomeCliente, dtNascCliente, cpfCliente, rgCliente, telefoneCliente) VALUES ('$nomeCliente','$dtNascCliente'
    ,'$cpfCliente','$rgCliente','$telefoneCliente')";
    mysqli_query($conn, $INSERT1);

    $INSERT = "INSERT INTO enderecocliente(cpfCliente, lougradouroEndereco, bairroEndereco, cidadeEndereco, ufEndereco, complementoEndereco, referenciaEndereco, cepEndereco) VALUES ('$cpfCliente','$lougradouroEndereco','$bairroEndereco'
,'$cidadeEndereco','$ufEndereco','$complementoEndereco','$referenciaEndereco','$cepEndereco')";
mysqli_query($conn, $INSERT);
    // Funcao de validar CPF encontrada aqui: https://gist.github.com/rafael-neri/ab3e58803a08cb4def059fce4e3c0e40
    function validarCPF($cpf){
         
    // Extrai somente os números
    $cpf = preg_replace( '/[^0-9]/is', '', $cpf );
     
    // Verifica se foi informado todos os digitos corretamente
    if (strlen($cpf) != 11) {
        return false;
    }

    // Verifica se foi informada uma sequência de digitos repetidos. Ex: 111.111.111-11
    if (preg_match('/(\d)\1{10}/', $cpf)) {
        return false;
    }

    // Faz o calculo para validar o CPF
    for ($t = 9; $t < 11; $t++) {
        for ($d = 0, $c = 0; $c < $t; $c++) {
            $d += $cpf[$c] * (($t + 1) - $c);
        }
        $d = ((10 * $d) % 11) % 10;
        if ($cpf[$c] != $d) {
            return false;
        }
    }
    return true;

}
    

    
header('Location: '."http://localhost/gerenciamento/gerenciamento/backend/routes/gerenciamento/gerenciamento.php");
