@extends('layout.layout')

@section('conteudo')

    <style>
        #header{background: #000!important;}
    </style>

    <form method="post" action="{{ route('form_cadastra_user') }}" style="padding-top: 10%;">
        @csrf
        <div class="row p-5">
            <div class="col col-12 form-group">
                <div class="text-center">
                    <h3>CADASTRO NA PLATAFORMA</h3>
                </div>
            </div>
            <div class="col col-6 form-group">
                <label for="name">Nome</label>
                <input type="text" class="form-control {{ $errors->has("name") ? 'is-invalid' :'' }} border border-secondary"
                id="name" name="name" value="{{ old('name') ?? '' }}">
                <div class="invalid-feedback">
                    @if($errors->has("name"))
                        @foreach($errors->get("name") as $msg)
                        {{$msg}}<br />
                        @endforeach
                    @endif
                </div>
            </div>
            <div class="col col-6 form-group">
                <label for="cpf">CPF</label>
                <input type="text" class="form-control {{ $errors->has("cpf") ? 'is-invalid' :'' }} cpf border border-secondary"
                id="cpf" name="cpf" value="{{ old('cpf') ?? '' }}">
                <div class="invalid-feedback">
                    @if($errors->has("cpf"))
                        @foreach($errors->get("cpf") as $msg)
                        {{$msg}}<br />
                        @endforeach
                    @endif
                </div>
            </div>

            <div class="col col-6 form-group">
                <label for="sobrenome">Sobrenome</label>
                <input type="text" class="form-control {{ $errors->has("sobrenome") ? 'is-invalid' :'' }} border border-secondary"
                id="sobrenome" name="sobrenome" value="{{ old('sobrenome') ?? '' }}">
                <div class="invalid-feedback">
                    @if($errors->has("sobrenome"))
                        @foreach($errors->get("sobrenome") as $msg)
                        {{$msg}}<br />
                        @endforeach
                    @endif
                </div>
            </div>
            <div class="col col-6 form-group">
                <label for="telefone">Telefone</label>
                <input type="text" class="form-control {{ $errors->has("telefone") ? 'is-invalid' :'' }} telefone border border-secondary"
                id="telefone" name="telefone" value="{{ old('telefone') ?? '' }}">
                <div class="invalid-feedback">
                    @if($errors->has("telefone"))
                        @foreach($errors->get("telefone") as $msg)
                        {{$msg}}<br />
                        @endforeach
                    @endif
                </div>
            </div>

            <div class="col col-6 form-group">
            </div>
            <div class="col col-6 form-group">
                <label for="email">E-mail</label>
                <input type="email" class="form-control {{ $errors->has("email") ? 'is-invalid' :'' }} border border-secondary"
                id="email" name="email" value="{{ old('email') ?? '' }}">
                <div class="invalid-feedback">
                    @if($errors->has("email"))
                        @foreach($errors->get("email") as $msg)
                        {{$msg}}<br />
                        @endforeach
                    @endif
                </div>
            </div>

            <div class="col col-12 form-group">
                <div class="text-center">
                    <h3>ENDEREÇO</h3>
                </div>
            </div>

            <div class="col col-6 form-group">
                <label for="cep">CEP</label>
                <input type="text" class="form-control {{ $errors->has("cep") ? 'is-invalid' :'' }} cep border border-secondary"
                id="cep" name="cep" value="{{ old('cep') ?? '' }}">
                <div class="invalid-feedback">
                    @if($errors->has("cep"))
                        @foreach($errors->get("cep") as $msg)
                        {{$msg}}<br />
                        @endforeach
                    @endif
                </div>
            </div>
            <div class="col col-6 form-group">
                <label for="numero">Numero</label>
                <input type="text" class="form-control {{ $errors->has("numero") ? 'is-invalid' :'' }} border border-secondary"
                id="numero" name="numero" value="{{ old('numero') ?? '' }}">
                <div class="invalid-feedback">
                    @if($errors->has("numero"))
                        @foreach($errors->get("numero") as $msg)
                        {{$msg}}<br />
                        @endforeach
                    @endif
                </div>
            </div>

            <div class="col col-6 form-group">
                <label for="endereco">Endereço</label>
                <input type="text" class="form-control {{ $errors->has("endereco") ? 'is-invalid' :'' }} border border-secondary"
                id="endereco" name="endereco" value="{{ old('endereco') ?? '' }}">
                <div class="invalid-feedback">
                    @if($errors->has("endereco"))
                        @foreach($errors->get("endereco") as $msg)
                        {{$msg}}<br />
                        @endforeach
                    @endif
                </div>
            </div>
            <div class="col col-6 form-group">
                <label for="complemento">Complemento</label>
                <input type="text" class="form-control {{ $errors->has("complemento") ? 'is-invalid' :'' }} border border-secondary"
                id="complemento" name="complemento" value="{{ old('complemento') ?? '' }}">
                <div class="invalid-feedback">
                    @if($errors->has("complemento"))
                        @foreach($errors->get("complemento") as $msg)
                        {{$msg}}<br />
                        @endforeach
                    @endif
                </div>
            </div>

            <div class="col col-6 form-group"></div>
            <div class="col col-6 form-group">
                <label for="ponto_referencia">Ponto de Referência</label>
                <input type="text" class="form-control {{ $errors->has("ponto_referencia") ? 'is-invalid' :'' }} border border-secondary"
                id="ponto_referencia" name="ponto_referencia" value="{{ old('ponto_referencia') ?? '' }}">
                <div class="invalid-feedback">
                    @if($errors->has("ponto_referencia"))
                        @foreach($errors->get("ponto_referencia") as $msg)
                        {{$msg}}<br />
                        @endforeach
                    @endif
                </div>
            </div>

            <div class="col col-12 form-group">
                <div class="text-center">
                    <h3>CRIE UMA SENHA</h3>
                </div>
            </div>

            <div class="col col-6 form-group">
                <label for="password">Senha</label>
                <input type="password" 	class="form-control {{ $errors->has("password") ? 'is-invalid' :'' }} border border-secondary"
                id="password" name="password">
                <div class="invalid-feedback">
                    @if($errors->has("password"))
                        @foreach($errors->get("password") as $msg)
                        {{$msg}}<br />
                        @endforeach
                    @endif
                </div>
            </div>
            <div class="col col-6 form-group">
                <label for="password_confirmation">Digite Novamente</label>
                <input type="password" 	class="form-control {{ $errors->has("password_confirmation") ? 'is-invalid' :'' }} border border-secondary"
                id="password_confirmation" name="password_confirmation">
                <div class="invalid-feedback">
                    @if($errors->has("password_confirmation"))
                        @foreach($errors->get("password_confirmation") as $msg)
                        {{$msg}}<br />
                        @endforeach
                    @endif
                </div>
            </div>
		</div>
        <div class="form-group text-center">
		    <button class="btn btn-primary mt-2 p-2" style="font-size: 14px">Finalizar Cadastro</button>
        </div>
	</form>
    <script>
        $(document).ready(function(){
            $('.cpf').mask('000.000.000-00');
            $('.cep').mask('00000-000');
            $('.telefone').mask('(00) 0000-0000#');

        });
    </script>
@endsection