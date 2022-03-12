sessionStorage.getItem("cpf");
document.getElementById("cpfCliente").value = sessionStorage.getItem("cpf");

let cpf = sessionStorage.getItem("cpf");

let json = JSON.stringify({ cpfCliente: cpf });
let xhttp = new XMLHttpRequest();

//Qual requisicao sera feita e para onde
xhttp.open("POST", "../../../frontend/telaEditar/dadosCliente.php");

//metodo chamado quando a requisicao for concluida
xhttp.addEventListener('readystatechange', (ev) => {

    let xhttp = ev.target;
    if (xhttp.readyState === XMLHttpRequest.DONE) {

        var responseData = JSON.parse(xhttp.responseText);

        if (xhttp.status === 201) {
            let dados = JSON.parse(xhttp.responseText);
            preencherFormulario(dados);

        }
        else
            alert(responseData.message);
    }
});

//tipo de header que sera enviado na requisicao
xhttp.setRequestHeader('Content-Type', 'application/json');

//envio de requisicao
xhttp.send(json);


function preencherFormulario(dados){
    document.getElementById("nomeCliente").value = dados[0].nomeCliente;
    document.getElementById("dtNascCliente").value = dados[0].dtNascCliente;
    document.getElementById("rgCliente").value = dados[0].rgCliente;
    document.getElementById("telefoneCliente").value = dados[0].telefoneCliente;
}