@extends('layouts.app')

@section('breadcrumbs')
    <a href="{{ route('home') }}">Panel de Administracion</a><span> / </span>
    <a>Categorias</a>
@endsection

@section('content')
	
<div class="container">
	<div class="row">

		<div class="col-sm-12 mb-5">
			<a class="btn btn-outline-success" href="{{ route('categories.create') }}"><i class="fas fa-plus-circle"></i> Crear Categoria</a>
		</div>

		<div class="col-sm-12 table-responsive">
			@if(!isset($message))
				<table class="table table-hover">
					<thead>
						<tr>
							<th scope="col">Nombre</th>
							<th scope="col">Descripcion</th>
							<th scope="col">Acciones</th>
						</tr>
					</thead>
					<tbody>
						@foreach($categories as $category)
							<tr>
								<th scope="row">{{ $category->name }}</th>
								<th scope="row">{{ $category->description }}</th>
								<th scope="row">
									<a class="btn btn-outline-success" href="{{ route('categories.show', $category->id) }}"><i class="fas fa-eye"></i> Ver</a>

									<a class="btn btn-outline-primary" href="{{ route('categories.edit', $category->id) }}"><i class="far fa-edit"></i> Editar</a>

									<form action="{{ route('categories.destroy', $category->id) }}" method="POST" style="display:inline-block;">
										@csrf
										@method('DELETE')

										<button class="btn btn-outline-danger" type="submit"><i class="fas fa-trash"></i> Eliminar</button>
									</form>
								</th>
							</tr>
						</tbody>
						@endforeach
					</table>
				@else
					<div class="alert alert-danger" role="alert">
						<strong class="p-3">{{ $message }}</strong>
					</div>
				@endif
			</div>
	</div>
</div>

@endsection