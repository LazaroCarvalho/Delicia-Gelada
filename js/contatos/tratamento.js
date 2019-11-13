// Validar a entrada de caracteres nos campos.
function validarEntrada(caracter, tipo)
{
    // Recebendo um caracter, pegando seu valor unicode.
    if (window.event)
        var asc = caracter.charCode;
    else
        var asc = caracter.which;
    
    // Através do valor unicode, verifica se o caracter digitado é um número ou letra.
    // Bloqueia a entrada de um caracter indesejado, através do tipo que deseja-se bloquear.
    if (tipo == "number") 
    {
        if(asc >= 48 && asc <= 57)
            return false;
    } else if(tipo == "text") 
    {
        if(asc < 48 || asc > 57) 
            return false;
    } 
    
}

// Inserir uma máscara nos campos, completando a digitação.
function mascaraFone (obj, caracter, tipo)
{
    
    // Verifica se o caracter digitado é válido para o cammpo.
    if (validarEntrada(caracter, "text") == false)
        return false;
    else {
        
        // Verifica se o campo é de telefone ou celular, para aplicar a máscara correta
        if(tipo == 'telefone') 
        {
            
            // Se for, aplica a mascara enquanto o usuário digita, formatando a entrada de dados.
            var input = obj.value;
            var id = obj.id;
            var resultado = input;

            if (input.length == 0)
                resultado = "(";
            else if (input.length == 4)
                resultado += ") ";
            else if (input.length == 10)
                resultado += "-";
            else if (input.length == 15)
                return false;

            document.getElementById(id).value = resultado;
            
        } 
        else if(tipo == 'celular') {
            var input = obj.value;
            var id = obj.id;
            var resultado = input;

            if (input.length == 0)
                resultado = "(";
            else if (input.length == 4)
                resultado += ") 9"; // Adiciona o 9 padrão dos celulares.
            else if (input.length == 11)
                resultado += "-";
            else if (input.length == 16)
                return false;
            
            document.getElementById(id).value = resultado;
        }
            
    }
    
}