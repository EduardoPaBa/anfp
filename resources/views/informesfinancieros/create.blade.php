@extends('layouts.app')
@section('botones')
<a href="{{ route('index') }}" class="btn btn-primary mr-2">Volver</a>
@endsection
@section('content')
	<h1 class="text-center mb-5">Crear Blance General</h1>

	<dir class="row justify-content-center mt-5">
		<dir class="col-md-8">
			<form method="POST" action="{{ route('informesfinancieros.store') }}" novalidate>
				@csrf

				<div class="form-group">
					 <label for="empresas">Empresa a la que pertenece</label>
					 <select 
					 	name="empresas"
					 	class="form-control"
					 	id="empresas"
					 >
					
					 
					 	@foreach ($empresa as $cod => $ii)
					 	@foreach ($emp as $nom => $iii)
					 	@if($iii==$ii)
					 	<option value="{{$ii}}" >{{$cod}} - {{$nom}}</option> 
					 	@endif
					 	@endforeach
					 	@endforeach
					 </select>
				</div>

				<div class="form-group">
					<label for="nombre">Nombre</label>
					<input type="text" 
						name="nombre" 
						class="form-control" 
						id="nombre"
						placeholder="Nombre del Balance General"
					/>
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