@extends('layout.layout')

@section('conteudo')

    <a href="{{ route('form_criar_produto') }}" class="btn btn-dark mb-2">Adcionar</a>

    <ul class="list-group">
		@foreach($produtos as $produto)
			<li class="list-group-item d-flex justify-content-between align-items-center">
                
                <span id="produto-{{ $produto->id_prod  }}">{{ $produto->nome_prod }}</span>
                <form method="post" action="{{ route('form_edita_produto') }}">
                    @csrf
                    <input type="hidden" name="id" id="id" value="{{ $produto->id_prod }}">
                    <button class="btn btn-primary btn-sm float-right"><i class="fas fa-edit"></i></button>
                </form>
           

                <form method="post" action="/{{ $produto->id_prod }}" onsubmit="return confirm('Tem certeza que deseja remover {{ addslashes($produto->nome_prod) }}')">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger btn-sm mr-1"><i class="far fa-trash-alt"></i></button>
                </form>                
				
				</span>
			</li>
		@endforeach
	</ul>

@endsection