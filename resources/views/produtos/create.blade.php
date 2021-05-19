@extends('layout.layout')

@section('conteudo')
	<style>
		#header{background: #000!important;}
	</style>

	<form method="post" action="{{ route('form_criar_produto') }}" enctype="multipart/form-data" style="padding-top: 10%;">
		@csrf
		<div class="row p-5">
			<div class="col col-8 form-group">
				<label for="nome">Nome</label>
				<input type="text" 	class="form-control {{ $errors->has("nome") ? 'is-invalid' :'' }} border border-secondary"
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
				<select class="form-control {{ $errors->has("marca") ? 'is-invalid' :'' }}" id="marca" name="marca" value="{{ old('marca') ?? '' }} border border-secondary" style="border: solid 1px;">
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
				<select class="form-control {{ $errors->has("tipo") ? 'is-invalid' :'' }}" name="tipo" id="tipo" value="{{ old('tipo') ?? '' }} border border-secondary" style="border: solid 1px;">
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
				<input type="text" 	class="form-control {{ $errors->has("preco") ? 'is-invalid' :'' }} preco border border-secondary"
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
				<input type="text" 	class="form-control {{ $errors->has("descricao") ? 'is-invalid' :'' }} border border-secondary"
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
		<div class="form-group text-center">
		    <button class="btn btn-primary mt-2 p-2" style="font-size: 20px">Adicionar</button>
        </div>
	</form>

@endsection