@extends('layouts.app')
@section('botones')
<a href="{{ route('index') }}" class="btn btn-primary mr-2">Volver</a>
@endsection
@section('content')

<h1 class="text-center mb-5">Crear Empresa</h1>

	<dir class="row justify-content-center mt-5">
		<dir class="col-md-8">
			<form method="POST" action="{{ route('empresas.store') }}" novalidate>
				@csrf

				<div class="form-group">
					<label for="nombre">Nombre</label>
					<input type="text" 
						name="nombre" 
						class="form-control" 
						id="nombre"
						placeholder="Nombre de la Empresa"
					/>
				</div>
				<div class="form-group">
					<label for="sector">Sector</label>
					<input type="text" 
						name="sector" 
						class="form-control" 
						id="sector"
						placeholder="Sector de la Empresa"
					/>
				</div>
			

				<div class="form-group">
					<input type="submit" class="btn btn-primary" 
					value="Agregar Empresa">
				</div>

			</form>
		</dir>
	</dir>

<h1 class="text-center mb-5">EMPRESA</h1>
<div class="col-md-10 mx-auto bg-white p-3">
	<table class="table">
		<thead class="bg-primary text-light">
			<tr>
				<th scole="col">Nombre</th>
				<th scole="col">Sector</th>
				<th scole="col">Acciones</th>
			</tr>
		</thead>
		<tbody>
			@foreach( $empresa as $e )
			<tr>
				<td>{{$e->nombre}}</td>
				<td>{{$e->sector}}</td>
				<td>
					<a href="{{ route('empresas.edit', ['empresa'=>$e->id]) }}"class="btn btn-primary mr-2">Editar</a>
				
					<form action="{{ route('empresas.destroy', ['empresa'=>$e->id]) }}" method="POST">
						@csrf
						@method('DELETE')
						<input type="submit" name="Eliminar" class="btn btn-danger" value="Eliminar">
					</form>
				</td>
			</tr> 
			@endforeach
		</tbody>
	</table>
</div>


@endsection