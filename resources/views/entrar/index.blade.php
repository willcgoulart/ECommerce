@extends('layout')

@section('conteudo')

    <div class="container">
    <div class="row">
        <div class="col-5">
            <!--
            <div class="text-center">
                <img class="img-fluid" alt="Responsive image" src="{{ asset('img/lOGO-Laterial.png') }}">
            </div>
            -->
            <img class="img-fluid" alt="Responsive image" src="{{ asset('img/Lateral-Esquerdo.png') }}">
            
        </div>
        <div class="col-7">
            <div class="text-center">
                <h4>Acesso para Área de membros Exclusivos</h4>
                <p>Área destinada para clientes e assinate do clube da cervejaria JackLuis</p>
            </div>
            <form method="post">
                @csrf
             
                <div class="form-group mx-sm-4 mb-2">
                    <label for="email">E-mail</label>
                    <input type="email" name="email" id="email" required class="form-control">
                </div>
                <div class="form-group mx-sm-4 mb-2">
                    <label for="password">Senha</label>
                    <input type="password" name="password" id="password" required min="1" class="form-control">
                </div>
                
                <div class="form-group text-center">
                    <button type="submit" class="btn btn-default mt-3" style="color: #ffffff; background-color: #5e3712; ">
                        Acessar
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection