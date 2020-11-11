@extends('layouts.app')

@section('botones')
<a href="{{ route('sub_cuentas.create') }}" class="btn btn-primary mr-2">Volver</a>
@endsection


@section('content')
	<h1 class="text-center mb-5">Editar Sub Cuentas</h1>


	<dir class="row justify-content-center mt-5">
		<dir class="col-md-8">
			<form method="POST" action="{{ route('sub_cuentas.update', $subCuenta) }}" novalidate>
				@csrf
				@method('PUT')

				<div class="form-group">
					 <label for="cuentas">Cuenta a la que pertenece</label>
					<input type="text" 
						name="cuenta" 
						class="form-control" 
						id="cuenta"
						placeholder="Cuenta"
						disabled="true" 
						value="{{ $subCuenta->cuentas_id }}"
					/> 
				</div>

				<div class="form-group">
					<label for="codigo">Código</label>
					<input type="text" 
						name="codigo" 
						class="form-control" 
						id="codigo"
						placeholder="Código SubCuenta"
						value="{{ $subCuenta->codigo }}"
					/>
				</div>
				<div class="form-group">
					<label for="nombre">Nombre</label>
					<input type="text" 
						name="nombre" 
						class="form-control" 
						id="nombre"
						placeholder="Nombre SubCuenta"
						value="{{ $subCuenta->nombre }}"
					/>
				</div>
				<div class="form-group">
					<label for="valor">Valor</label>
					<input type="text" 
						name="valor" 
						class="form-control" 
						id="valor"
						placeholder="Valor SubCuenta"
						value="{{ $subCuenta->valor }}"
					/>
				</div>

				<div class="form-group">
					<input type="submit" class="btn btn-primary" 
					value="Actualizar Sub Cuenta">
				</div>

			</form>
		</dir>
	</dir>

@endsection