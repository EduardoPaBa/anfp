@extends('layouts.app')

@section('estilo')
	<link href="{{ asset('css/seleccion.css') }}" rel="stylesheet">
	<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.18/css/bootstrap-select.min.css" />
@endsection

@section('javascript')
	<script src="{{ asset('js/seleccion.js') }}"></script>
	<script src="{{ asset('js/ratios.js') }}"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
  	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  	<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.18/js/bootstrap-select.min.js"></script>
@endsection

@section('botones')
<a href="{{ route('index') }}" class="btn btn-primary mr-2">Volver</a>
@endsection

@section('content')

<?php
	$valorCompGrupos="{pasivo}";
	$valorCompClases="{pasivo corriente}";

	$valorCompCuentas="{pasivo}";
	$valorCompCuentas1="{TOTAL ACTIVOS CORRIENTES}";
	$valorCompCuentas2="{TOTAL PASIVOS CORRIENTES}";
	$valorCompCuentas3="{Inventarios}";
	$valorCompCuentas4="{TOTAL ACTIVO}";
	$valorCompCuentas5="{Cuentas por Cobrar}";
	$valorCompCuentas6="{Utilidad Bruta}";
	$valorCompCuentas7="{Utilidad Operativa}";



	$valorCompSubCuentas="{grande patas}";
	$totalPasivo=0;
	$totalActivo=0;
	$y=0;
?>


@foreach($grupos as $gr)

	<?php
	$arregloBD="{{$gr->nombre}}";
	$valorBD=$arregloBD;
	?>
	
	@if($valorBD == $valorCompGrupos)
		<h1>grupo encontrado</h1>
	@endif

	<?php
	$valorBD="";
	?>

@endforeach

@foreach($clases as $cl)

	<?php
	$arregloBD="{{$cl->nombre}}";
	$valorBD=$arregloBD;
	?>
	
	@if($valorBD == $valorCompClases)
		<h1>clase encontrada</h1>
	@endif

	<?php
	$valorBD="";
	?>

@endforeach

@foreach($cuentas as $cu)

	<?php
	$arregloBD="{{$cu->nombre}}";
	$valorBD=$arregloBD;
	?>
	
	@if($valorBD == $valorCompCuentas)
		<h1>cuenta encontrada</h1>
	@endif

	<?php
	$valorBD="";
	?>

@endforeach

@foreach($subcuentas as $sc)

	<?php
	$arregloBD="{{$sc->nombre}}";
	$valorBD=$arregloBD;
	?>
	
	@if($valorBD == $valorCompSubCuentas)
		<h1>sub cuenta encontrada</h1>
	@endif

	<?php
	$valorBD="";
	?>

@endforeach

<div class="col-md-10 mx-auto bg-white p-3">
	<h1 class="text-center">RATIOS</h1>
<!-- ######################## RATIOS DE LIQUIDEZ ############################-->
	<br>
	<u><h2>Razones de Liquidez</h2></u>

	<div class="row">

	<div class="col-sm" id="rl">
		
		<h5>Razon de liquidez corriente</h5>
		<label>Activo circulante: </label>
		@foreach($cuentas as $cu)

				<?php
				$arregloBD="{{$cu->nombre}}";
				$valorBD=$arregloBD;
				?>
				
				@if($valorBD == $valorCompCuentas1)
				<input type="text"  value="{{ $cu->valor }}" id="activoCorriente-razonLiquidez" class="col-md-4">	
				@endif

				<?php
				$valorBD="";
				?>

			@endforeach
		<br>
		<label>Pasivo circulante: </label>
		@foreach($cuentas as $cu)

				<?php
				$arregloBD="{{$cu->nombre}}";
				$valorBD=$arregloBD;
				?>
				
				@if($valorBD == $valorCompCuentas2)
				<input type="text"  value="{{ $cu->valor }}" id="pasivoCorriente-razonLiquidez" class="col-md-4">	
				@endif

				<?php
				$valorBD="";
				?>

			@endforeach
		<div class="col-6 col-md-4">
			<label>Resultado = </label>
			<input type="text" id="inputTotal-razonLiquidez" class="solo-numero">
		</div>
        
	</div>
<br>

	<div class="col-sm" id="r">
		
		<h5>Razon de efectivo</h5>
		<label>Efectivo: </label>
		<select data-live-search="true" class="selectpicker col-md-8" name="" id="id_numerador_efectivo">
		  @foreach($ratios as $r)
            <option data-tokens="" data-precio="" value="">
            	{{ $r -> rnombre }} = {{ $r -> rcuentas }} , {{ $r -> inombre}}
            </option>
		  @endforeach
		  </select>
		<br>
		<label>Valores de corto plazo: </label>
		<select data-live-search="true" class="selectpicker col-md-8" name="" id="id_numerador_valorCortoPlazo">
		  @foreach($ratios as $r)
            <option data-tokens="" data-precio="" value="">
            	{{ $r -> rnombre }} = {{ $r -> rcuentas }} , {{ $r -> inombre}}
            </option>
		  @endforeach
		  </select>
		<br>
		<label>Pasivo corriente: </label>
			@foreach($cuentas as $cu)

				<?php
				$arregloBD="{{$cu->nombre}}";
				$valorBD=$arregloBD;
				?>
				
				@if($valorBD == $valorCompCuentas2)
				<input type="text"  value="{{ $cu->valor }}" id="pasivoCorriente-razonEfectivo" class="col-md-4">	
				@endif

				<?php
				$valorBD="";
				?>

			@endforeach
		<div class="col-6 col-md-4">
			<label>Resultado = </label>
			<input type="text" id="inputTotal-razonEfectivo" class="solo-numero">
		</div>

		<input type="hidden" class="input_numerador_efectivo">
  		<input type="hidden" class="input_numerador_valorCortoPlazo">
  		

	</div>

	</div>
	<div class="row">
		<div class="col-sm" id="r">
		
		<h5>Razon rapida o prueba acida</h5>
		<label>Activo corriente: </label>
		@foreach($cuentas as $cu)

				<?php
				$arregloBD="{{$cu->nombre}}";
				$valorBD=$arregloBD;
				?>
				
				@if($valorBD == $valorCompCuentas1)
				<input type="text"  value="{{ $cu->valor }}" id="activoCorriente-razonRapida" class="col-md-4">	
				@endif

				<?php
				$valorBD="";
				?>

			@endforeach
		<br>
		<label>Inventario: </label>
		@foreach($cuentas as $cu)

				<?php
				$arregloBD="{{$cu->nombre}}";
				$valorBD=$arregloBD;
				?>
				
				@if($valorBD == $valorCompCuentas3)
				<input type="text"  value="{{ $cu->valor }}" id="inventario-razonRapida" class="col-md-4">	
				@endif

				<?php
				$valorBD="";
				?>

			@endforeach
		<br>
		<label>Pasivo corriente: </label>
		@foreach($cuentas as $cu)

				<?php
				$arregloBD="{{$cu->nombre}}";
				$valorBD=$arregloBD;
				?>
				
				@if($valorBD == $valorCompCuentas2)
				<input type="text"  value="{{ $cu->valor }}" id="pasivoCorriente-razonRapida" class="col-md-4">	
				@endif

				<?php
				$valorBD="";
				?>

			@endforeach
		<div class="col-6 col-md-4">
			<label>Resultado = </label>
			<input type="text" id="inputTotal-razonRapida" class="solo-numero">
		</div>
	</div>
	
	<div class="col-sm" id="rl">
		
		<h5>Razon de capital</h5>
		<label>Activo corriente: </label>
		@foreach($cuentas as $cu)

				<?php
				$arregloBD="{{$cu->nombre}}";
				$valorBD=$arregloBD;
				?>
				
				@if($valorBD == $valorCompCuentas1)
				<input type="text"  value="{{ $cu->valor }}" id="activoCorriente-razonCapital" class="col-md-4">	
				@endif

				<?php
				$valorBD="";
				?>

			@endforeach
		<br>
		<label>Pasivo circulante: </label>
		@foreach($cuentas as $cu)

				<?php
				$arregloBD="{{$cu->nombre}}";
				$valorBD=$arregloBD;
				?>
				
				@if($valorBD == $valorCompCuentas2)
				<input type="text"  value="{{ $cu->valor }}" id="pasivoCorriente-razonCapital" class="col-md-4">	
				@endif

				<?php
				$valorBD="";
				?>

			@endforeach
		<br>
		<label>Activo totales: </label>
		@foreach($cuentas as $cu)

				<?php
				$arregloBD="{{$cu->nombre}}";
				$valorBD=$arregloBD;
				?>
				
				@if($valorBD == $valorCompCuentas4)
				<input type="text"  value="{{ $cu->valor }}" id="activoTotal-razonCapital" class="col-md-4">	
				@endif

				<?php
				$valorBD="";
				?>

			@endforeach
		<div class="col-6 col-md-4">
			<label>Resultado = </label>
			<input type="text" id="inputTotal-razonCapital" class="solo-numero">
		</div>
        
	</div>
	</div>
	<br>
	<br>
	<div class="text-center" id="boton-razonLiquidez">
		<input type="button" id="resultados-razonLiquidez" value="Calcular" 
				onclick="razonLiquidez();" 
				onclick="razonCapital();"
				onclick="razonEfectivo();"
				onclick="razonRapida();">
	</div>
<br>
<!-- ######################## RATIOS DE ACTIVIDAD ############################-->
	<br>
	<u><h2>Razones de Actividad</h2></u>

	<div class="row">

	<div class="col-sm" id="rl">
		
		<h5>Razon de Rotacion de Inventario</h5>
		<label>Costo de ventas: </label>
		<select data-live-search="true" class="selectpicker col-md-8" name="" id="id_numerador_costosVentas_razonInventario">
		  @foreach($ratios as $r)
            <option data-tokens="" data-precio="" value="">
            	{{ $r -> rnombre }} = {{ $r -> rcuentas }} , {{ $r -> inombre}}
            </option>
		  @endforeach
		  </select>
		  <input type="hidden" id="input_numerador_costosVentas_razonInventario">
		<br>
		<label>Inventario Promedio: </label>
		@foreach($cuentas as $cu)

				<?php
				$arregloBD="{{$cu->nombre}}";
				$valorBD=$arregloBD;
				?>
				
				@if($valorBD == $valorCompCuentas4)
				<input type="text"  value="{{ $cu->valor }}" id="inventario-razonInventario" class="col-md-4">	
				@endif

				<?php
				$valorBD="";
				?>

			@endforeach
		<div class="col-6 col-md-4">
			<label>Resultado = </label>
			<input type="text" id="inputTotal-razonInventario" class="solo-numero">
		</div>

        
	</div>
<br>


	<div class="col-sm" id="r">
		
		<h5>Razon de dias de inventario</h5>
		<label>Inventrario promedio </label>
		@foreach($cuentas as $cu)

				<?php
				$arregloBD="{{$cu->nombre}}";
				$valorBD=$arregloBD;
				?>
				
				@if($valorBD == $valorCompCuentas4)
				<input type="text"  value="{{ $cu->valor }}" id="inventario-razonDiasInventario" class="col-md-4">	
				@endif

				<?php
				$valorBD="";
				?>

			@endforeach
		<br>
		<label>Costo de ventas/365: </label>
		<select data-live-search="true" class="selectpicker col-md-8" name="" id="id_numerador_costosVentas_razonDiasInventario">
		  @foreach($ratios as $r)
            <option data-tokens="" data-precio="" value="">
            	{{ $r -> rnombre }} = {{ $r -> rcuentas }} , {{ $r -> inombre}}
            </option>
		  @endforeach
		  </select>
		  <input type="hidden" id="input_numerador_costosVentas_razonDiasInventario">
		<br>
		<div class="col-6 col-md-4">
			<label>Resultado = </label>
			<input type="text" id="inputTotal-razonDiasInventario" class="solo-numero">
		</div>


	</div>

	</div>
	<br>
	<div class="row">
		<div class="col-sm" id="r">
		
		<h5>Razon de rotacion de cuentas por cobrar</h5>
		<label>Ventas Netas: </label>
		<select data-live-search="true" class="selectpicker col-md-8" name="" id="id_numerador_ventasNetas_razonCxC">
		  @foreach($ratios as $r)
            <option data-tokens="" data-precio="" value="">
            	{{ $r -> rnombre }} = {{ $r -> rcuentas }} , {{ $r -> inombre}}
            </option>
		  @endforeach
		  </select>
		  <input type="text" id="input_numerador_ventasNetas_razonCxC">
		<br>
		<label>Promedio de CxP comerciales: </label>
		@foreach($cuentas as $cu)

				<?php
				$arregloBD="{{$cu->nombre}}";
				$valorBD=$arregloBD;
				?>
				
				@if($valorBD == $valorCompCuentas5)
				<input type="text"  value="{{ $cu->valor }}" id="CxC-razonCxC" class="col-md-4">	
				@endif

				<?php
				$valorBD="";
				?>

			@endforeach
		<br>
		<div class="col-6 col-md-4">
			<label>Resultado = </label>
			<input type="text" id="inputTotal-razonCxC" class="solo-numero">
		</div>
	</div>
	
	<div class="col-sm" id="rl">
		
		<h5>Razon de medio de cobranza</h5>
		<label>Promedio de CxC comerciales * 365: </label>
		@foreach($cuentas as $cu)

				<?php
				$arregloBD="{{$cu->nombre}}";
				$valorBD=$arregloBD;
				?>
				
				@if($valorBD == $valorCompCuentas5)
				<input type="text"  value="{{ $cu->valor }}" id="CxC-razonMedioC" class="col-md-4">	
				@endif

				<?php
				$valorBD="";
				?>

			@endforeach
		<br>
		<label>Ventas Netas: </label>
		<select data-live-search="true" class="selectpicker col-md-8" name="" id="id_numerador_ventasNetas_razonMedioC">
		  @foreach($ratios as $r)
            <option data-tokens="" data-precio="" value="">
            	{{ $r -> rnombre }} = {{ $r -> rcuentas }} , {{ $r -> inombre}}
            </option>
		  @endforeach
		  </select>
		  <input type="hidden" id="input_numerador_ventasNetas_razonMedioC">
		<br>
		<div class="col-6 col-md-4">
			<label>Resultado = </label>
			<input type="text" id="inputTotal-razonMedioC" class="solo-numero">
		</div>
        
	</div>
	</div>

	<br>

	<div class="row">
		<div class="col-sm" id="r">
		
		<h5>Razon de rotacion de CxP</h5>
		<label>Compras: </label>
		<select data-live-search="true" class="selectpicker col-md-8" name="" id="id_numerador_compras_razonCxP">
		  @foreach($ratios as $r)
            <option data-tokens="" data-precio="" value="">
            	{{ $r -> rnombre }} = {{ $r -> rcuentas }} , {{ $r -> inombre}}
            </option>
		  @endforeach
		  </select>
		  <input type="hidden" id="input_numerador_compras_razonCxP">
		<br>
		<label>Promedio de CxP comerciales: </label>
		<select data-live-search="true" class="selectpicker col-md-8" name="" id="id_denominador_razonCxP">
		  @foreach($ratios as $r)
            <option data-tokens="" data-precio="" value="">
            	{{ $r -> rnombre }} = {{ $r -> rcuentas }} , {{ $r -> inombre}}
            </option>
		  @endforeach
		  </select>
		  <input type="hidden" id="input_denominador_razonCxP">
		<br>
		<div class="col-6 col-md-4">
			<label>Resultado = </label>
			<input type="text" id="inputTotal-razonCxP" class="solo-numero">
		</div>
	</div>
	
	<div class="col-sm" id="rl">
		
		<h5>Periodo de medio de pago</h5>
		<label>Promedio de CxP Comerciales*365: </label>
		<select data-live-search="true" class="selectpicker col-md-8" name="" id="id_denominador_razonMedioP">
		  @foreach($ratios as $r)
            <option data-tokens="" data-precio="" value="">
            	{{ $r -> rnombre }} = {{ $r -> rcuentas }} , {{ $r -> inombre}}
            </option>
		  @endforeach
		  </select>
		  <input type="hidden" id="input_denominador_razonMedioP">
		<br>
		<label>Compras: </label>
		<select data-live-search="true" class="selectpicker col-md-8" name="" id="id_numerador_compras_razonMedioP">
		  @foreach($ratios as $r)
            <option data-tokens="" data-precio="" value="">
            	{{ $r -> rnombre }} = {{ $r -> rcuentas }} , {{ $r -> inombre}}
            </option>
		  @endforeach
		  </select>
		  <input type="hidden" id="input_numerador_compras_razonMedioP">
		<br>
		<div class="col-6 col-md-4">
			<label>Resultado = </label>
			<input type="text" id="inputTotal-razonMedioP" class="solo-numero">
		</div>
        
	</div>
	</div>

	<br>


	<div class="row">
		<div class="col-sm" id="r">
		
		<h5>Indice de rotacion de activos totales</h5>
		<label>Ventas Netas: </label>
		<select data-live-search="true" class="selectpicker col-md-8" name="" id="id_numerador_ventasNetas_razonIndiceA">
		  @foreach($ratios as $r)
            <option data-tokens="" data-precio="" value="">
            	{{ $r -> rnombre }} = {{ $r -> rcuentas }} , {{ $r -> inombre}}
            </option>
		  @endforeach
		  </select>
		  <input type="hidden" id="input_numerador_ventasNetas_razonIndiceA">
		<br>
		<label>Activo Total Promedio: </label>
		@foreach($cuentas as $cu)

				<?php
				$arregloBD="{{$cu->nombre}}";
				$valorBD=$arregloBD;
				?>
				
				@if($valorBD == $valorCompCuentas5)
				<input type="text"  value="{{ $cu->valor }}" id="activoTotal-razonIndiceA" class="col-md-4">	
				@endif

				<?php
				$valorBD="";
				?>

			@endforeach
		<br>
		<div class="col-6 col-md-4">
			<label>Resultado = </label>
			<input type="text" id="inputTotal-razonIndiceA" class="solo-numero">
		</div>
	</div>
	
	<div class="col-sm" id="rl">
		
		<h5>Indice de rotacion de activos fijos</h5>
		<label>Ventas Netas: </label>
		<select data-live-search="true" class="selectpicker col-md-8" name="" id="id_numerador_ventasNetas_razonActivosF">
		  @foreach($ratios as $r)
            <option data-tokens="" data-precio="" value="">
            	{{ $r -> rnombre }} = {{ $r -> rcuentas }} , {{ $r -> inombre}}
            </option>
		  @endforeach
		  </select>
		  <input type="hidden" id="input_numerador_ventasNetas_razonActivosF">
		<br>
		<label>Activo Fijo Neto Promedio: </label>
		<select data-live-search="true" class="selectpicker col-md-8" name="" id="id_numerador_activoFijo_razonActivosF">
		  @foreach($ratios as $r)
            <option data-tokens="" data-precio="" value="">
            	{{ $r -> rnombre }} = {{ $r -> rcuentas }} , {{ $r -> inombre}}
            </option>
		  @endforeach
		  </select>
		  <input type="hidden" id="input_numerador_activoFijo_razonActivosF">
		<br>
		<div class="col-6 col-md-4">
			<label>Resultado = </label>
			<input type="text" id="inputTotal-razonActivosF" class="solo-numero">
		</div>
        
	</div>
	</div>

	<br>


	<div class="row">
		<div class="col-sm" id="r">
		
		<h5>Indice de Margen Bruto</h5>
		<label>Utilidad Bruta: </label>
		@foreach($cuentas as $cu)

				<?php
				$arregloBD="{{$cu->nombre}}";
				$valorBD=$arregloBD;
				?>
				
				@if($valorBD == $valorCompCuentas6)
				<input type="text"  value="{{ $cu->valor }}" id="utilidadB-razonMargenB" class="col-md-4">	
				@endif

				<?php
				$valorBD="";
				?>

			@endforeach
		<br>
		<label>Ventas: </label>
		<select data-live-search="true" class="selectpicker col-md-8" name="" id="id_numerador_ventasNetas_razonMargenB">
		  @foreach($ratios as $r)
            <option data-tokens="" data-precio="" value="">
            	{{ $r -> rnombre }} = {{ $r -> rcuentas }} , {{ $r -> inombre}}
            </option>
		  @endforeach
		  </select>
		  <input type="hidden" id="input_numerador_ventasNetas_razonMargenB">
		<br>
		<div class="col-6 col-md-4">
			<label>Resultado = </label>
			<input type="text" id="inputTotal-razonMargenB" class="solo-numero">
		</div>
	</div>
	
	<div class="col-sm" id="rl">
		
		<h5>Indice de Margen Operativo</h5>
		<label>Utilidad Operativa: </label>
		@foreach($cuentas as $cu)

				<?php
				$arregloBD="{{$cu->nombre}}";
				$valorBD=$arregloBD;
				?>
				
				@if($valorBD == $valorCompCuentas7)
				<input type="text"  value="{{ $cu->valor }}" id="utilidadO-razonMargenO" class="col-md-4">	
				@endif

				<?php
				$valorBD="";
				?>

			@endforeach
		<br>
		<label>Ventas: </label>
		<select data-live-search="true" class="selectpicker col-md-8" name="" id="id_numerador_ventas_razonMargenO">
		  @foreach($ratios as $r)
            <option data-tokens="" data-precio="" value="">
            	{{ $r -> rnombre }} = {{ $r -> rcuentas }} , {{ $r -> inombre}}
            </option>
		  @endforeach
		  </select>
		  <input type="hidden" id="input_numerador_ventas_razonMargenO">
		<br>
		<div class="col-6 col-md-4">
			<label>Resultado = </label>
			<input type="text" id="inputTotal-razonMargenO" class="solo-numero">
		</div>
        
	</div>
	</div>
	
	<div class="text-center" id="boton-razonActividad">
		<input type="button" id="resultados-razonActividad" value="Calcular" 
				onclick="razonInventario();"
				onclick="razonDiasInventario();"
				onclick="razonCxC();"
				onclick="razonMedioC();"
				onclick="razonCxP();"
				onclick="razonMedioP();"
				onclick="razonIndiceA();"
				onclick="razonActivosF();"
				onclick="razonMargenB();"
				onclick="razonMargenO();">
	</div>

	<br>

	<!-- ######################## RATIOS DE RENTABILIDAD ############################-->
	<u><h2>Razones de Rentabilidad</h2></u>

	<div class="row">

	<div class="col-sm" id="rl">
		
		<h5>Rentabilidad Neta del Patrimonio</h5>
		<label>Utilidad Neta: </label>
		<select data-live-search="true" class="selectpicker col-md-8" name="" id="id_numerador">
		  @foreach($ratios as $r)
            <option data-tokens="" data-precio="" value="">
            	{{ $r -> rnombre }} = {{ $r -> rcuentas }}
            </option>
		  @endforeach
		  </select>
		<br>
		<label>Patrimonio Promedio: </label>
		<select data-live-search="true" class="selectpicker col-md-8" name="" id="id_denominador">
  		@foreach($ratios as $r)
            <option data-tokens="" data-precio="" value="">
            	{{ $r -> rnombre }} = {{ $r -> rcuentas }}
            </option>
            @endforeach
  		</select>
		<div class="col-6 col-md-4">
			<label>Resultado = </label>
			<input type="text" id="inputTotal" class="solo-numero">
		</div>
        
	</div>
<br>
  
  <input type="hidden" class="input_numerador">
  <input type="hidden" class="input_denominador">

	<div class="col-sm" id="r">
		
		<h5>Rentabilidad por Acccion</h5>
		<label>Uilidad Neta: </label>
		<input type="text" name="act" class="col-md-4">
		<br>
		<label>Numero de acciones: </label>
		<input type="text" name="pas" class="col-md-4">
		<br>
		<div class="col-6 col-md-4">
			<label>Resultado = </label>
			<input type="text" id="inputTotal" class="solo-numero">
		</div>


	</div>

	</div>
	<br>
	<div class="row">
		<div class="col-sm" id="r">
		
		<h5>Rentabilidad del Activo</h5>
		<label>Utilidad Neta: </label>
		<input type="text" name="act" class="col-md-4">
		<br>
		<label>Activo Total Promedio: </label>
		<input type="text" name="pas" class="col-md-4">
		<br>
		<div class="col-6 col-md-4">
			<label>Resultado = </label>
			<input type="text" id="inputTotal" class="solo-numero">
		</div>
	</div>
	
	<div class="col-sm" id="rl">
		
		<h5>Rentabilidad sobre Ventas</h5>
		<label>Utilidad Neta: </label>
		<select data-live-search="true" class="selectpicker" name="" id="id_numerador">
		  <option value="">Seleccionar cuenta</option>
		  @foreach($ratios as $r)
		            <option data-tokens="" data-precio="{{ $r -> rcuentas }}" value="{{ $r -> rcuentas }}">
		            	{{ $r -> rcuentas }}
		            </option>
		            @endforeach
		  </select>
		<br>
		<label>Ventas: </label>
		<select data-live-search="true" class="selectpicker" name="" id="id_denominador">
  		<option value="">Seleccionar cuenta</option>
  		@foreach($ratios as $r)
            <option data-tokens="" data-precio="{{ $r -> rcuentas }}" value="{{ $r -> rcuentas }}">
            	{{ $r -> rcuentas }}
            </option>
            @endforeach
  		</select>
		<br>
		<div class="col-6 col-md-4">
			<label>Resultado = </label>
			<input type="text" id="inputTotal" class="solo-numero">
		</div>
        
	</div>
	</div>

	<br>
	<div class="col-sm" id="rl">
		
		<h5>Rentabilidad sobre Inversion</h5>
		<label>Ingresos: </label>
		<select data-live-search="true" class="selectpicker" name="" id="id_numerador">
		  <option value="">Seleccionar cuenta</option>
		  @foreach($ratios as $r)
		            <option data-tokens="" data-precio="{{ $r -> rcuentas }}" value="{{ $r -> rcuentas }}">
		            	{{ $r -> rcuentas }}
		            </option>
		            @endforeach
		  </select>
		<br>
		<label>Inversion: </label>
		<select data-live-search="true" class="selectpicker" name="" id="id_denominador">
  		<option value="">Seleccionar cuenta</option>
  		@foreach($ratios as $r)
            <option data-tokens="" data-precio="{{ $r -> rcuentas }}" value="{{ $r -> rcuentas }}">
            	{{ $r -> rcuentas }}
            </option>
            @endforeach
  		</select>
		<br>
		<label>Inversion: </label>
		<select data-live-search="true" class="selectpicker" name="" id="id_numerador">
		  <option value="">Seleccionar cuenta</option>
		  @foreach($ratios as $r)
		            <option data-tokens="" data-precio="{{ $r -> rcuentas }}" value="{{ $r -> rcuentas }}">
		            	{{ $r -> rcuentas }}
		            </option>
		            @endforeach
		  </select>
		<div class="col-6 col-md-4">
			<label>Resultado = </label>
			<input type="text" id="inputTotal" class="solo-numero">
		</div>
        
	</div>


	<br>
	<!-- ######################## RATIOS DE ENDEUDAMIENTO ############################-->
	<u><h2>Razones de Endeudamiento</h2></u>

	<div class="row">

	<div class="col-sm" id="rl">
		
		<h5>Grado de Endeudamiento</h5>
		<label>Pasivo Total: </label>
		<select data-live-search="true" class="selectpicker col-md-8" name="" id="id_numerador">
		  @foreach($ratios as $r)
            <option data-tokens="" data-precio="" value="">
            	{{ $r -> rnombre }} = {{ $r -> rcuentas }}
            </option>
		  @endforeach
		  </select>
		<br>
		<label>Activo Total: </label>
		<select data-live-search="true" class="selectpicker col-md-8" name="" id="id_denominador">
  		@foreach($ratios as $r)
            <option data-tokens="" data-precio="" value="">
            	{{ $r -> rnombre }} = {{ $r -> rcuentas }}
            </option>
            @endforeach
  		</select>
		<div class="col-6 col-md-4">
			<label>Resultado = </label>
			<input type="text" id="inputTotal" class="solo-numero">
		</div>
        
	</div>
<br>
  
  <input type="hidden" class="input_numerador">
  <input type="hidden" class="input_denominador">

	<div class="col-sm" id="r">
		
		<h5>Grado de Propiedad</h5>
		<label>Patrimonio: </label>
		<input type="text" name="act" class="col-md-4">
		<br>
		<label>Activo Total: </label>
		<input type="text" name="pas" class="col-md-4">
		<br>
		<label>Pasivo corriente: </label>
		<input type="text" name="pas" class="col-md-4">
		<div class="col-6 col-md-4">
			<label>Resultado = </label>
			<input type="text" id="inputTotal" class="solo-numero">
		</div>


	</div>

	</div>
	<br>
	<div class="row">
		<div class="col-sm" id="r">
		
		<h5>Razon de Endeudamiento Patrimonial</h5>
		<label>Pasivo Total: </label>
		<input type="text" name="act" class="col-md-4">
		<br>
		<label>Patrimonio Total: </label>
		<input type="text" name="pas" class="col-md-4">
		<br>
		<div class="col-6 col-md-4">
			<label>Resultado = </label>
			<input type="text" id="inputTotal" class="solo-numero">
		</div>
	</div>
	
	<div class="col-sm" id="rl">
		
		<h5>Razon de cobertura de Gastos Financieros</h5>
		<label>Utilidades antes de interes e impuestos: </label>
		<select data-live-search="true" class="selectpicker" name="" id="id_numerador">
		  <option value="">Seleccionar cuenta</option>
		  @foreach($ratios as $r)
		            <option data-tokens="" data-precio="{{ $r -> rcuentas }}" value="{{ $r -> rcuentas }}">
		            	{{ $r -> rcuentas }}
		            </option>
		            @endforeach
		  </select>
		<br>
		<label>Gastos Financieros: </label>
		<select data-live-search="true" class="selectpicker" name="" id="id_denominador">
  		<option value="">Seleccionar cuenta</option>
  		@foreach($ratios as $r)
            <option data-tokens="" data-precio="{{ $r -> rcuentas }}" value="{{ $r -> rcuentas }}">
            	{{ $r -> rcuentas }}
            </option>
            @endforeach
  		</select>
		<br>
		<div class="col-6 col-md-4">
			<label>Resultado = </label>
			<input type="text" id="inputTotal" class="solo-numero">
		</div>
        
	</div>
	</div>

	<br>





</div>
<div class="col-md-10 mx-auto bg-white p-3">
	<table class="table" id="tabla">
		<thead class="bg-primary text-light">
			<tr>
				<th >Codigo</th>
				<th >Nombre</th>
				<th >Valor</th>
				<th >Acciones</th>
			</tr>
		</thead>
		<tbody>

			@foreach ($subcuentas as $sc)
				<tr>	
					<td>{{$sc->codigo}}</td>
					<td>{{$sc->nombre}}</td>
					<td>{{$sc->valor}}</td>
					<td> </td>	
				</tr>
			@endforeach



			@foreach ($grupos as $gr)
			<tr>		
				<td>{{$gr->codigo}}</td>
				<td>{{$gr->nombre}}</td>
				<td> </td>
				<td> </td>
				@foreach ($clases as $cl)
				@php
				$x="{{$gr->id}}";
				$y="{{$cl->grupos_id}}";
				@endphp
				@if($x==$y)
				<tr>	
					<td>{{$cl->codigo}}</td>
					<td>{{$cl->nombre}}</td>
					<td> </td>
					<td> </td>
					@foreach ($cuentas as $cu)
						@php
						$x="{{$cl->id}}";
						$y="{{$cu->clases_id}}";
						@endphp
						@if($x==$y)
						<tr>	
							<td>{{$cu->codigo}}</td>
							<td>{{$cu->nombre}}</td>
							<td>{{$cu->valor}}</td>
							<td> </td>
							@foreach ($subcuentas as $sc)
								@php
								$x="{{$cu->id}}";
								$y="{{$sc->cuentas_id}}";
								@endphp
								@if($x==$y)
								<tr>	
									<td>{{$sc->codigo}}</td>
									<td>{{$sc->nombre}}</td>
									<td>{{$sc->valor}}</td>
									<td> </td>	
								</tr>
								@endif
							@endforeach
						</tr>
						@endif
					@endforeach
				
				</tr>
				@endif
				@endforeach
			</tr>
			@endforeach
			
				
		</tbody>
	</table>
</div>





@endsection