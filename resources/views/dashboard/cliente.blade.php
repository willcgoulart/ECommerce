@extends('layout.layout')

@section('conteudo')

    <style>
        #header{background: #000!important;}
    </style>

    <div class="row" style="padding-top: 8%;">
        <div class="p-4 mb-4" style="border: 1px solid #EFEFEF;" id="enderecoLogado">
            <h4>Endereço da Entrega</h4>
            <p style="text-align: left;">Endereço: {{ Auth::user()->endereco }}</p>
            <p style="text-align: left;">N: {{ Auth::user()->numero." ".Auth::user()->complemento }}</p>
            <p style="text-align: left;">CEP: {{ Auth::user()->cep }}</p>
            <p style="text-align: left;">Telefone: {{ Auth::user()->telefone }}</p>
            <p style="text-align: left;">E-mail: {{ Auth::user()->email }}</p>
        </div>

        @foreach ($pedidos as $pedido)
            <div class="p-4 mb-4" style="border: 1px solid #EFEFEF;" id="enderecoLogado">
                <h4>{{ $pedido['data_pedido'] }}</h4>
                <p style="text-align: left;">Pago: {{ $pedido['pago'] }}</p>
                <p style="text-align: left;">Data de Entrega: {{ $pedido['data_entrega'] }}</p>

                @php $valor = 0; @endphp
                @foreach ($pedido->pedidoProduto as $produto)
                    @php
                        $valor = $valor+($produto->preco*$produto->quantidade)
                    @endphp
                @endforeach
                <p style="text-align: left;">Valor: {{ $valor }}</p>
            </div>
        @endforeach

        

    </div>
@endsection