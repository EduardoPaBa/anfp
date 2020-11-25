@extends('layouts.app')
	@section('botones')
	<a href="{{ route('estadoresultados.index') }}" class="btn btn-primary mr-2">Volver</a>
	@endsection
	@section('content')
	<h1 class="text-center mb-5">EDITAR ESTADO DE RESULTADOS</h1>

	<dir class="row justify-content-center mt-5">
		<dir class="col-md-8">
			<form method="POST" action="{{ route('estadoresultados.update',$Estadoresultado) }}" novalidate>
				@csrf
				@method('PUT')
				<div class="form-group">
					<label for="ingreso">Ingresos</label>
					<input type="text" 
						name="ingreso" 
						class="form-control" 
						id="ingreso"
						placeholder="Ingresos"
						value="{{ $Estadoresultado->ingreso }}" 
					/>
				</div>
				<div class="form-group">
					<label for="costodeventa">Costo de Venta</label>
					<input type="text" 
						name="costodeventa" 
						class="form-control" 
						id="costodeventa"
						placeholder="Costo de Venta"
						value="{{ $Estadoresultado->costodeventa }}" 
					/>
				</div>

				<div class="form-group">
					<label for="gastodeoperacion">Gastos de operacion</label>
					<input type="text" 
						name="gastodeoperacion" 
						class="form-control" 
						id="gastodeoperacion"
						placeholder="Gastos de operacion"
						value="{{ $Estadoresultado->gastodeoperacion }}" 
					/>
				</div>
				<div class="form-group">
					<label for="gastodeadministracion">Gastos de administracion</label>
					<input type="text" 
						name="gastodeadministracion" 
						class="form-control" 
						id="gastodeadministracion"
						placeholder="Gastos de administracion"
						value="{{ $Estadoresultado->gastodeadministracion }}" 
					/>
				</div>
				<div class="form-group">
					<label for="gastodeventaymercadeo">Gastos de venta y mercadeo</label>
					<input type="text" 
						name="gastodeventaymercadeo" 
						class="form-control" 
						id="gastodeventaymercadeo"
						placeholder="Gastos de venta y mercadeo"
						value="{{ $Estadoresultado->gastodeventaymercadeo }}" 
					/>
				</div>
				<div class="form-group">
					<label for="gastofinancieros">Gastos financieros</label>
					<input type="text" 
						name="gastofinancieros" 
						class="form-control" 
						id="gastofinancieros"
						placeholder="Gastos financieros"
						value="{{ $Estadoresultado->gastofinancieros }}" 
					/>
				</div>
				<div class="form-group">
					<label for="otrosingresos">Otros ingresos</label>
					<input type="text" 
						name="otrosingresos" 
						class="form-control" 
						id="otrosingresos"
						placeholder="Otros ingresos"
						value="{{ $Estadoresultado->otrosingresos }}" 
					/>
				</div>
				<div class="form-group">
					<label for="reservalegal">Reserva legal</label>
					<input type="text" 
						name="reservalegal" 
						class="form-control" 
						id="reservalegal"
						placeholder="Reserva legal"
						value="{{ $Estadoresultado->reservalegal }}" 
					/>
				</div>
				<div class="form-group">
					<label for="impuestosobrelarenta">Impuesto sobre la renta</label>
					<input type="text" 
						name="impuestosobrelarenta" 
						class="form-control" 
						id="impuestosobrelarenta"
						placeholder="Impuesto sobre la renta"
						value="{{ $Estadoresultado->impuestosobrelarenta }}" 
					/>
				</div>


				<div class="form-group">
					<input type="submit" class="btn btn-primary" 
					value="Actualizar Estado de Resultados">
				</div>

			</form>
		</dir>
	</dir>

@endsection