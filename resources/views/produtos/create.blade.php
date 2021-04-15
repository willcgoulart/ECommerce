@extends('layout')

@section('conteudo')
	<form method="post">
		@csrf
		<div class="row">
			<div class="col col-8">
				<label for="nome">Nome</label>
				<input type="text" class="form-control" name="nome" id="nome">
			</div>
			<div class="col col-2">
				<label for="marca">Marcas</label>
				<select name="marca" id="marca">
					@foreach ($marcas as $marca)
						<option value="{{ $marca->id_marca }}">{{ $marca->desc_marca }}</option>
					@endforeach
				</select>
			</div>
			<div class="col col-2">
				<label for="tipo">Tipos</label>
				<select name="tipo" id="tipo">
					@foreach ($tipos as $tipos)
						<option value="{{ $tipos->id_tipo }}">{{ $tipos->desc_tipo }}</option>
					@endforeach
				</select>
			</div>
			<div class="col col-8">
				<label for="preco">Preço</label>
				<input type="text" class="form-control" name="preco" id="preco">
			</div>
			<div class="col col-8">
				<label for="descricao">Descrição</label>
				<input type="text" class="form-control" name="descricao" id="descricao">
			</div>
		</div>
		<button class="btn btn-primary mt-2" >Adicionar</button>
	</form>

@endsection