@extends('layouts.app')

@section('botones')
<a href="{{ route('index') }}" class="btn btn-primary mr-2">Volver</a>
@endsection


@section('content')
	<h1 class="text-center mb-5">Crear Cuentas</h1>

	<dir class="row justify-content-center mt-5">
		<dir class="col-md-8">
			<form method="POST" action="{{ route('cuentas.store') }}" novalidate>
				@csrf

				<div class="form-group">
					 <label for="clases">Clase a la que pertenece</label>
					 <select 
					 	name="clases"
					 	class="form-control"
					 	id="clases"
					 >
					 

					 	@foreach ($clase as $cod => $ii)
					 	@foreach ($clas as $nom => $iii)
					 	@if($iii==$ii)
					 	<option value="{{$ii}}" >{{$cod}} {{$nom}}</option> 
					 	@endif
					 	@endforeach
					 	@endforeach
					 </select>
				</div>







				<div class="form-group">
					<label for="codigo">Código</label>
					<input type="text" 
						name="codigo" 
						class="form-control" 
						id="codigo"
						placeholder="Código Cuenta"
					/>
				</div>
				<div class="form-group">
					<label for="nombre">Nombre</label>
					<input type="text" 
						name="nombre" 
						class="form-control" 
						id="nombre"
						placeholder="Nombre Cuenta"
					/>
				</div>
				<div class="form-group">
					<label for="valor">Valor</label>
					<input type="text" 
						name="valor" 
						class="form-control" 
						id="valor"
						placeholder="Valor Cuenta"
					/>
				</div>

				<div class="form-group">
					<label for="iva">IVA</label>
					<input type="text" 
						name="iva" 
						class="form-control" 
						id="iva"
						placeholder="IVA" readonly="iva" 
					/>
				</div>

				<div class="form-group">
					<label for="total">Total</label>
					<input type="text" 
						name="total" 
						class="form-control" 
						id="total"
						placeholder="Total Cuenta" readonly="total" 
					/>

				<?php
				if (isset($_POST["submit"]) && !empty($_POST["submit"])) {
					if ($_POST["nombre"] == "activo") {
					
					$valorC = $_POST["valor"];
					$ivaC = $_POST["iva"];
					$totalC = $_POST["total"];

					$ivaCalc = $valorC * 0.12;
					$totalCalc = $valorC + $ivaCalc;

					echo "<h1>" .$ivaCalc . "</h1>";
					echo "<h1>" .$totalCalc . "</h1>";
					}else{
						$valorC = $_POST["valor"];
							$ivaCalc = 0;
							$totalCalc = $valorC + $ivaCalc;

							echo "<h1>" .$ivaCalc . "</h1>";
							echo "<h1>" .$totalCalc . "</h1>";
					}	
				}
					
				?>
					
				</div>

				<div class="form-group">
					<input type="submit" name="submit" class="btn btn-primary" 
					value="Agregar Cuenta">
				</div>

			</form>
		</dir>
	</dir>

<h1 class="text-center mb-5">CUENTAS</h1>
<div class="col-md-10 mx-auto bg-white p-3">
	<table class="table">
		<thead class="bg-primary text-light">
			<tr>
				<th scole="col">Codigo</th>
				<th scole="col">Nombre</th>
				<th scole="col">Valor</th>
				<th scole="col">Clase</th>
				<th scole="col">Acciones</th>
			</tr>
		</thead>
		<tbody>
			@foreach( $cuenta as $sc )
			<tr>
				<td>{{$sc->codigo}}</td>
				<td>{{$sc->nombre}}</td>
				<td>{{$sc->valor}}</td>
				<?php 
				$grande; 
				$humilde; 
				?>
				@foreach($cl as $ch)
					<?php 
						$grande="{{$ch->id}}";
						$humilde="{{$sc->clases_id}}";
					?>
					@if( $grande == $humilde )
						<td>{{$ch->codigo}}</td>
					@endif
				@endforeach

				<td></td>
			</tr> 
			@endforeach
		</tbody>
	</table>
</div>



@endsection