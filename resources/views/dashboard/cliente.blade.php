@extends('layout.layout')

@section('conteudo')

    <style>
        #header{background: #000!important;}
        #timeline{
            border-radius:100%;
            height:5.5rem;
            width:5.5rem;
            font-size:3rem;
            display:inline-flex;
            align-items:center;
            justify-content:center;
        }
        .quadro-pedido{
            box-shadow: 0 1px 4px 0 rgb(0 0 0 / 50%);
            border-radius: 15px;
            background-color: #fff;
            text-align: center;
        }
    </style>

    <div class="row" style="padding-top: 8%;">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-sm-12">
                    <div class="p-4 mb-4 quadro-pedido" id="enderecoLogado">
                        <h4>Endereço da Entrega</h4>
                        <p style="text-align: left;">Endereço: {{ Auth::user()->endereco }}</p>
                        <p style="text-align: left;">N: {{ Auth::user()->numero." ".Auth::user()->complemento }}</p>
                        <p style="text-align: left;">CEP: {{ Auth::user()->cep }}</p>
                        <p style="text-align: left;">Telefone: {{ Auth::user()->telefone }}</p>
                        <p style="text-align: left;">E-mail: {{ Auth::user()->email }}</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-sm-12">
                    @foreach ($pedidosArray as $pedido)
                        <div class="p-4 mb-4 quadro-pedido" id="enderecoLogado">
                            <h4>Id pedido: {{ $pedido['pedido'] }}</h4>
                            <p style="text-align: left; font-size: 16px;">Data do Pedido: {{ $pedido['data_pedido'] }}</p>
                            <p style="text-align: left; font-size: 16px;">Pago: {{ $pedido['pago'] }}</p>
                            <p style="text-align: left; font-size: 16px;">Previsão de Entrega: {{ $pedido['previsao_entrega'] }}</p>
                            <p style="text-align: left; font-size: 16px;">Data de Entrega: {{ $pedido['data_entrega'] }}</p>
                            <p style="text-align: left; font-size: 16px;">Valor: {{ $pedido['valor'] }}</p>

                            <div class="row justify-content-center">
                                <div class="col-lg-1 col-sm-2" style="text-align: center">
                                    <button type="button" class="btn btn-success btn-circle btn-sm" id="timeline">1</button>
                                    <p style="font-size: 12px;"> Pedido</p>
                                </div>
                                <div class="col-lg-1 col-sm-2" style="text-align: center">
                                    <button type="button" class="btn @if($pedido['pago']=='Sim') btn-success @else btn-light @endif rounded-25 btn btn-circle btn-sm" id="timeline">2</button>
                                    <p style="font-size: 12px;"> Pagamento</p>
                                </div>
                                <div class="col-lg-1 col-sm-2" style="text-align: center">
                                    <button type="button" class="btn @if(!empty($pedido['previsao_entrega'])) btn-success @else btn-light @endif rounded-25 btn btn-circle btn-sm" id="timeline">3</button>
                                    <p style="font-size: 12px;"> Previsão Entrega</p>
                                </div>
                                <div class="col-lg-1 col-sm-2" style="text-align: center">
                                    <button type="button" class="btn @if(!empty($pedido['data_entrega'])) btn-success @else btn-light @endif rounded-25 btn btn-circle btn-sm" id="timeline">
                                        <img class="img-fluid" alt="Responsive image" src="{{ asset('images/cerveja.png') }}">
                                    </button>
                                    <p style="font-size: 12px;"> Finalizado</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

        

    </div>
@endsection