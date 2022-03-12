

let id = sessionStorage.getItem("id");

document.getElementById("idEndereco").value = sessionStorage.getItem("id");

let json = JSON.stringify({ idEndereco: id });
let xhttp = new XMLHttpRequest();

//Qual requisicao sera feita e para onde
xhttp.open("POST", "../../../frontend/telaEditarEndereco/dadosEndereco.php");

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
    console.log(dados);
    document.getElementById("lougradouroEndereco").value = dados[0].lougradouroEndereco;
    document.getElementById("bairroEndereco").value = dados[0].bairroEndereco;
    document.getElementById("cidadeEndereco").value = dados[0].cidadeEndereco;
    document.getElementById("ufEndereco").value = dados[0].ufEndereco;
    document.getElementById("complementoEndereco").value = dados[0].complementoEndereco;
    document.getElementById("referenciaEndereco").value = dados[0].referenciaEndereco;
    document.getElementById("cepEndereco").value = dados[0].cepEndereco;
}