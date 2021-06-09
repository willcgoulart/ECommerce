<header id="header" class="header" data-header="true">
    <!-- logo -->
    <h1>
        <spam class="logo">Jack Luis</spam>
    </h1>
    <!-- <a href="javascript:void(0);" class="menu-link-highlight" data-toggle="modal" data-target="#modal-estimate">Orçamento</a> -->

    <!-- hamburger -->
    <button class="nav-btn hidden-md hidden-lg" data-toggle="menu">
        <i></i>
        <span class="sr-only">Abrir menu</span>
    </button>

    <!-- menu -->
    <nav class="main-nav" id="main-nav" data-nav="true">
        <ul class="menu">
            <li class="menu-item">
                <a href="{{ route('home') }}" class="menu-link">A Cervejaria</a>
            </li>
            <li class="menu-item">
                <a href="#sobre" class="menu-link">Sobre</a>
            </li>
            <li class="menu-item">
                <a href="{{ route('ecommerce') }}" class="menu-link">Produtos</a>
            </li>
            <li class="menu-item">
                <a href="{{ route('assinatura') }}" class="menu-link">Clube de Assinatura</a>
            </li>
            <li class="menu-item">
                <div class="row">
                    <a href="{{ route('login') }}" class="button button-primary carrinho">
                        <span>Login</span>
                    </a>
                </div>
            </li>
            <li class="menu-item">
                <div class="row">
                    <a class="button button-primary u-pull-right simpleStore_viewCart carrinho">
                        <i class="fa fa-shopping-cart"></i> Carrinho <span class="simpleCart_total"></span>
                    </a>
                </div>
            </li>
        </ul>
    </nav>
    <div class="whatsapp-box">
        <a href="https://wa.me/555199999999">
                <img src="{{ asset('images/whatsapp.svg') }}" alt="Whatsapp">
        </a>
    </div>
</header>
