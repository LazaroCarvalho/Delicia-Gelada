// Associando variáveis à elementos HTML.
const $login = document.getElementById("login_txt");
const $caixaLogin = document.getElementById("caixa_login");
const $setaBranca = document.getElementById("seta_branca");

// Faz a caixa de login aparecer e desaparecer conforme "login" for clicado.
// Gira a Seta para baixo quando menu é aberto. Volta a posição inicial quando fechado.
const caixaLogin = (elemento, seta) => {
    let rotacionar;
    if (elemento.style.display == "block") {
        rotacionar = 0;
        elemento.style.display = "none";
        seta.style.transform = "rotate("+rotacionar+"deg)";
    }
    else {
        rotacionar = 90;
        elemento.style.display = "block";
        seta.style.transform = "rotate("+rotacionar+"deg)";
    }
}

// Adicionando evento ao botão login. 
$login.addEventListener("click", () => caixaLogin($caixaLogin, $setaBranca));