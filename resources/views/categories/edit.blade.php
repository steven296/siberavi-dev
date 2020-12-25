@extends('layouts.app')

@section('breadcrumbs')
    <a href="{{ route('home') }}">Panel de Administracion</a><span> / </span>
	<a href="{{ route('categories.index') }}">Categorias</a><span> / </span>
	<a href="{{ route('categories.show', $category->id) }}">{{ $category->name }}</a><span> / </span>
    <a>Editar Categoria</a>
@endsection

@section('content')
	
<form action="{{ route('categories.update', $category->id) }}" method="POST">
	@csrf
	@method('PUT')

	<div class="form-row">
		<div class="col-sm-12 mb-3">
			<label>Nombre de la Categoria</label>
			<input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ $category->name }}" required>
			@error('name')
				<span class="invalid-feedback" role="alert">
					<strong>{{ $message }}</strong>
				</span>
			@enderror
		</div>

		<div class="col-sm-12 mb-3">
			<label>Descripcion</label>
			<textarea name="description" class="form-control @error('description') is-invalid @enderror" cols="30" rows="10">{{ $category->description }}</textarea>
			@error('description')
				<span class="invalid-feedback" role="alert">
					<strong>{{ $message }}</strong>
				</span>
			@enderror
		</div>

	</div>

	<button class="btn btn-outline-success" type="submit"><i class="fas fa-plus-circle"></i> Actualizar</button>
	
</form>

@endsection


