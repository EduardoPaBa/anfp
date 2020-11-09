@extends('layouts.app')

@section('content')
	<h1 class="text-center mb-5">Crear Blance General</h1>

	<dir class="row justify-content-center mt-5">
		<dir class="col-md-8">
			<form method="POST" action="{{ route('informesfinancieros.store') }}" novalidate>
				@csrf

				<div class="form-group">
					 <label for="grupos">Informe Financiero a la que pertenece</label>
					 <select 
					 	name="grupos"
					 	class="form-control"
					 	id="grupos"
					 >
					
					 
					 	<option value="f" ></option> 
	
					 </select>
				</div>


				<div class="form-group">
					<label for="anio">Año</label>
					<input type="text" 
						name="anio" 
						class="form-control" 
						id="anio"
						placeholder="Año del Balance General"
					/>
				</div>
			

				<div class="form-group">
					<input type="submit" class="btn btn-primary" 
					value="Agregar Balance General">
				</div>

			</form>
		</dir>
	</dir>


@endsection