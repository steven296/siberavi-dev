@extends('layouts.app')

@section('breadcrumbs')
    <a href="{{ route('home') }}">Panel de Administracion</a><span> / </span>
	<a href="{{ route('categories.index') }}">Categorias</a><span> / </span>
    <a>{{ $category->name }}</a>
@endsection

@section('content')

	<div class="row mb-3">
		<div class="col-sm-12">
			<div class="mt-5 pb-5">
				<h4 class="text-center mt-3 mb-1">{{ $category->name }}</h4>
				<p class="text-center">{{ $category->description }}</p>

				<div class="d-flex row-flex justify-content-center">
					<a class="btn btn-outline-success" href="{{ route('categories.edit', $category->id) }}"><i class="fas fa-edit"></i> Editar Categoria</a>
				</div> 
			</div>
		</div>
	</div>

	<a class="btn btn-outline-success" href="{{ route('categories.index') }}"><i class="fas fa-arrow-circle-left"></i> Volver</a>

@endsection