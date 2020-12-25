@extends('layouts.app')

@section('breadcrumbs')
    <a href="{{ route('home') }}">Panel de Administracion</a><span> / </span>
	<a href="{{ route('categories.index') }}">Categorias</a><span> / </span>
    <a>Crear Categoria</a>
@endsection

@section('content')
	
<form action="{{ route('categories.store') }}" method="POST">
	@csrf
	
	<div class="form-row">
		<div class="col-sm-12 mb-3">
			<label>Nombre</label>
			<input type="text" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="Nombre de Categoria" value="{{ old('name') }}" required>
			@error('name')
				<span class="invalid-feedback" role="alert">
					<strong>{{ $message }}</strong>
				</span>
			@enderror
		</div>

		<div class="col-sm-12 mb-3">
			<label>Descripcion</label>
			<textarea name="description" class="form-control @error('description') is-invalid @enderror" cols="30" rows="10"></textarea>
			@error('description')
				<span class="invalid-feedback" role="alert">
					<strong>{{ $message }}</strong>
				</span>
			@enderror
		</div>

	</div>

	<button class="btn btn-outline-success" type="submit"><i class="fas fa-plus-circle"></i> Agregar</button>
	
</form>

@endsection