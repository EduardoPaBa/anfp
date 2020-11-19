	@extends('layouts.app')
	@section('botones')

	<a href="{{ route('index') }}" class="btn btn-primary mr-2">Volver</a>
	
	@endsection
	@section('content')
	






	<h1 class="text-center mb-5">ESTADO DE RESULTADOS</h1>

	<dir class="row justify-content-center mt-5">
		<dir class="col-md-8">
			<form method="POST" action="{{ route('estadoresultados.store') }}" novalidate>
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
					<label for="impuestosobrelarenta">Impuesto sobre la renta</label>
					<input type="text" 
						name="impuestosobrelarenta" 
						class="form-control" 
						id="impuestosobrelarenta"
						placeholder="Impuesto sobre la renta"
					/>
				</div>


				<div class="form-group">
					<input type="submit" class="btn btn-primary" 
					value="Agregar Estado de Resultados">
				</div>

			</form>
		</dir>
	</dir>


<div class="col-md-10 mx-auto bg-white p-3">
	<table class="table">
		<thead class="bg-primary text-light">
			<tr>
				<th scole="col">id</th>
				<th scole="col">ingreso</th>
				
				<th scole="col">costodeventa</th>
				<th scole="col">gastodeoperacion</th>
				<th scole="col">gastodeadministracion</th>
				<th scole="col">gastodeventaymercadeo</th>
				<th scole="col">gastofinancieros</th>
				<th scole="col">otrosingresos</th>
				<th scole="col">reservalegal</th>
				<th scole="col">impuestosobrelarenta</th>
				<th scole="col">BG</th>
				<th scole="col">acciones</th>
			</tr>
		</thead>
		<tbody>
			@foreach( $esre as $er )
			<tr>
				<td>{{$er->id}}</td>
				<td>{{$er->ingreso}}</td>
				<td>{{$er->costodeventa}}</td>

				<td>{{$er->gastodeoperacion}}</td>
				<td>{{$er->gastodeadministracion}}</td>
				<td>{{$er->gastodeventaymercadeo}}</td>
				<td>{{$er->gastofinancieros}}</td>
				<td>{{$er->otrosingresos}}</td>
				<td>{{$er->reservalegal}}</td>
				<td>{{$er->impuestosobrelarenta}}</td>

				
				@foreach($infin as $if)
					@if($if->id == $er->informefinancieros_id)
					<td>{{$if->nombre}} - {{$if->anio}}</td>
					@endif

				@endforeach


				<td>
					efu
				</td>
			</tr> 
			@endforeach
		</tbody>
	</table>
</div>


<h1 class="text-center mb-5">ESTADO DE RESULTADOS</h1>


<div class="p-3 mb-2 bg-dark text-white">
	@foreach($empresas as $em)
		<?php
			$empID="{$em->id}";
		?>
		<h1>Empresa: {{$em->nombre}}</h1>
		@foreach($infin as $in)
			<?php
				$infiID="{$in->id}";
				$empFK="{$in->empresas_id}";
				$nom="{$in->nombre}";
				$ani="{$in->anio}";
			?>

			@if($empID==$empFK)

				@foreach($esre as $er)
					<?php
						$erID="{$er->id}";
						$infiFK="{$er->informefinancieros_id}";
					?>
					@if($infiID==$infiFK) 
						<div class="p-3 mb-2 bg-secondary text-white">
							
						<h2>BG: {{$nom}}  año: {{$ani}}</h2>
						<?php
						//<h1>er: {{$er->id}} </h1><br>
						
						
						
						$co="{$er->costodeventa}";
						$in="{$er->ingreso}";
						$t=$in-$co;
						?>
						<div class="p-3 mb-2 bg-primary text-white">
						<h5>Utilidad bruta: {{$t}}</h5>
						<?php
						$co=$t;
						$in="{$er->gastodeoperacion}";
						$t=$co-$in;
						?>
						<h5>Utilidad de operación: {{$t}}</h5>
						<?php
						$co=$t;
						$in="{$er->otrosingresos}";
						$t=$co+$in;
						?>
						<h5>Utilidad antes de impuestos y reserva legal: {{$t}}</h5>
						<?php
						$co=$t;
						$in="{$er->reservalegal}";
						$xx="{$er->impuestosobrelarenta}";
						$t=$co+$in+$xx;
						?>
						<h5>Utilidad neta: {{$t}}</h5>
					</div>
					</div>
					@endif


					

				@endforeach
			@endif
		@endforeach
	@endforeach
</div>


	@endsection