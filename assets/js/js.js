
$('document').ready(function() {
    $('#difs').owlCarousel({
    loop:true,
    center: true,
    autoplay:false,
    autoplayTimeout:3800, 
    autoplayHoverPause: true,
    animateOut: 'zoomOut',
    animateIn: 'fadeInRight',
    responsiveClass: true,
    responsive:{
      0:{
        items:1,
        nav:true
        
    },
    600:{
      items:2,
      nav:true
    },
    1000:{
        items:3,
        nav:true,
    }
    }
  });
  $( ".owl-prev").html('<i class="fa fa-circle-arrow-left" style="color: var(--principal);margin-right: 20px;margin-top: 30px;font-size: 30px;"></i>');
  $( ".owl-next").html('<i class="fa fa-circle-arrow-right" style="color: var(--principal);margin-top: 30px;font-size: 30px;"></i>');
  });

// Page loading animation
$(window).on('load', function () {
    if ($('.cover').length) {
        $('.cover').parallax({
            imageSrc: $('.cover').data('image'),
            zIndex: '1'
        });
    }
    gerenciarCampanha({
        funcao: 'iniciar'
    })

});

function mask(o, f) {
    setTimeout(function () {
        if (f == 'cpf') {
            var v = cpf(o.value);
        } else {
            $('.warningTelefone').hide()
            var v = mphone(o.value);
        }
        if (v != o.value) {
            o.value = v;
        }
    }, 1);
}

function mphone(v) {
    var r = v.replace(/\D/g, "");
    r = r.replace(/^0/, "");
    if (r.length > 10) {
        r = r.replace(/^(\d\d)(\d{5})(\d{4}).*/, "($1) $2-$3");
    } else if (r.length > 5) {
        r = r.replace(/^(\d\d)(\d{4})(\d{0,4}).*/, "($1) $2-$3");
    } else if (r.length > 2) {
        r = r.replace(/^(\d\d)(\d{0,5})/, "($1) $2");
    } else {
        r = r.replace(/^(\d*)/, "($1");
    }
    return r;
}

function validarTelefone(telefone) {

    telefone = telefone.replace(/\D/g, '');

    if (!(telefone.length >= 10 && telefone.length <= 11)) return false;

    if (telefone.length == 11 && parseInt(telefone.substring(2, 3)) != 9) return false;
    for (var n = 0; n < 10; n++) {
        if (telefone == new Array(11).join(n) || telefone == new Array(12).join(n)) return false;
    }
    //DDDs validos
    var codigosDDD = [11, 12, 13, 14, 15, 16, 17, 18, 19,
        21, 22, 24, 27, 28, 31, 32, 33, 34,
        35, 37, 38, 41, 42, 43, 44, 45, 46,
        47, 48, 49, 51, 53, 54, 55, 61, 62,
        64, 63, 65, 66, 67, 68, 69, 71, 73,
        74, 75, 77, 79, 81, 82, 83, 84, 85,
        86, 87, 88, 89, 91, 92, 93, 94, 95,
        96, 97, 98, 99
    ];

    if (codigosDDD.indexOf(parseInt(telefone.substring(0, 2))) == -1) return false;
    if (new Date().getFullYear() < 2017) return true;
    if (telefone.length == 10 && [2, 3, 4, 5, 7].indexOf(parseInt(telefone.substring(2, 3))) == -1) return false;
    return true;
}

function cpf(v) {
    v = v.replace(/\D/g, "") //Remove tudo o que não é dígito
    v = v.replace(/(\d{3})(\d)/, "$1.$2") //Coloca um ponto entre o terceiro e o quarto dígitos
    v = v.replace(/(\d{3})(\d)/, "$1.$2") //Coloca um ponto entre o terceiro e o quarto dígitos
    //de novo (para o segundo bloco de números)
    v = v.replace(/(\d{3})(\d{1,2})$/, "$1-$2") //Coloca um hífen entre o terceiro e o quarto dígitos
    return v
}

function loader(Args) {
    if (Args == "show") {
        $("#preloader").animate({
            'opacity': '100'
        }, 100, function () {
            setTimeout(function () {
                $("#preloader").css("visibility", "visible").fadeIn();
            }, 200);
        });
    } else {
        $("#preloader").animate({
            'opacity': '0'
        }, 900, function () {
            setTimeout(function () {
                $("#preloader").css("visibility", "hidden").fadeOut();
            }, 300);
        });
    }

}

$(window).scroll(function () {
    var scroll = $(window).scrollTop();
    var box = $('.header-text').height();
    var header = $('header').height();

    if (scroll >= box - header) {
        $("header").addClass("background-header");
    } else {
        $("header").removeClass("background-header");
    }
});