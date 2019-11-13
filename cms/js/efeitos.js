// Associando variáveis aos elementos HTML.
const $checkbox = document.getElementById("checkbox_senha");
const $inputSenha = document.getElementById("campo_senha");

// Função para bloquear input da senha.
const bloquearInput = () => {

    if($checkbox.checked) // Verifica se o checkbox está ou não marcado.
        $inputSenha.disabled = "";
    else
        $inputSenha.disabled = "disabled";
}

// Quando o checkbox for clicado, chama uma função para bloquear o input da senha.
$checkbox.addEventListener("click", () => bloquearInput());