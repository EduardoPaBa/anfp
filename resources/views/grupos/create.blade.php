@extends('layouts.app')

@section('botones')
<a href="{{ route('index') }}" class="btn btn-primary mr-2">Volver</a>
@endsection


@section('content')
	<h1 class="text-center mb-5">Crear Grupo</h1>

	<dir class="row justify-content-center mt-5">
		<dir class="col-md-8">
			<form method="POST" action="{{ route('grupos.store') }}" novalidate>
				@csrf
				<div class="form-group">
					<label for="codigo">Código</label>
					<input type="text" 
						name="codigo" 
						class="form-control" 
						id="codigo"
						placeholder="Código Grupo"
					/>
				</div>
				<div class="form-group">
					<label for="nombre">Nombre</label>
					<input type="text" 
						name="nombre" 
						class="form-control" 
						id="nombre"
						placeholder="Nombre Grupo"
					/>
				</div>
				

				<div class="form-group">
					<input type="submit" class="btn btn-primary" 
					value="Agregar Grupo">
				</div>

			</form>
		</dir>
	</dir>

<h1 class="text-center mb-5">CLASES</h1>
<div class="col-md-10 mx-auto bg-white p-3">
	<table class="table">
		<thead class="bg-primary text-light">
			<tr>
				<th scole="col">Codigo</th>
				<th scole="col">Nombre</th>
				
				<th scole="col">Balance General</th>
				<th scole="col">Acciones</th>
			</tr>
		</thead>
		<tbody>
			@foreach( $grupo as $sc )
			<tr>
				<td>{{$sc->codigo}}</td>
				<td>{{$sc->nombre}}</td>
				<td>trabajando aun xd</td>
				<td></td>
			</tr> 
			@endforeach
		</tbody>
	</table>
</div>


@endsection