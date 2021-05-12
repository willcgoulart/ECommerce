var MAP_ACTIVE = [];

$(document).ready(function () {
    Header.Init();
    Plugin.Init();
    // Maps.Init();
    Form.Init();
    $('#modal-popup').modal()

    $('#btn-mapa1, #btn-mapa2, #btn-mapa3, #btn-mapa4').on('click',function(e){
        var clicked = 0;

        if (e.currentTarget.id.match(/1/g)) {
            ACTIVE_LAT = LAT;
            ACTIVE_LONG = LONG;
            clicked = 1;
        };

        if (e.currentTarget.id.match(/2/g)) {
            ACTIVE_LAT = LAT_CANOAS;
            ACTIVE_LONG = LONG_CANOAS;
            clicked = 2;
        };

        if (e.currentTarget.id.match(/3/g)) {
            ACTIVE_LAT = LAT_ASSIS_BRASIL;
            ACTIVE_LONG = LONG_ASSIS_BRASIL;
            clicked = 3;
        };

                

        if (!MAP_ACTIVE.includes(clicked)) {
            window.setTimeout(function(){

                var map = '[data-map="box-'+clicked+'"]';
                var center = LAT_LONG[clicked-1];

                Maps.Init(map, center);
                MAP_ACTIVE.push(clicked);
            }, 1000)
            return
        };
    })
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

// var LAT = -30.001851;
// var LONG = -51.198668;
var LAT = -30.001870;
var LONG = -51.198915;

var LAT_CANOAS = -29.948089;
var LONG_CANOAS = -51.176484;

var LAT_ASSIS_BRASIL = -30.011382568659307;
var LONG_ASSIS_BRASIL = -51.16876748730066;

var ACTIVE_LAT = LAT;
var ACTIVE_LONG = LONG;

var LAT_LONG = [
    {lat:LAT,lng:LONG},
    {lat:LAT_CANOAS,lng:LONG_CANOAS},
    {lat:LAT_ASSIS_BRASIL,lng:LONG_ASSIS_BRASIL}
]

var Maps = new function () {

    this.infowindow = new google.maps.InfoWindow();

    this.Init = function (container, center) {
        Maps.CreateMap(container, center);
    };

    this.AdjustHeight = function (container) {
        $(container).height($('.tab-content').outerHeight());

        $(window).resize(function () {
            $(container).height($('.tab-content').outerHeight());
            if ($.GoogleMaps.MAP) {
                var LatLong = $.GoogleMaps.CreateLatLong(LAT, LONG);
                $.GoogleMaps.MAP.setCenter(LatLong);
            }
        });
    };

    this.CreateMap = function (container, center) {

        var map = $(container);
        // Maps.AdjustHeight(container);

        if (map.is(':visible')) {
            $(container).GoogleMaps({
                // center: $.GoogleMaps.CreateLatLong(LAT, LONG),
                center: $.GoogleMaps.CreateLatLong(center),
                zoom: 16,
                // scrollwheel: false,
                // draggable: !("ontouchend" in document),
                mapTypeId: google.maps.MapTypeId.ROADMAP,
                // mapTypeControl: false,
                // disableDefaultUI: true,
                styles: [{
                    "featureType": "water",
                    "elementType": "geometry",
                    "stylers": [{"color": "#e9e9e9"}, {"lightness": 17}]
                }, {
                    "featureType": "landscape",
                    "elementType": "geometry",
                    "stylers": [{"color": "#f5f5f5"}, {"lightness": 20}]
                }, {
                    "featureType": "road.highway",
                    "elementType": "geometry.fill",
                    "stylers": [{"color": "#ffffff"}, {"lightness": 17}]
                }, {
                    "featureType": "road.highway",
                    "elementType": "geometry.stroke",
                    "stylers": [{"color": "#ffffff"}, {"lightness": 29}, {"weight": 0.2}]
                }, {
                    "featureType": "road.arterial",
                    "elementType": "geometry",
                    "stylers": [{"color": "#ffffff"}, {"lightness": 18}]
                }, {
                    "featureType": "road.local",
                    "elementType": "geometry",
                    "stylers": [{"color": "#ffffff"}, {"lightness": 16}]
                }, {
                    "featureType": "poi",
                    "elementType": "geometry",
                    "stylers": [{"color": "#f5f5f5"}, {"lightness": 21}]
                }, {
                    "featureType": "poi.park",
                    "elementType": "geometry",
                    "stylers": [{"color": "#dedede"}, {"lightness": 21}]
                }, {
                    "elementType": "labels.text.stroke",
                    "stylers": [{"visibility": "on"}, {"color": "#ffffff"}, {"lightness": 16}]
                }, {
                    "elementType": "labels.text.fill",
                    "stylers": [{"saturation": 36}, {"color": "#333333"}, {"lightness": 40}]
                }, {"elementType": "labels.icon", "stylers": [{"visibility": "off"}]}, {
                    "featureType": "transit",
                    "elementType": "geometry",
                    "stylers": [{"color": "#f2f2f2"}, {"lightness": 19}]
                }, {
                    "featureType": "administrative",
                    "elementType": "geometry.fill",
                    "stylers": [{"color": "#fefefe"}, {"lightness": 20}]
                }, {
                    "featureType": "administrative",
                    "elementType": "geometry.stroke",
                    "stylers": [{"color": "#fefefe"}, {"lightness": 17}, {"weight": 1.2}]
                }]
            });
        }

        Maps.AddMarker();

    };

    this.AddMarker = function () {

        var newMarker = $.GoogleMaps.AddMarker({
            position: $.GoogleMaps.CreateLatLong(LAT, LONG),
            map: $.GoogleMaps.MAP,
            // icon: $.GoogleMaps.CreateImage('images/pin.png', $.GoogleMaps.CreateSize(118, 99), $.GoogleMaps.CreatePoint(0, 0), $.GoogleMaps.CreatePoint(75, 98), null),
            icon: $.GoogleMaps.CreateImage('images/pin-small.png', $.GoogleMaps.CreateSize(36, 41), $.GoogleMaps.CreatePoint(0, 0), $.GoogleMaps.CreatePoint(30, 40), null),
            // shape: {coords: [75, 98, 57, 84, 0, 84, 0, 0, 84, 0, 84, 84, 75, 84, 75, 98], type: 'poly'},
            shape: {coords: [30, 40, 25, 36, 0, 36, 0, 0, 35, 0, 35, 36, 31, 36, 30, 40], type: 'poly'},
            //title: Theater.Title
        });

        var newMarkerCanoas = $.GoogleMaps.AddMarker({
            position: $.GoogleMaps.CreateLatLong(LAT_CANOAS, LONG_CANOAS),
            map: $.GoogleMaps.MAP,
            // icon: $.GoogleMaps.CreateImage('images/pin.png', $.GoogleMaps.CreateSize(118, 99), $.GoogleMaps.CreatePoint(0, 0), $.GoogleMaps.CreatePoint(75, 98), null),
            icon: $.GoogleMaps.CreateImage('images/pin-small.png', $.GoogleMaps.CreateSize(36, 41), $.GoogleMaps.CreatePoint(0, 0), $.GoogleMaps.CreatePoint(30, 40), null),
            // shape: {coords: [75, 98, 57, 84, 0, 84, 0, 0, 84, 0, 84, 84, 75, 84, 75, 98], type: 'poly'},
            shape: {coords: [30, 40, 25, 36, 0, 36, 0, 0, 35, 0, 35, 36, 31, 36, 30, 40], type: 'poly'},
            //title: Theater.Title
        });

        var newMarkerAssisBrasil = $.GoogleMaps.AddMarker({
            position: $.GoogleMaps.CreateLatLong(LAT_ASSIS_BRASIL, LONG_ASSIS_BRASIL),
            map: $.GoogleMaps.MAP,
            // icon: $.GoogleMaps.CreateImage('images/pin.png', $.GoogleMaps.CreateSize(118, 99), $.GoogleMaps.CreatePoint(0, 0), $.GoogleMaps.CreatePoint(75, 98), null),
            icon: $.GoogleMaps.CreateImage('images/pin-small.png', $.GoogleMaps.CreateSize(36, 41), $.GoogleMaps.CreatePoint(0, 0), $.GoogleMaps.CreatePoint(30, 40), null),
            // shape: {coords: [75, 98, 57, 84, 0, 84, 0, 0, 84, 0, 84, 84, 75, 84, 75, 98], type: 'poly'},
            shape: {coords: [30, 40, 25, 36, 0, 36, 0, 0, 35, 0, 35, 36, 31, 36, 30, 40], type: 'poly'},
            //title: Theater.Title
        });

        $.GoogleMaps.AddEvent(newMarker, 'mouseover', function () {
            OLD_ZOOM = $.GoogleMaps.MAP.getZoom();
            Maps.OpenInfowindow($.GoogleMaps.MAP, newMarker, 'farrapos');
        });
        $.GoogleMaps.AddEvent(newMarker, 'mouseout', function () {
            Maps.infowindow.close();
        });

        $.GoogleMaps.AddEvent(newMarkerCanoas, 'mouseover', function () {
            OLD_ZOOM = $.GoogleMaps.MAP.getZoom();
            Maps.OpenInfowindow($.GoogleMaps.MAP, newMarkerCanoas, 'canoas');
        });
        $.GoogleMaps.AddEvent(newMarkerCanoas, 'mouseout', function () {
            Maps.infowindow.close();
        });

        $.GoogleMaps.AddEvent(newMarkerAssisBrasil, 'mouseover', function () {
            OLD_ZOOM = $.GoogleMaps.MAP.getZoom();
            Maps.OpenInfowindow($.GoogleMaps.MAP, newMarkerAssisBrasil, 'assis-brasil');
        });
        $.GoogleMaps.AddEvent(newMarkerAssisBrasil, 'mouseout', function () {
            Maps.infowindow.close();
        });

    };

    this.OpenInfowindow = function(map, marker, address) {

        Maps.infowindow.close();
        var content = '';

        if(address=='farrapos') {
            content = '<div class="infobox">'+
                              '<h5 id="firstHeading" class="firstHeading">Farrapos</h5>'+
                              '<div id="bodyContent">Av. Farrapos, 3583 <br />51 4042.1488</div>'+
                          '</div>';         
        }
        if(address=='canoas') {
            content = '<div class="infobox">'+
                              '<h5 id="firstHeading" class="firstHeading">Canoas</h5>'+
                              '<div id="bodyContent">Av. Getúlio Vargas, 2139 <br />51 3785.8140</div>'+
                          '</div>';  
        }
        if(address=='assis-brasil') {
            content = '<div class="infobox">'+
                              '<h5 id="firstHeading" class="firstHeading">Assis Brasil</h5>'+
                              '<div id="bodyContent">Av. Assis Brasil, 1894 <br />51 3276.0707</div>'+
                          '</div>';  
        }

        // seta o conteudo
        Maps.infowindow.setContent(content);
        
        // abre a janela
        Maps.infowindow.open(map, marker);


    };

    this.SetCenter = function(){
        $.GoogleMaps.MAP.setCenter({lat:ACTIVE_LAT, lng:ACTIVE_LONG})

    }

};


var Form = new function () {
    this.TimeoutTimer = 0;

    this.Init = function () {
        $('[ajax-form="form"]').ajaxForm({
            complete: Form.PrintFormResult,
            dataType: 'json',
            beforeSubmit: function () {
                $('[ajax-form="submit"]').addClass('hidden');
            }
        });
        
        this.ConfigMasks();
        this.DatePicker();


    };

    this.DatePicker = function () {

        $('#from-estimate').datetimepicker({
            format: 'DD/MM/YYYY',
            minDate: moment(),
            widgetPositioning: {
                horizontal: 'right',
                vetical: 'auto'
            },
            useStrict: true
        });
        $('#to-estimate').datetimepicker({
                format: 'DD/MM/YYYY',
                widgetPositioning: {
                    horizontal: 'right',
                    vetical: 'auto'
                },
                useCurrent: false //Important! See issue #1075
            });
        $("#from-estimate").on("dp.change", function (e) {
            $('#to-estimate').data("DateTimePicker").minDate(e.date);
        });
        $("#to-estimate").on("dp.change", function (e) {
            $('#from-estimate').data("DateTimePicker").maxDate(e.date);
        });

    }

    this.ConfigMasks = function () {

        if ($('[data-mask="cep"]').size() > 0) {
            $('[data-mask="cep"]').mask('00000-000');
        }
        if ($('[data-mask="phone"]').size() > 0) {
            $('[data-mask="phone"]').mask('(00) 0000.00009');
        }
        if ($('[data-mask="cpf"]').size() > 0) {
            $('[data-mask="cpf"]').mask('000.000.000-00');
        }
        if ($('[data-mask="date"]').size() > 0) {
            $('[data-mask="date"]').mask('00/00/0000');
        }
    }

    this.PrintFormResult = function (data) {
        data = data.responseJSON;
        $('[ajax-form="submit"]').removeClass('hidden');
        $('[ajax-form="form"]').find('input').removeClass('error');
        $('[ajax-form="form"]').find('select').removeClass('error');
        $('[ajax-form="form"]').find('textarea').removeClass('error');


        if (typeof data.errors != 'undefined' && data.errors.isvalid === false) {

            $('[ajax-form="message"]').attr('class', 'error').text('Confira os campos em destaque!');

            $.each(data.errors.fields, function (index, field) {
                if (!field.isvalid) {
                    $('[name="' + field.name + '"]').addClass('error');
                } else {
                    $('[name="' + field.name + '"]').removeClass('error');
                }
            });
        } else {
            uptracs('track', 'conversion', 'Web Lead');
            $('[ajax-form="message"]').attr('class', 'success').text('Sucesso!');
            $('[ajax-form="form"]').find('input').removeClass('error').val('');
            $('[ajax-form="form"]').find('select').removeClass('error').val('');
            $('[ajax-form="form"]').find('textarea').removeClass('error').val('');

            $('[ajax-form="form"]').find('input').val('');
            $('[ajax-form="form"]').find('select').val('');
            $('[ajax-form="form"]').find('textarea').val('');
        }

        $('[ajax-form="message"]').show();

        window.clearTimeout(Form.TimeoutTimer);
        Form.TimeoutTimer = window.setTimeout(function() {
            $('[ajax-form="message"]').fadeOut();
        }, 5000);
    };
};