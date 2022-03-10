let tabela = document.getElementById('teste');


const xhttp = new XMLHttpRequest();
xhttp.open("GET", "lerClientes.php");
xhttp.onload = function () {
    let dados = JSON.parse(xhttp.responseText);
    console.log(dados)
    preencherTabela(dados)
};
xhttp.send();

function preencherTabela(dados) {
    let linha = tabela.insertRow(1);
    let cell = [];
    let i = 0;
    switch (i) {
        case 0:
            cell[i] = linha.insertCell(i);
            cell[i].innerHTML = dados.nomeCliente;
            i++
        case 1:
            cell[i] = linha.insertCell(i);
            cell[i].innerHTML = dados.dtNascCliente;
            i++
        case 2:
            cell[i] = linha.insertCell(i);
            cell[i].innerHTML = dados.cpfCliente;
            i++
        case 3:
            cell[i] = linha.insertCell(i);
            cell[i].innerHTML = dados.rgCliente;
            i++
        case 4:
            cell[i] = linha.insertCell(i);
            cell[i].innerHTML = dados.telefoneCliente;
            i++
    };
}