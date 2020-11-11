@extends('layouts.app')

@section('botones')
<a href="{{ route('grupos.create') }}" class="btn btn-primary mr-2">Volver</a>
@endsection

@section('content')

<h1 class="text-center mb-5">Editar Grupo</h1>

	<dir class="row justify-content-center mt-5">
		<dir class="col-md-8">
			
			<form method="POST" action="{{ route('grupos.update', $grupo ) }}" novalidate>
			
				@csrf
				@method('PUT')
				
				<div class="form-group">
					 <label for="bg">Balance General al que pertenece</label>
					 <input type="text" name="bg" class="form-control" 
						id="bg"
						placeholder="Balance General"
						value="{{ $grupo->informefinancieros_id }}"
						disabled="true" /> 
				</div>

				<div class="form-group">
					<label for="codigo">Código</label>
					<input type="text" 
						name="codigo" 
						class="form-control" 
						id="codigo"
						placeholder="Código Grupo"
						value="{{ $grupo->codigo }}" 
					/>
				</div>

				<div class="form-group">
					<label for="nombre">Nombre</label>
					<input type="text" 
						name="nombre" 
						class="form-control" 
						id="nombre"
						placeholder="Nombre Grupo"
						value="{{ $grupo->nombre }}"
					/>
				</div>
				
				<div class="form-group">
					<button type="submit" class="btn btn-primary">Actualizar</button>  
				</div>

			</form>
		</dir>
	</dir>

@endsection