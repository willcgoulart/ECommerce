<!DOCTYPE html>
<html lang="pt-br">
   <head id="header" class="header" data-header="true">
        <meta content="text/html; charset=UTF-8" http-equiv="Content-Type"/>
        <meta name="viewport" content="width=device-width,initial-scale=1">
        <title>Cervejaria Jack Luis</title>
        <link rel="shortcut icon" href="images/cerveja.png"/>
        <meta name="rating" content="general"/>
        <meta name="robots" content="all"/>
        <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
        <meta http-equiv="content-language" content="pt_br"/>

        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;700&display=swap" rel="stylesheet">
        
        <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
        
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.js"></script>

        <!-- Mobile Specific Metas
        –––––––––––––––––––––––––––––––––––––––––––––––––– -->
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- FONT
        –––––––––––––––––––––––––––––––––––––––––––––––––– -->
        <link href="//fonts.googleapis.com/css?family=Raleway:400,300,600" rel="stylesheet" type="text/css">
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css" rel="stylesheet">

        <!-- CSS
        –––––––––––––––––––––––––––––––––––––––––––––––––– -->
        <link rel="stylesheet" href="{{ asset('css/imports.min.css') }}">
        <link rel="stylesheet" href="{{ asset('css/simpleStore.min.css') }}">

        <!-- Favicon
        –––––––––––––––––––––––––––––––––––––––––––––––––– -->
        <link rel="icon" type="image/png" href="{{ asset('images/cerveja.png') }}">

    </head>
   <body>
        @include('layout.header')
		
		@yield('conteudo')

        @include('layout.footer')

        <script src="{{ asset('js/simpleCart.min.js') }}"></script>
        <script src="{{ asset('js/simpleStore.min.js') }}"></script>
        <script src="{{ asset('js/config.js') }}"></script>

        <link type="text/css" rel="stylesheet" href="{{ asset('css/site.css') }}">
        <script type="text/javascript" src="{{ asset('js/resources.js') }}"></script>
        <script type="text/javascript" src="{{ asset('js/site.js') }}"></script>

   </body>
</html>