	@extends('layouts.app')
	@section('botones')

	<a href="{{ route('index') }}" class="btn btn-primary mr-2">Volver</a>
	
	@endsection
	@section('content')


	<h1 class="text-center mb-5">ESTADO DE RESULTADOS</h1>

	<dir class="row justify-content-center mt-5">
		<dir class="col-md-8">
			<form method="POST" action="{{ route('grupos.store') }}" novalidate>
				@csrf
				<div class="form-group">
					 <label for="bg">Balance General al que pertenece</label>
					 <select 
					 	name="bg"
					 	class="form-control"
					 	id="bg"
					 >
					 	
					 	@foreach ($infin as $i )
					 	<option value="{{$i->id}}" >{{$i->nombre}} - año:{{$i->anio}}</option> 
					 	@endforeach
					 </select>
				</div>

				<div class="form-group">
					<label for="ingreso">Ingresos</label>
					<input type="text" 
						name="ingreso" 
						class="form-control" 
						id="ingreso"
						placeholder="Ingresos"
					/>
				</div>
				<div class="form-group">
					<label for="costodeventa">Costo de Venta</label>
					<input type="text" 
						name="costodeventa" 
						class="form-control" 
						id="costodeventa"
						placeholder="Costo de Venta"
					/>
				</div>

				<div class="form-group">
					<label for="gastodeoperacion">Gastos de operacion</label>
					<input type="text" 
						name="gastodeoperacion" 
						class="form-control" 
						id="gastodeoperacion"
						placeholder="Gastos de operacion"
					/>
				</div>
				<div class="form-group">
					<label for="gastodeadministracion">Gastos de administracion</label>
					<input type="text" 
						name="gastodeadministracion" 
						class="form-control" 
						id="gastodeadministracion"
						placeholder="Gastos de administracion"
					/>
				</div>
				<div class="form-group">
					<label for="gastodeventaymercadeo">Gastos de venta y mercadeo</label>
					<input type="text" 
						name="gastodeventaymercadeo" 
						class="form-control" 
						id="gastodeventaymercadeo"
						placeholder="Gastos de venta y mercadeo"
					/>
				</div>
				<div class="form-group">
					<label for="gastofinancieros">Gastos financieros</label>
					<input type="text" 
						name="gastofinancieros" 
						class="form-control" 
						id="gastofinancieros"
						placeholder="Gastos financieros"
					/>
				</div>
				<div class="form-group">
					<label for="otrosingresos">Otros ingresos</label>
					<input type="text" 
						name="otrosingresos" 
						class="form-control" 
						id="otrosingresos"
						placeholder="Otros ingresos"
					/>
				</div>
				<div class="form-group">
					<label for="reservalegal">Reserva legal</label>
					<input type="text" 
						name="reservalegal" 
						class="form-control" 
						id="reservalegal"
						placeholder="Reserva legal"
					/>
				</div>
				<div class="form-group">
					<label for="impuesto sobre la renta">Impuesto sobre la renta</label>
					<input type="text" 
						name="impuesto sobre la renta" 
						class="form-control" 
						id="impuesto sobre la renta"
						placeholder="Impuesto sobre la renta"
					/>
				</div>


				<div class="form-group">
					<input type="submit" class="btn btn-primary" 
					value="Agregar Grupo">
				</div>

			</form>
		</dir>
	</dir>








	@endsection