@extends('layout.layout')

@section('conteudo')

    <div class="row">
        <div class="col-5">
            <!--
            <div class="text-center">
                <img class="img-fluid" alt="Responsive image" src="{{ asset('img/lOGO-Laterial.png') }}">
            </div>
            -->
            <img class="img-fluid" alt="Responsive image" src="{{ asset('img/Lateral-Esquerdo.png') }}">
            
        </div>
        <div class="col-7 mt-5">
            <div class="text-center">
                <h4>Acesso para Área de membros Exclusivos</h4>
                <p>Área destinada para clientes e assinate do clube da cervejaria JackLuis</p>
            </div>
            <form method="post">
                @csrf

                @include('erros', ['errors' => $errors->mensagemErro])
                <div class="form-group mx-sm-4 mb-2">
                    <label for="email">E-mail</label>
                    <input type="email" class="form-control {{ $errors->has("email") ? 'is-invalid' :'' }}"
                    id="email" name="email" value="{{ old('email') ?? '' }}">
                    <div class="invalid-feedback">
                        @if($errors->has("email"))
                            @foreach($errors->get("email") as $msg)
                            {{$msg}}<br />
                            @endforeach
                        @endif
                    </div>
                </div>
                <div class="form-group mx-sm-4 mb-2">
                    <label for="password">Senha</label>
                    <input type="password" 	class="form-control {{ $errors->has("password") ? 'is-invalid' :'' }}"
                    id="password" name="password">
                    <div class="invalid-feedback">
                        @if($errors->has("password"))
                            @foreach($errors->get("password") as $msg)
                            {{$msg}}<br />
                            @endforeach
                        @endif
                    </div>
                </div>
                
                <div class="form-group text-center">
                    <button type="submit" class="btn btn-default mt-3" style="color: #ffffff; background-color: #5e3712; width: 40%;">
                        Acessar
                    </button>
                    <p>
                    <a href="{{ route('form_cadastra_user') }}" style="text-decoration: none; color: black">Novo por aqui? Cadastra-se AQUI!!</a></p>
                </div>
            </form>
        </div>
    </div>
@endsection