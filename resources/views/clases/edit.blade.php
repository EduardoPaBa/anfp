@extends('layouts.app')

@section('botones')
<a href="{{ route('index') }}" class="btn btn-primary mr-2">Volver</a>
@endsection


@section('content')
	<h1 class="text-center mb-5">Crear Clase</h1>

	<dir class="row justify-content-center mt-5">
		<dir class="col-md-8">
			<form method="POST" action="{{ route('clases.update', $clase) }}" novalidate>
				@csrf
				@method('PUT')

				<div class="form-group">
					 <label for="grupos">Grupo a la que pertenece</label>
					 <input type="text" name="grupo" class="form-control" id="grupo"	placeholder="Grupo" value="{{ $clase->grupos_id }}" disabled="true">
				</div>

				<div class="form-group">
					<label for="codigo">Código</label>
					<input type="text" 
						name="codigo" 
						class="form-control" 
						id="codigo"
						placeholder="Código Clase"
						value="{{ $clase->codigo }}"
					/>
				</div>
				<div class="form-group">
					<label for="nombre">Nombre</label>
					<input type="text" 
						name="nombre" 
						class="form-control" 
						id="nombre"
						placeholder="Nombre Clase"
						value="{{ $clase->nombre }}"
					/>
				</div>
			
				<div class="form-group">
					<input type="submit" class="btn btn-primary" 
					value="Actualizar Clase">
				</div>

			</form>
		</dir>
	</dir>

@endsection