
function criaCookieDeSessao(nome, valor, expDateMs) {
    valor = encodeURI(valor);

    if (expDateMs) {
        var data = new Date(expDateMs);
        // Converte a data para GMT
        data = data.toGMTString();
        // Codifica o valor do cookie para evitar problemas
        // Cria o novo cookie
        document.cookie = nome + '=' + valor + '; expires=' + data + '; path=/';
    }
    else {
        document.cookie = nome + '=' + valor + '; path=/';
    }
}


function recuperaCookie(nome_cookie) {
    // Adiciona o sinal de = na frente do nome do cookie
    var cname = ' ' + nome_cookie + '=';

    // Obtém todos os cookies do documento
    var cookies = document.cookie;

    // Verifica se seu cookie existe
    if (cookies.indexOf(cname) == -1) {
        return false;
    }

    // Remove a parte que não interessa dos cookies
    cookies = cookies.substr(cookies.indexOf(cname), cookies.length);

    // Obtém o valor do cookie até o ;
    if (cookies.indexOf(';') != -1) {
        cookies = cookies.substr(0, cookies.indexOf(';'));
    }

    // Remove o nome do cookie e o sinal de =v
    cookies = cookies.split('=')[1];

    // Retorna apenas o valor do cookie
    return decodeURI(cookies);
}


function eraseCookieFromAllPaths(name) {
    // This function will attempt to remove a cookie from all paths.
    var pathBits = location.pathname.split('/');
    var pathCurrent = ' path=';

    // do a simple pathless delete first.
    document.cookie = name + '=; expires=Thu, 01-Jan-1970 00:00:01 GMT;';

    for (var i = 0; i < pathBits.length; i++) {
        pathCurrent += ((pathCurrent.substr(-1) != '/') ? '/' : '') + pathBits[i];
        document.cookie = name + '=; expires=Thu, 01-Jan-1970 00:00:01 GMT;' + pathCurrent + ';';
    }
}


let tabela = document.getElementById('teste');

let el = document.getElementById("excluir");

let sair = document.getElementById("sair");

let visualizar = document.getElementById("visualizar");

let incluir = document.getElementById("incluir");

let editar = document.getElementById("editar");

const xhttp = new XMLHttpRequest();
xhttp.open("GET", "../../../frontend/telaGerenciamento/lerClientes.php");
xhttp.onload = function () {
    let dados = JSON.parse(xhttp.responseText);
    console.log(dados[2]);
    preencherTabela(dados);
};
xhttp.send();


el.addEventListener("click", function () { deletaCliente() }, false);

sair.addEventListener("click", function () { logout() }, false);

visualizar.addEventListener("click", function () { visualizarCliente() }, false);

incluir.addEventListener("click", function () { incluirCliente() }, false);

editar.addEventListener("click", function () { editarCliente() }, false);

function editarCliente() {
    let editarCliente = prompt("CPF do cliente que deseja visualizar");
    sessionStorage.setItem('cpf', editarCliente);

    window.location.href = "../../../backend/routes/editaCliente/editaCliente.php";
}
function incluirCliente() {
    window.location.href = "../../../backend/routes/cadastro/cadastro.php";
}

function logout() {

    let chave = recuperaCookie("chave");
    let usuario = recuperaCookie("usuario");

    if (!chave || !usuario) {
        window.location.href = "../../../backend/routes/login/login.php"; // PHPTELADE LOGIN DO ROUTES
    }

    let ajax = new XMLHttpRequest();
    let json = JSON.stringify({ Username: usuario, Chave: chave });

    ajax.open("POST", "../../../backend/auth/destruirSessao.php");
    ajax.addEventListener('readystatechange', (ev) => {
        let ajax = ev.target;

        if (ajax.readyState === XMLHttpRequest.DONE) {
            if (ajax.status === 200) {
                eraseCookieFromAllPaths("usuario")
                eraseCookieFromAllPaths("chave")
                eraseCookieFromAllPaths("PHPSESSID")
                window.location.href = "../../../backend/routes/login/login.php"; // Index login no backend
            } else {
                console.log("Ocorreu um erro ao destruir a sessão")
            }
        }
    });

    ajax.setRequestHeader('Content-Type', 'application/json');
    ajax.send(json);

}


function enviaRequest(cpfCliente) {

    let json = JSON.stringify({ cpfCliente: cpfCliente });
    let ajax = new XMLHttpRequest();

    //Qual requisicao sera feita e para onde
    ajax.open("POST", "../../../frontend/telaGerenciamento/deletaClientes.php");

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
function visualizarCliente() {
    let visualizarCliente = prompt("CPF do cliente que deseja visualizar");

    sessionStorage.setItem('cpf', visualizarCliente);
    window.location.href = "../../../backend/routes/cliente/cliente.php";

}

function deletaCliente() {
    let deletaCliente = prompt("CPF do cliente que deseja deletar");

    enviaRequest(deletaCliente);

}
function preencherTabela(dados) {
    for (let j = 0, k = 1; j < 10; j++, k++) {
        let linha = tabela.insertRow(k);
        let cell = [];
        let i = 0;
        switch (i) {
            case 0:
                cell[i] = linha.insertCell(i);
                cell[i].innerHTML = dados[j].nomeCliente;
                i++
            case 1:
                cell[i] = linha.insertCell(i);
                cell[i].innerHTML = dados[j].dtNascCliente;
                i++
            case 2:
                cell[i] = linha.insertCell(i);
                cell[i].innerHTML = dados[j].cpfCliente;
                i++
            case 3:
                cell[i] = linha.insertCell(i);
                cell[i].innerHTML = dados[j].rgCliente;
                i++
            case 4:
                cell[i] = linha.insertCell(i);
                cell[i].innerHTML = dados[j].telefoneCliente;
                i++
        };
    }
}