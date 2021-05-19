var mainProdutos = [];

$(document).ready(function () {
    Header.Init();
    Plugin.Init();
});

var Header = new function () {

    this.Init = function () {
        Header.TestHeader();
        Header.ToggleMenu();
        Header.ToggleSubmenu();
        Header.ToggleHeader();
        Header.ClickMenu();
        Header.ClickWhatsapp();
    }

    this.ToggleMenu = function () {
        var menu = $('[data-toggle="menu"]');
        $.each(menu, function (index, el) {
            $(el).on('click', function () {
                $(this).toggleClass('active');
                $('[data-nav="true"]').slideToggle();
                $('[data-header="true"]').toggleClass('active');
            });
        });
    }

    this.ToggleSubmenu = function () {
        var menu = $('[data-toggle="submenu"]');
        $.each(menu, function (index, el) {
            $(el).on('click', function () {
                $(this).parent().toggleClass('active');
                $('[data-icon="true"]').toggleClass('hidden');
                $('[data-subnav="true"]').slideToggle();
            });
        });
    }

    this.ClickMenu = function() {

        if($('[data-toggle="menu"]').is(':visible')) {

            $('.menu-link:not(.has-submenu)').on('click', function() {
                $('[data-toggle="menu"]').trigger('click');
            });
            $('.submenu-link').on('click', function() {
                $('[data-toggle="menu"]').trigger('click');
                $('[data-toggle="submenu"]').trigger('click');
            });
        }
    }

    this.TestHeader = function () {
        if ($(window).scrollTop() > ($('#main-banner').height() - 20) && $(window).scrollTop() !== 0) {
            $('[data-header="true"]').addClass('black');
        }
        else {
            $('[data-header="true"]').removeClass('black');
        }
    }

    this.ToggleHeader = function () {
        $(window).scroll(function () {
            if ($(window).scrollTop() > ($('#main-banner').height() - 20)) {
                $('[data-header="true"]').addClass('black');
            }
            else {
                $('[data-header="true"]').removeClass('black');
            }
        });
    }

    this.ClickWhatsapp = function() {

        $('.btn-whats').on('click', function() {
            $('.whatsapp-box').toggleClass('active'); 
        })

        $('.whatsapp-link').on('click', function() {
            $('.whatsapp-box').removeClass('active'); 
        })

    }

}

var Plugin = new function () {

    this.Init = function () {

        // função executa plugins jquery
        var plugins = $('[data-jquery-plugin]');
        $.each(plugins, function (index, el) {

            if ($(el).data('jquery-plugin') === '') {
                return true;
            }

            // pega elemento atual
            var currentElement = $(el);
            // define as opções do plugin
            var options = currentElement.data();

            // testa todas as propriedades e reescreve as que são objetos
            $.each(options, function (index, val) {
                if (typeof val === 'string' && val.match(/\{/) !== null) {
                    val = eval("(function(){return " + val + ";})()");
                    options[index] = val;
                }
            });

            // se for isotope executa o plugin 'imagesLoaded' antes
            if (options.jqueryPlugin === 'owlCarousel') {
                options.navText = ['<i class="fa fa-chevron-left"></i>', '<i class="fa fa-chevron-right"></i>'];
            }

            currentElement[options.jqueryPlugin](options);
            
            if (options.jqueryPlugin === 'owlCarousel') {
            }

        });

    }

}