@extends('layouts.app')
@section('botones')
<a href="{{ route('index') }}" class="btn btn-primary mr-2">Volver</a>
@endsection
@section('content')
	<h1 class="text-center mb-5">Editar Blance General</h1>

	<dir class="row justify-content-center mt-5">
		<dir class="col-md-8">
			<form method="POST" action="{{ route('informefinancieros.update',$informefinanciero) }}" novalidate>
				@csrf
				@method('PUT')
				<div class="form-group">
					 <label for="empresas">Empresa a la que pertenece</label>
					 <input type="text" 
						name="empresa" 
						class="form-control" 
						id="empresa"
						placeholder="Empresa"
						disabled="true" 
						value="{{ $informefinanciero->empresas_id }}" 
					/>
				</div>

				<div class="form-group">
					<label for="nombre">Nombre</label>
					<input type="text" 
						name="nombre" 
						class="form-control" 
						id="nombre"
						placeholder="Nombre del Balance General"
						value="{{ $informefinanciero->nombre }}"
					/>
				</div>

				<div class="form-group">
					<label for="anio">Año</label>
					<input type="text" 
						name="anio" 
						class="form-control" 
						id="anio"
						placeholder="Año del Balance General"
						value="{{ $informefinanciero->anio }}"
					/>
				</div>
			
				<div class="form-group">
					<input type="submit" class="btn btn-primary" 
					value="Actualizar">
				</div>
			</form>
		</dir>
	</dir>


@endsection