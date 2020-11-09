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




@endsection