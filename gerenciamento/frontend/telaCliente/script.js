let cpf = sessionStorage.getItem("cpf");

let json = JSON.stringify({ cpfCliente: cpf });
let xhttp = new XMLHttpRequest();

//Qual requisicao sera feita e para onde
xhttp.open("POST", "../../../frontend/telaCliente/lerEnderecos.php");

//metodo chamado quando a requisicao for concluida
xhttp.addEventListener('readystatechange', (ev) => {

    let xhttp = ev.target;
    if (xhttp.readyState === XMLHttpRequest.DONE) {

        var responseData = JSON.parse(xhttp.responseText);

        if (xhttp.status === 201) {
            let dados = JSON.parse(xhttp.responseText);
            preencherTabela(dados);

        }
        else
            alert(responseData.message);
    }
});

//tipo de header que sera enviado na requisicao
xhttp.setRequestHeader('Content-Type', 'application/json');

//envio de requisicao
xhttp.send(json);

let tabela = document.getElementById('teste');


function preencherTabela(dados) {
    for (let j = 0, k = 1; j != dados.lenght; j++, k++) {
        let linha = tabela.insertRow(k);
        let cell = [];
        let i = 0;
        switch (i) {
            case 0:
                cell[i] = linha.insertCell(i);
                cell[i].innerHTML = dados[j].idEndereco;
                i++;
            case 1:
                cell[i] = linha.insertCell(i);
                cell[i].innerHTML = dados[j].lougradouroEndereco;
                i++;
            case 2:
                cell[i] = linha.insertCell(i);
                cell[i].innerHTML = dados[j].bairroEndereco;
                i++;
            case 3:
                cell[i] = linha.insertCell(i);
                cell[i].innerHTML = dados[j].cidadeEndereco;
                i++;
            case 4:
                cell[i] = linha.insertCell(i);
                cell[i].innerHTML = dados[j].ufEndereco;
                i++;
            case 5:
                cell[i] = linha.insertCell(i);
                cell[i].innerHTML = dados[j].complementoEndereco;
                i++;
            case 6:
                cell[i] = linha.insertCell(i);
                cell[i].innerHTML = dados[j].referenciaEndereco;
                i++;
            case 7:
                cell[i] = linha.insertCell(i);
                cell[i].innerHTML = dados[j].cepEndereco;
                i++;

        };
    }
}
let el = document.getElementById("excluir");

el.addEventListener("click", function () { deletaEndereco() }, false);
function deletaEndereco() {
    let deletaEndereco = prompt("ID do endereco que deseja deletar");

    enviaRequest(deletaEndereco);

}
function enviaRequest(idEndereco) {

    let json = JSON.stringify({ idEndereco: idEndereco });
    let ajax = new XMLHttpRequest();

    //Qual requisicao sera feita e para onde
    ajax.open("POST", "../../../frontend/telaCliente/deletaEndereco.php");

    //metodo chamado quando a requisicao for concluida
    ajax.addEventListener('readystatechange', (ev) => {

        let ajax = ev.target;
        if (ajax.readyState === XMLHttpRequest.DONE) {

            var responseData = JSON.parse(ajax.responseText);

            if (ajax.status === 200) {
                alert("Request enviada com sucesso")
            }
            else
                alert(responseData.message);
        }
    });

    //tipo de header que sera enviado na requisicao
    ajax.setRequestHeader('Content-Type', 'application/json');

    //envio de requisicao
    ajax.send(json);

}
let incluir = document.getElementById("incluir");
incluir.addEventListener("click", function () { incluirEndereco() }, false);
function incluirEndereco() {
    window.location.href = "../../../backend/routes/cadastroEndereco/cadastroEndereco.php";
}


let editar = document.getElementById("editar");

editar.addEventListener("click", function () { editarEndereco() }, false);

function editarEndereco(){
    let deletaEndereco = prompt("ID do endereco que deseja editar");
    sessionStorage.setItem("id",deletaEndereco);
    window.location.href = "../../../backend/routes/editarEndereco/editarEndereco.php"; 
}
