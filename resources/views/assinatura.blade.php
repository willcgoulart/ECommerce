@extends('layout.layout')

@include('layout.main-banner-assinatura')

@section('conteudo')
    <section id="" class="">
        <div class="">
            <div class="center-box">
                <div class="seta">
                    <h1 class="titulo-assinatura">Conheça o Clube de Assinatura</h1>
                </div>
                
                <br>
                <p class="texto-assinatura">Lorem ipsum dolor sit amet, consLorem ipsum dolor sit amet, consectetur adipiscing elit, 
                    sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostruLorem ipsum dolor sit amet, 
                    consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostruLorem 
                    ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, 
                    quis nostruectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                    Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                    Lorem ipsum dolor sit amet, consLorem ipsum dolor sit amet, consectetur adipiscing elit, 
                    sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostruLorem ipsum dolor sit amet, 
                    consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostruLorem 
                    ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, 
                    quis nostruectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                    Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                    Lorem ipsum dolor sit amet, consLorem ipsum dolor sit amet, consectetur adipiscing elit, 
                    sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostruLorem ipsum dolor sit amet, 
                    consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostruLorem 
                    ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, 
                    quis nostruectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                    Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                </p>
            </div>
            <div class="center-box">
                <div class="">
                    <img src="images/circulos.png" class="circulos">
                </div>
            </div>
            <div class="center-box-assinatura planos-assinatura"> 
                <div class="texto1">
                    <p>Escolhe o Plano de Assinatura</p>
                </div>

                <div class="texto2">
                    <p>Realiza o Pagamento</p>
                </div>

                <div class="texto3">
                    <p>Seleciona os Produtos dentro da Modalidade</p>
                </div>

                <div class="texto4">
                    <p>Entregamos no Conforto da sua Casa</p>
                </div>
            </div>
            <div class="center-box">
                <div class="">
                    <h1 class="titulo-assinatura">Conheça nossos Planos de Assinatura</h1>
                </div>
                <div class="planos-assinatura">
                    <div class="tamanho-planos">
                        <div class="titulo-card">
                            <h3 class="titulo-plano">Clube Gladiador Novato</h3>
                        </div>
                        <div class="valor-plano">
                            <p>R$ 49,90 / MÊS</p>
                        </div>
                        <ul class="lista-assinatura">
                            <li>- Numero 01</li>
                            <li>- Numero 02</li>
                            <li>- Numero 03</li>
                            <li>- Numero 04</li>
                            <li>- Numero 05</li>
                        </ul>
                        <br>
                        <!--Caso queira colocar a opção preta do botão, modificar a classe "bt-primary" acrescentando "-assinatura" e 
                        adicionar uma segunda classe chamada "botao-assinar" 
                        Ex: class="btn btn-primary-assinatura botao-assinatura"> 
                        -->
                        <a href="{{ route('ecommerce')."#product/6" }}" class="btn btn-primary">Assinar</a>
                    </div>

                    <div class="tamanho-planos">
                        <div class="titulo-card">
                            <h3 class="titulo-plano">Clube Gladiador Mestre</h3>
                        </div>
                        <div class="valor-plano mestre">
                            <p>R$ 159,90 / MÊS</p>
                        </div>
                        <ul class="lista-assinatura lista-mestre">
                            <li>- Numero 01</li>
                            <li>- Numero 02</li>
                            <li>- Numero 03</li>
                            <li>- Numero 04</li>
                            <li>- Numero 05</li>
                        </ul>
                        <br>
                        <a href="{{ route('ecommerce')."#product/5" }}" class="btn btn-primary">Assinar</a>
                    </div>

                    <div class="tamanho-planos">
                        <div class="titulo-card">
                            <h3 class="titulo-plano">Clube Gladiador Arrojado</h3>
                        </div>
                        <div class="valor-plano">
                            <p>R$ 99,90 / MÊS</p>
                        </div>
                        <ul class="lista-assinatura">
                            <li>- Numero 01</li>
                            <li>- Numero 02</li>
                            <li>- Numero 03</li>
                            <li>- Numero 04</li>
                            <li>- Numero 05</li>
                        </ul>
                        <br>
                        <a href="{{ route('ecommerce')."#product/4" }}" class="btn btn-primary">Assinar</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection