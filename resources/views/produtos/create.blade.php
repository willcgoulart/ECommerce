@extends('layout.layout')

@section('conteudo')
	<form method="post" action="{{ route('form_criar_produto') }}" enctype="multipart/form-data">
		@csrf
		<div class="row">
			<div class="col col-8 form-group">
				<label for="nome">Nome</label>
				<input type="text" 	class="form-control {{ $errors->has("nome") ? 'is-invalid' :'' }}"
				id="nome" name="nome" value="{{ old('nome') ?? '' }}">
				<div class="invalid-feedback">
					@if($errors->has("nome"))
						@foreach($errors->get("nome") as $msg)
						{{$msg}}<br />
						@endforeach
					@endif
				</div>
			</div>
			<div class="col col-8 form-group">
				<label for="marca">Marcas</label>
				<select class="form-control {{ $errors->has("marca") ? 'is-invalid' :'' }}" id="marca" name="marca" value="{{ old('marca') ?? '' }}">
					<option value="">Selecione</option>
					@foreach ($marcas as $marca)
						<option value="{{ $marca->id_marca }}">{{ $marca->desc_marca }}</option>
					@endforeach
				</select>
				<div class="invalid-feedback">
					@if($errors->has("marca"))
						@foreach($errors->get("marca") as $msg)
						{{$msg}}<br />
						@endforeach
					@endif
				</div>
			</div>
			<div class="col col-8 form-group">
				<label for="tipo">Tipos</label>
				<select class="form-control {{ $errors->has("tipo") ? 'is-invalid' :'' }}" name="tipo" id="tipo" value="{{ old('tipo') ?? '' }}">
					<option value="">Selecione</option>
					@foreach ($tipos as $tipos)
						<option value="{{ $tipos->id_tipo }}">{{ $tipos->desc_tipo }}</option>
					@endforeach
				</select>
				<div class="invalid-feedback">
					@if($errors->has("tipo"))
						@foreach($errors->get("tipo") as $msg)
						{{$msg}}<br />
						@endforeach
					@endif
				</div>
			</div>
			<div class="col col-8 form-group">
				<label for="preco">Preço</label>
				<input type="text" 	class="form-control {{ $errors->has("preco") ? 'is-invalid' :'' }} preco"
				id="preco" name="preco" value="{{ old('preco') ?? '' }}">
				<div class="invalid-feedback">
					@if($errors->has("preco"))
						@foreach($errors->get("preco") as $msg)
						{{$msg}}<br />
						@endforeach
					@endif
				</div>
			</div>
			<div class="col col-8 form-group">
				<label for="descricao">Descrição</label>
				<input type="text" 	class="form-control {{ $errors->has("descricao") ? 'is-invalid' :'' }}"
				id="descricao" name="descricao"  value="{{ old('descricao') ?? '' }}">
				<div class="invalid-feedback">
					@if($errors->has("descricao"))
						@foreach($errors->get("descricao") as $msg)
						{{$msg}}<br />
						@endforeach
					@endif
				</div>
			</div>
			<div class="col col-8 form-group">
				<label for="imagem">Imagem</label>
				<input type="file" 	class="form-control-file {{ $errors->has("imagem") ? 'is-invalid' :'' }}"
				id="imagem" name="imagem"  value="{{ old('imagem') ?? '' }}">
				<div class="invalid-feedback">
					@if($errors->has("imagem"))
						@foreach($errors->get("imagem") as $msg)
						{{$msg}}<br />
						@endforeach
					@endif
				</div>
			</div>
		</div>
		<button class="btn btn-primary mt-2" >Adicionar</button>
	</form>

@endsection