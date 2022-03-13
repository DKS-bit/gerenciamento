//Plano eh adicionar cookies de sessao, e um banco de dados para os gerentes
import { criaCookieDeSessao } from '../../../frontend/scripts.js';
var el = document.getElementById("submit");
el.addEventListener('click', fazerLogin)

function fazerLogin() {

  let usuario = document.getElementById("Usuario").value;
  let senha = document.getElementById("Senha").value;

  let json = JSON.stringify({ Username: usuario, Password: senha });
  let ajax = new XMLHttpRequest();

  //Qual requisicao sera feita e para onde
  ajax.open("POST", "../../auth/handleLogin.php");

  //metodo chamado quando a requisicao for concluida
  ajax.addEventListener('readystatechange', (ev) => {

    let ajax = ev.target;
    if (ajax.readyState === XMLHttpRequest.DONE) {

      var responseData = JSON.parse(ajax.responseText);

      if (ajax.status === 201) {
        criaCookieDeSessao("usuario", responseData.usuario);
        criaCookieDeSessao("chave", responseData.chave);
        window.location.href = "../gerenciamento/gerenciamento.php";
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
