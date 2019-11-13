$(document).ready(function(){ //Quando o HTML for carregado, esta função é chamada
    
    $(window).scroll(function(){ // Função executada caso usuário role a página
        
        var top = $(window).scrollTop(); // Pegando posição da página

        // Quando a tela descer além da medida especificada, o menu troca de cor.
        if(top > 878){
            $(".cabecalho").removeClass('bkg_transparente');
            $(".cabecalho").addClass('bkg_laranja');
            $("#caixa_login").removeClass('bkg_preto');
            $("#caixa_login").addClass('bkg_laranja');
            $("#form_container").removeClass('bkg_preto');
            $("#form_container").addClass('bkg_laranja');
        }else{
            $(".cabecalho").removeClass('bkg_laranja');
            $(".cabecalho").addClass('bkg_transparente');
            $("#caixa_login").removeClass('bkg_laranja');
            $("#caixa_login").addClass('bkg_preto');
            $("#form_container").removeClass('bkg_laranja');
            $("#form_container").addClass('bkg_preto');
        }
    }); 
});

