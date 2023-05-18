//MENU MOBILE //

const ham = document.querySelector('.ham');
const enlaces = document.querySelector('.nav__links');

ham.addEventListener('click', () => {
    
    enlaces.classList.toggle('activado');

});

$(document).ready(function(){

    //FILTRANDO PRODUCTOS //

    $('.catalogo__list__item').click(function(){
        var catProductMarca = $(this).attr('category-marca');
        var catProductColeccion = $(this).attr('category-coleccion');

        // OCULTANDO PRODUCTOS //
        $('.catalogo__item').hide();

        // MOSTRANDO PRODUCTOS //
        $('.catalogo__item[category-marca="'+catProductMarca+'"]').show();
        $('.catalogo__item[category-coleccion="'+catProductColeccion+'"]').show();

    });
    //MOSTRANDO TODOS LOS PRODUCTOS //
    $('.catalogo__list__item[category-marca="all"]').click(function(){
        $('.catalogo__item').show();
    });
})