@extends('layout.layout')

@include('layout.main-banner-produto')

@section('conteudo')     

        <!-- Primary Page Layout
        –––––––––––––––––––––––––––––––––––––––––––––––––– -->
        <div class="container simpleStore">
            <div class="row fonte-logo">
                <a class="brand" href="ecommerce.php"></a>
            </div>
            <div class="simpleStore_container"></div>
            <div class="simpleStore_cart_container"></div>
            @auth
                <div class="p-4 mb-4" style="border: 1px solid #EFEFEF;">
                    <h4>Endereço da Entraga</h4>
                    <p style="text-align: left;">Endereço: {{ Auth::user()->endereco }}</p>
                    <p style="text-align: left;">N: {{ Auth::user()->numero." ".Auth::user()->complemento }}</p>
                    <p style="text-align: left;">CEP: {{ Auth::user()->cep }}</p>
                    <p style="text-align: left;">Telefone: {{ Auth::user()->telefone }}</p>
                    <p style="text-align: left;">E-mail: {{ Auth::user()->email }}</p>
                </div>
            @endauth
            <input type="hidden" name="logado" id="logado" value="{{ $logado }}">
        </div>


        <!-- Templates
        –––––––––––––––––––––––––––––––––––––––––––––––––– -->

        <!-- Products View -->
        <script id="products-template" type="x-template">
            <div class="column">
                <div class="simpleCart_shelfItem">
                    <img src="" class="item_thumb"/>
                    <div class="row">
                        <h5 class="item_name"></h5>
                        <div class="simpleStore_getDetail_container">
                            <span class="item_price"></span>
                        </div>
                        <div class="simpleStore_getDetail_container">
                            <a class="button u-pull-right simpleStore_getDetail">Detalhes</a>
                        </div>
                    </div>
                </div>
            </div>
        </script>

        <!-- Product Detail View -->
        <script id="product-detail-template" type="x-template">
            <div class="simpleCart_shelfItem simpleStore_detailView">
                <a href="#" class="close view_close">&times;</a>

                <div class="row">
                    <div class="four columns">
                        <img src="" class="item_thumb"/>
                    </div>
                    <div class="eight columns">
                        <h5 class="item_name"></h5>

                        <p class="item_description"></p>
                        <span class="item_price"></span>
                        
                        <p class="item_id_prod" style="display: none;"></p>

                        <div class="qty">
                            <label>Qtd</label>
                            <input type="number" value="1" min="1" step="1" class="item_Quantity">
                        </div>
                        <a class="item_add button u-pull-right" href="javascript:;">Adicionar ao Carrinho</a>
                    </div>
                </div>
            </div>
        </script>

        <!-- Cart View -->
        <script id="cart-template" type="x-template">
            <div class="simpleStore_cart">
                <h2>Carrinho</h2>
                <a href="#" class="close">&times;</a>

                <div class="row">
                    <div class="eight columns">
                        <div class="simpleCart_items"></div>
                        <a href="javascript:;" class="simpleCart_empty u-pull-left">Esvaziar Carrinho <i class="fa fa-trash-o"></i></a>
                    </div>
                    <div class="four columns">
                        <div class="cart_info">
                            <div class="cart_info_item cart_itemcount">Items:
                                <div class="simpleCart_quantity"></div>
                            </div>
                            <div class="cart_info_item cart_shipping">Taxa de Envio:
                                <div class="simpleCart_shipping"></div>
                            </div>
                            <div class="cart_info_item cart_total"><b>Total:
                                <div class="simpleCart_grandTotal"></div>
                            </b></div>
                            <a  class="button button-primary simpleStore_checkout u-pull-right" id="carrinhoCompra" onclick="salvaPedido();">Confirmar <i class="fa fa-arrow-right"></i></a>
                            <a href="{{ route('login') }}" class="button button-primary carrinho" id="carrinhoCompraLogin" style="display: none;"><span>Login</span></a>

                            <button type="button" class="button button-primary" name="tests" id="tests" onclick="salvaPedido();">teste</button>
                        </div>
                    </div>
                </div>
            </div>
        </script>
        
        <!-- Error View -->
        <script id="error-template" type="x-template">
            <div class="error">
                <b>Sorry, something went wrong :(</b>
                <p class="error_text"></p>
                <a href="#" class="close alert_close">&times;</a>
            </div>
        </script>

        <script>
            $(window).on("load", function(){
                if( $('#logado').val() == "N" ){
                    $( "#carrinhoCompra" ).hide();
                    $( "#carrinhoCompraLogin" ).show();
                }else{
                    $( "#carrinhoCompra" ).show();
                    $( "#carrinhoCompraLogin" ).hide();
                }
            });

            function salvaPedido(){
                $.ajax({
                    url: "{{route('criar_pedido') }}",
                    type: 'post',
                    data: { _token: '{{csrf_token()}}',dados:  localStorage.getItem('simpleCart_items') },
                    dataType: 'json',
                    success: function (response) {
                        if(response['success'] == true){
                           
                        }else{
                            
                        }
                    }
                })
            }
            
        </script>
        
@endsection

