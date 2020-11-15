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
	$valorCompCuentas8="{Utilidad Neta}";
	$valorCompCuentas9="{TOTAL PASIVOS NO CORRIENTES}";
	$valorCompCuentas10="{TOTAL PASIVO}";
	$valorCompCuentas11="{Utilidad antes de impuesto y reserva legal}";
	$valorCompCuentas12="{Cuentas por Pagar}";
	$valorCompCuentas13="{TOTAL ACTIVOS NO CORRIENTES}";


	$valorEstadoR = "{Costo de Ventas}";
	$valorEstadoR1 = "{Ingreso}";



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

<select data-live-search="true" class="selectpicker col-md-8" name="" id="id_numerador_efectivo">
		  @foreach($esre as $r)
            <option>Ingreso = {{ $r-> ingreso }}</option>
            <option> Costo de Ventas = {{ $r-> costodeventa }}</option>
            <option> Gastos de Operacion = {{ $r-> gastodeoperacion }} </option>
            <option> Gastos de Administracion = {{ $r-> gastodeadministracion }} </option>
            <option> Gastos de Venta y Mercadeo = {{ $r-> gastodeventaymercadeo }} </option>
            <option> Gastos Financieros = {{ $r-> gastofinancieros }} </option>
            <option> Otros ingresos = {{ $r-> otrosingresos }} </option>
            <option> Reserva legal = {{ $r-> reservalegal }} </option>
            <option> Impuestos sobre la renta = {{ $r-> impuestosobrelarenta }} </option>

		  @endforeach
		  </select>
	<div class="col-sm" id="rl">
		
		<h5>Razon de liquidez corriente</h5>
		<label>Activo circulante: </label>
		@foreach($ratios2 as $r)
				<input type="text"  value="{{ $r->valor }}" id="activoCorriente-razonLiquidez2" class="col-md-4">	
		@endforeach
		<br>
		<h5>Razon de liquidez corriente</h5>
		<label>Activo circulante: </label>
		@foreach($ratios3 as $r1)
				<input type="text"  value="{{ $r1->valor }}" id="activoCorriente-razonLiquidez3" class="col-md-4">	
		@endforeach
		<br>
		<div class="col-6 col-md-4">
			<label>Resultado = </label>
			<input type="text" id="inputTotal-razonLiquidezP" class="solo-numero">
		</div>
        
	</div>
<br>

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
            	{{ $r-> gnombre }} - {{ $r -> rnombre }} = {{ $r -> rcuentas }} , {{ $r -> inombre}}
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
				onclick="razonRapida();"
				onclick="razonPromedio();">
	</div>
<br>

<br>
	<u><h2>Razones de Liquidez</h2></u>

	<div class="row">

	<div class="col-sm" id="rl">
		
		<h5>Razon de liquidez corriente</h5>
		<label>Activo circulante: </label>
		@foreach($cuentas1 as $cu)

				<?php
				$arregloBD="{{$cu->nombre}}";
				$valorBD=$arregloBD;
				?>
				
				@if($valorBD == $valorCompCuentas1)
				<input type="text"  value="{{ $cu->valor }}" id="activoCorriente-razonLiquidez1" class="col-md-4">	
				@endif

				<?php
				$valorBD="";
				?>

			@endforeach
		<br>
		<label>Pasivo circulante: </label>
		@foreach($cuentas1 as $cu)

				<?php
				$arregloBD="{{$cu->nombre}}";
				$valorBD=$arregloBD;
				?>
				
				@if($valorBD == $valorCompCuentas2)
				<input type="text"  value="{{ $cu->valor }}" id="pasivoCorriente-razonLiquidez1" class="col-md-4">	
				@endif

				<?php
				$valorBD="";
				?>

			@endforeach
		<div class="col-6 col-md-4">
			<label>Resultado = </label>
			<input type="text" id="inputTotal-razonLiquidez1" class="solo-numero">
		</div>
        
	</div>
<br>

	<div class="col-sm" id="r">
		
		<h5>Razon de efectivo</h5>
		<label>Efectivo: </label>
		<select data-live-search="true" class="selectpicker col-md-8" name="" id="id_numerador_efectivo1">
		  @foreach($ratios1 as $r)
            <option data-tokens="" data-precio="" value="">
            	{{ $r -> rnombre }} = {{ $r -> rcuentas }} , {{ $r -> inombre}}
            </option>
		  @endforeach
		  </select>
		<br>
		<label>Valores de corto plazo: </label>
		<select data-live-search="true" class="selectpicker col-md-8" name="" id="id_numerador_valorCortoPlazo1">
		  @foreach($ratios1 as $r)
            <option data-tokens="" data-precio="" value="">
            	{{ $r -> rnombre }} = {{ $r -> rcuentas }} , {{ $r -> inombre}}
            </option>
		  @endforeach
		  </select>
		<br>
		<label>Pasivo corriente: </label>
			@foreach($cuentas1 as $cu)

				<?php
				$arregloBD="{{$cu->nombre}}";
				$valorBD=$arregloBD;
				?>
				
				@if($valorBD == $valorCompCuentas2)
				<input type="text"  value="{{ $cu->valor }}" id="pasivoCorriente-razonEfectivo1" class="col-md-4">	
				@endif

				<?php
				$valorBD="";
				?>

			@endforeach
		<div class="col-6 col-md-4">
			<label>Resultado = </label>
			<input type="text" id="inputTotal-razonEfectivo1" class="solo-numero">
		</div>

		<input type="hidden" class="input_numerador_efectivo1">
  		<input type="hidden" class="input_numerador_valorCortoPlazo1">
  		

	</div>

	</div>
	<div class="row">
		<div class="col-sm" id="r">
		
		<h5>Razon rapida o prueba acida</h5>
		<label>Activo corriente: </label>
		@foreach($cuentas1 as $cu)

				<?php
				$arregloBD="{{$cu->nombre}}";
				$valorBD=$arregloBD;
				?>
				
				@if($valorBD == $valorCompCuentas1)
				<input type="text"  value="{{ $cu->valor }}" id="activoCorriente-razonRapida1" class="col-md-4">	
				@endif

				<?php
				$valorBD="";
				?>

			@endforeach
		<br>
		<label>Inventario: </label>
		@foreach($cuentas1 as $cu)

				<?php
				$arregloBD="{{$cu->nombre}}";
				$valorBD=$arregloBD;
				?>
				
				@if($valorBD == $valorCompCuentas3)
				<input type="text"  value="{{ $cu->valor }}" id="inventario-razonRapida1" class="col-md-4">	
				@endif

				<?php
				$valorBD="";
				?>

			@endforeach
		<br>
		<label>Pasivo corriente: </label>
		@foreach($cuentas1 as $cu)

				<?php
				$arregloBD="{{$cu->nombre}}";
				$valorBD=$arregloBD;
				?>
				
				@if($valorBD == $valorCompCuentas2)
				<input type="text"  value="{{ $cu->valor }}" id="pasivoCorriente-razonRapida1" class="col-md-4">	
				@endif

				<?php
				$valorBD="";
				?>

			@endforeach
		<div class="col-6 col-md-4">
			<label>Resultado = </label>
			<input type="text" id="inputTotal-razonRapida1" class="solo-numero">
		</div>
	</div>
	
	<div class="col-sm" id="rl">
		
		<h5>Razon de capital</h5>
		<label>Activo corriente: </label>
		@foreach($cuentas1 as $cu)

				<?php
				$arregloBD="{{$cu->nombre}}";
				$valorBD=$arregloBD;
				?>
				
				@if($valorBD == $valorCompCuentas1)
				<input type="text"  value="{{ $cu->valor }}" id="activoCorriente-razonCapital1" class="col-md-4">	
				@endif

				<?php
				$valorBD="";
				?>

			@endforeach
		<br>
		<label>Pasivo circulante: </label>
		@foreach($cuentas1 as $cu)

				<?php
				$arregloBD="{{$cu->nombre}}";
				$valorBD=$arregloBD;
				?>
				
				@if($valorBD == $valorCompCuentas2)
				<input type="text"  value="{{ $cu->valor }}" id="pasivoCorriente-razonCapital1" class="col-md-4">	
				@endif

				<?php
				$valorBD="";
				?>

			@endforeach
		<br>
		<label>Activo totales: </label>
		@foreach($cuentas1 as $cu)

				<?php
				$arregloBD="{{$cu->nombre}}";
				$valorBD=$arregloBD;
				?>
				
				@if($valorBD == $valorCompCuentas4)
				<input type="text"  value="{{ $cu->valor }}" id="activoTotal-razonCapital1" class="col-md-4">	
				@endif

				<?php
				$valorBD="";
				?>

			@endforeach
		<div class="col-6 col-md-4">
			<label>Resultado = </label>
			<input type="text" id="inputTotal-razonCapital1" class="solo-numero">
		</div>
        
	</div>
	</div>
	<br>
	<br>
	<div class="text-center" id="boton-razonLiquidez1">
		<input type="button" id="resultados-razonLiquidez1" value="Calcular" 
				onclick="razonLiquidez1();" 
				onclick="razonCapital1();"
				onclick="razonEfectivo1();"
				onclick="razonRapida1();"
				onclick="razonPromedio1();">
	</div>
<br>
<!-- ######################## RATIOS DE ACTIVIDAD ############################-->
	<br>
	<u><h2>Razones de Actividad 1</h2></u>

	<div class="row">

	<div class="col-sm" id="rl">
		
		<h5>Razon de Rotacion de Inventario</h5>
		<label>Costo de ventas: </label>
		@foreach($esre as $r)
		<input  name="" id="id_numerador_costosVentas_razonInventario" value="{{ $r -> costov }}">
        @endforeach
		<br>
		<label>Inventario Promedio: </label>
		@foreach($cuentas as $cu)

				<?php
				$arregloBD="{{$cu->nombre}}";
				$valorBD=$arregloBD;
				?>
				
				@if($valorBD == $valorCompCuentas3)
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
				
				@if($valorBD == $valorCompCuentas3)
				<input type="text"  value="{{ $cu->valor }}" id="inventario-razonDiasInventario" class="col-md-4">	
				@endif

				<?php
				$valorBD="";
				?>

			@endforeach
		<br>
		<label>Costo de ventas/365: </label>
		@foreach($esre as $r)
		<input  name="" id="id_numerador_costosVentas_razonDiasInventario" value="{{ $r -> costov }}">
        @endforeach
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
		@foreach($esre as $r)
		<input  name="" id="id_numerador_ventasNetas_razonCxC" value="{{ $r -> eingreso }}">
        @endforeach
		<br>
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
		@foreach($esre as $r)
		<input  name="" id="id_numerador_ventasNetas_razonMedioC" value="{{ $r -> eingreso }}">
        @endforeach
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
		@foreach($esre as $r)
		<input  name="" id="id_numerador_compras_razonCxP" value="{{ $r -> egastoV }}">
        @endforeach
		<br>
		<label>Promedio de CxP comerciales: </label>
		@foreach($cuentas as $cu)

				<?php
				$arregloBD="{{$cu->nombre}}";
				$valorBD=$arregloBD;
				?>
				
				@if($valorBD == $valorCompCuentas12)
				<input type="text"  value="{{ $cu->valor }}" id="CxP-razonCxP" class="col-md-4">	
				@endif

				<?php
				$valorBD="";
				?>

			@endforeach
		<br>
		<div class="col-6 col-md-4">
			<label>Resultado = </label>
			<input type="text" id="inputTotal-razonCxP" class="solo-numero">
		</div>
	</div>
	
	<div class="col-sm" id="rl">
		
		<h5>Periodo de medio de pago</h5>
		<label>Promedio de CxP Comerciales*365: </label>
		@foreach($cuentas as $cu)

				<?php
				$arregloBD="{{$cu->nombre}}";
				$valorBD=$arregloBD;
				?>
				
				@if($valorBD == $valorCompCuentas12)
				<input type="text"  value="{{ $cu->valor }}" id="mCxP-razonCxP" class="col-md-4">	
				@endif

				<?php
				$valorBD="";
				?>

			@endforeach
		<br>
		<label>Compras: </label>
		@foreach($esre as $r)
		<input  name="" id="id_numerador_compras_razonMedioP" value="{{ $r -> egastoV }}">
        @endforeach
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
		@foreach($esre as $r)
		<input  name="" id="id_numerador_ventasNetas_razonIndiceA" value="{{ $r -> eingreso }}">
        @endforeach
		<br>
		<label>Activo Total Promedio: </label>
		@foreach($cuentas as $cu)

				<?php
				$arregloBD="{{$cu->nombre}}";
				$valorBD=$arregloBD;
				?>
				
				@if($valorBD == $valorCompCuentas4)
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
		@foreach($esre as $r)
		<input  name="" id="id_numerador_ventasNetas_razonActivosF" value="{{ $r -> eingreso }}">
        @endforeach
		<br>
		<label>Activo Fijo Neto Promedio: </label>
		@foreach($cuentas as $cu)

				<?php
				$arregloBD="{{$cu->nombre}}";
				$valorBD=$arregloBD;
				?>
				
				@if($valorBD == $valorCompCuentas13)
				<input type="text"  value="{{ $cu->valor }}" id="activoFijoNeto-razonActivoF" class="col-md-4">	
				@endif

				<?php
				$valorBD="";
				?>

			@endforeach
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

	<!-- ######################## RATIOS DE ACTIVIDAD ############################-->
	<br>
	<u><h2>Razones de Actividad 2</h2></u>

	<div class="row">

	<div class="col-sm" id="rl">
		
		<h5>Razon de Rotacion de Inventario</h5>
		<label>Costo de ventas: </label>
		@foreach($esre1 as $r)
		<input  name="" id="id_numerador_costosVentas_razonInventario1" value="{{ $r -> costov }}">
        @endforeach
		<br>
		<label>Inventario Promedio: </label>
		@foreach($cuentas1 as $cu)

				<?php
				$arregloBD="{{$cu->nombre}}";
				$valorBD=$arregloBD;
				?>
				
				@if($valorBD == $valorCompCuentas3)
				<input type="text"  value="{{ $cu->valor }}" id="inventario-razonInventario1" class="col-md-4">	
				@endif

				<?php
				$valorBD="";
				?>

			@endforeach
		<div class="col-6 col-md-4">
			<label>Resultado = </label>
			<input type="text" id="inputTotal-razonInventario1" class="solo-numero">
		</div>

        
	</div>
<br>


	<div class="col-sm" id="r">
		
		<h5>Razon de dias de inventario</h5>
		<label>Inventrario promedio </label>
		@foreach($cuentas1 as $cu)

				<?php
				$arregloBD="{{$cu->nombre}}";
				$valorBD=$arregloBD;
				?>
				
				@if($valorBD == $valorCompCuentas3)
				<input type="text"  value="{{ $cu->valor }}" id="inventario-razonDiasInventario1" class="col-md-4">	
				@endif

				<?php
				$valorBD="";
				?>

			@endforeach
		<br>
		<label>Costo de ventas/365: </label>
		@foreach($esre1 as $r)
		<input  name="" id="id_numerador_costosVentas_razonDiasInventario1" value="{{ $r -> costov }}">
        @endforeach
		<br>
		<div class="col-6 col-md-4">
			<label>Resultado = </label>
			<input type="text" id="inputTotal-razonDiasInventario1" class="solo-numero">
		</div>


	</div>

	</div>
	<br>
	<div class="row">
		<div class="col-sm" id="r">
		
		<h5>Razon de rotacion de cuentas por cobrar</h5>
		<label>Ventas Netas: </label>
		@foreach($esre1 as $r)
		<input  name="" id="id_numerador_ventasNetas_razonCxC1" value="{{ $r -> eingreso }}">
        @endforeach
		<br>
		<label>Promedio de CxP comerciales: </label>
		@foreach($cuentas1 as $cu)

				<?php
				$arregloBD="{{$cu->nombre}}";
				$valorBD=$arregloBD;
				?>
				
				@if($valorBD == $valorCompCuentas5)
				<input type="text"  value="{{ $cu->valor }}" id="CxC-razonCxC1" class="col-md-4">	
				@endif

				<?php
				$valorBD="";
				?>

			@endforeach
		<br>
		<div class="col-6 col-md-4">
			<label>Resultado = </label>
			<input type="text" id="inputTotal-razonCxC1" class="solo-numero">
		</div>
	</div>
	
	<div class="col-sm" id="rl">
		
		<h5>Razon de medio de cobranza</h5>
		<label>Promedio de CxC comerciales * 365: </label>
		@foreach($cuentas1 as $cu)

				<?php
				$arregloBD="{{$cu->nombre}}";
				$valorBD=$arregloBD;
				?>
				
				@if($valorBD == $valorCompCuentas5)
				<input type="text"  value="{{ $cu->valor }}" id="CxC-razonMedioC1" class="col-md-4">	
				@endif

				<?php
				$valorBD="";
				?>

			@endforeach
		<br>
		<label>Ventas Netas: </label>
		@foreach($esre1 as $r)
		<input  name="" id="id_numerador_ventasNetas_razonMedioC1" value="{{ $r -> eingreso }}">
        @endforeach
		<br>
		<div class="col-6 col-md-4">
			<label>Resultado = </label>
			<input type="text" id="inputTotal-razonMedioC1" class="solo-numero">
		</div>
        
	</div>
	</div>

	<br>

	<div class="row">
		<div class="col-sm" id="r">
		
		<h5>Razon de rotacion de CxP</h5>
		<label>Compras: </label>
		@foreach($esre1 as $r)
		<input  name="" id="id_numerador_compras_razonCxP1" value="{{ $r -> egastoV }}">
        @endforeach
		<br>
		<label>Promedio de CxP comerciales: </label>
		@foreach($cuentas1 as $cu)

				<?php
				$arregloBD="{{$cu->nombre}}";
				$valorBD=$arregloBD;
				?>
				
				@if($valorBD == $valorCompCuentas12)
				<input type="text"  value="{{ $cu->valor }}" id="CxP-razonCxP1" class="col-md-4">	
				@endif

				<?php
				$valorBD="";
				?>

			@endforeach
		<br>
		<div class="col-6 col-md-4">
			<label>Resultado = </label>
			<input type="text" id="inputTotal-razonCxP1" class="solo-numero">
		</div>
	</div>
	
	<div class="col-sm" id="rl">
		
		<h5>Periodo de medio de pago</h5>
		<label>Promedio de CxP Comerciales*365: </label>
		@foreach($cuentas1 as $cu)

				<?php
				$arregloBD="{{$cu->nombre}}";
				$valorBD=$arregloBD;
				?>
				
				@if($valorBD == $valorCompCuentas12)
				<input type="text"  value="{{ $cu->valor }}" id="mCxP-razonCxP1" class="col-md-4">	
				@endif

				<?php
				$valorBD="";
				?>

			@endforeach
		<br>
		<label>Compras: </label>
		@foreach($esre1 as $r)
		<input  name="" id="id_numerador_compras_razonMedioP1" value="{{ $r -> egastoV }}">
        @endforeach
		<br>
		<div class="col-6 col-md-4">
			<label>Resultado = </label>
			<input type="text" id="inputTotal-razonMedioP1" class="solo-numero">
		</div>
        
	</div>
	</div>

	<br>


	<div class="row">
		<div class="col-sm" id="r">
		
		<h5>Indice de rotacion de activos totales</h5>
		<label>Ventas Netas: </label>
		@foreach($esre1 as $r)
		<input  name="" id="id_numerador_ventasNetas_razonIndiceA1" value="{{ $r -> eingreso }}">
        @endforeach
		<br>
		<label>Activo Total Promedio: </label>
		@foreach($cuentas1 as $cu)

				<?php
				$arregloBD="{{$cu->nombre}}";
				$valorBD=$arregloBD;
				?>
				
				@if($valorBD == $valorCompCuentas4)
				<input type="text"  value="{{ $cu->valor }}" id="activoTotal-razonIndiceA1" class="col-md-4">	
				@endif

				<?php
				$valorBD="";
				?>

			@endforeach
		<br>
		<div class="col-6 col-md-4">
			<label>Resultado = </label>
			<input type="text" id="inputTotal-razonIndiceA1" class="solo-numero">
		</div>
	</div>
	
	<div class="col-sm" id="rl">
		
		<h5>Indice de rotacion de activos fijos</h5>
		<label>Ventas Netas: </label>
		@foreach($esre1 as $r)
		<input  name="" id="id_numerador_ventasNetas_razonActivosF1" value="{{ $r -> eingreso }}">
        @endforeach
		<br>
		<label>Activo Fijo Neto Promedio: </label>
		@foreach($cuentas1 as $cu)

				<?php
				$arregloBD="{{$cu->nombre}}";
				$valorBD=$arregloBD;
				?>
				
				@if($valorBD == $valorCompCuentas13)
				<input type="text"  value="{{ $cu->valor }}" id="activoFijoNeto-razonActivoF1" class="col-md-4">	
				@endif

				<?php
				$valorBD="";
				?>

			@endforeach
		<br>
		<div class="col-6 col-md-4">
			<label>Resultado = </label>
			<input type="text" id="inputTotal-razonActivosF1" class="solo-numero">
		</div>
        
	</div>
	</div>

	<br>


	<div class="row">
		<div class="col-sm" id="r">
		
		<h5>Indice de Margen Bruto</h5>
		<label>Utilidad Bruta: </label>
		@foreach($cuentas1 as $cu)

				<?php
				$arregloBD="{{$cu->nombre}}";
				$valorBD=$arregloBD;
				?>
				
				@if($valorBD == $valorCompCuentas6)
				<input type="text"  value="{{ $cu->valor }}" id="utilidadB-razonMargenB1" class="col-md-4">	
				@endif

				<?php
				$valorBD="";
				?>

			@endforeach
		<br>
		<label>Ventas: </label>
		<select data-live-search="true" class="selectpicker col-md-8" name="" id="id_numerador_ventasNetas_razonMargenB1">
		  @foreach($ratios1 as $r)
            <option data-tokens="" data-precio="" value="">
            	{{ $r -> rnombre }} = {{ $r -> rcuentas }} , {{ $r -> inombre}}
            </option>
		  @endforeach
		  </select>
		  <input type="hidden" id="input_numerador_ventasNetas_razonMargenB1">
		<br>
		<div class="col-6 col-md-4">
			<label>Resultado = </label>
			<input type="text" id="inputTotal-razonMargenB1" class="solo-numero">
		</div>
	</div>
	
	<div class="col-sm" id="rl">
		
		<h5>Indice de Margen Operativo</h5>
		<label>Utilidad Operativa: </label>
		@foreach($cuentas1 as $cu)

				<?php
				$arregloBD="{{$cu->nombre}}";
				$valorBD=$arregloBD;
				?>
				
				@if($valorBD == $valorCompCuentas7)
				<input type="text"  value="{{ $cu->valor }}" id="utilidadO-razonMargenO1" class="col-md-4">	
				@endif

				<?php
				$valorBD="";
				?>

			@endforeach
		<br>
		<label>Ventas: </label>
		<select data-live-search="true" class="selectpicker col-md-8" name="" id="id_numerador_ventas_razonMargenO1">
		  @foreach($ratios1 as $r)
            <option data-tokens="" data-precio="" value="">
            	{{ $r -> rnombre }} = {{ $r -> rcuentas }} , {{ $r -> inombre}}
            </option>
		  @endforeach
		  </select>
		  <input type="hidden" id="input_numerador_ventas_razonMargenO1">
		<br>
		<div class="col-6 col-md-4">
			<label>Resultado = </label>
			<input type="text" id="inputTotal-razonMargenO1" class="solo-numero">
		</div>
        
	</div>
	</div>
	
	<div class="text-center" id="boton-razonActividad1">
		<input type="button" id="resultados-razonActividad1" value="Calcular" 
				onclick="razonInventario1();"
				onclick="razonDiasInventario1();"
				onclick="razonCxC1();"
				onclick="razonMedioC1();"
				onclick="razonCxP1();"
				onclick="razonMedioP1();"
				onclick="razonIndiceA1();"
				onclick="razonActivosF1();"
				onclick="razonMargenB1();"
				onclick="razonMargenO1();">
	</div>

	<br>

	<!-- ######################## RATIOS DE RENTABILIDAD ############################-->
	<u><h2>Razones de Rentabilidad</h2></u>

	<div class="row">

	<div class="col-sm" id="rl">
		
		<h5>Rentabilidad Neta del Patrimonio</h5>
		<label>Utilidad Neta: </label>
		@foreach($cuentas as $cu)

				<?php
				$arregloBD="{{$cu->nombre}}";
				$valorBD=$arregloBD;
				?>
				
				@if($valorBD == $valorCompCuentas8)
				<input type="text"  value="{{ $cu->valor }}" id="utilidadN-razonNetaP" class="col-md-4">	
				@endif

				<?php
				$valorBD="";
				?>

			@endforeach
		<br>
		<label>Patrimonio Promedio: </label>
		<select data-live-search="true" class="selectpicker col-md-8" name="" id="id_numerador_patrimonioP_razonNetaP">
		  @foreach($ratios as $r)
            <option data-tokens="" data-precio="" value="">
            	{{ $r -> rnombre }} = {{ $r -> rcuentas }} , {{ $r -> inombre}}
            </option>
		  @endforeach
		  </select>
		  <input type="hidden" id="input_numerador_patrimonioP_razonNetaP">
		<div class="col-6 col-md-4">
			<label>Resultado = </label>
			<input type="text" id="inputTotal-razonNetaPatr" class="solo-numero">
		</div>
        
	</div>
<br>
  

	<div class="col-sm" id="r">
		
		<h5>Rentabilidad por Acccion</h5>
		<label>Uilidad Neta: </label>
		@foreach($cuentas as $cu)

				<?php
				$arregloBD="{{$cu->nombre}}";
				$valorBD=$arregloBD;
				?>
				
				@if($valorBD == $valorCompCuentas8)
				<input type="text"  value="{{ $cu->valor }}" id="utilidadN-razonAccion" class="col-md-4">	
				@endif

				<?php
				$valorBD="";
				?>

			@endforeach
		<br>
		<label>Numero de acciones: </label>
		<input type="text" id="numeroAcciones" class="col-md-4">
		<br>
		<div class="col-6 col-md-4">
			<label>Resultado = </label>
			<input type="text" id="inputTotal-razonAccion" class="solo-numero">
		</div>


	</div>

	</div>
	<br>
	<div class="row">
		<div class="col-sm" id="r">
		
		<h5>Rentabilidad del Activo</h5>
		<label>Utilidad Neta: </label>
		@foreach($cuentas as $cu)

				<?php
				$arregloBD="{{$cu->nombre}}";
				$valorBD=$arregloBD;
				?>
				
				@if($valorBD == $valorCompCuentas8)
				<input type="text"  value="{{ $cu->valor }}" id="utilidadN-razonRentActivo" class="col-md-4">	
				@endif

				<?php
				$valorBD="";
				?>

			@endforeach
		<br>
		<label>Activo Total Promedio: </label>
		@foreach($cuentas as $cu)

				<?php
				$arregloBD="{{$cu->nombre}}";
				$valorBD=$arregloBD;
				?>
				
				@if($valorBD == $valorCompCuentas4)
				<input type="text"  value="{{ $cu->valor }}" id="activoTotal-razonRentActivo" class="col-md-4">	
				@endif

				<?php
				$valorBD="";
				?>

			@endforeach
		<br>
		<div class="col-6 col-md-4">
			<label>Resultado = </label>
			<input type="text" id="inputTotal-razonActivoTotal" class="solo-numero">
		</div>
	</div>
	
	<div class="col-sm" id="rl">
		
		<h5>Rentabilidad sobre Ventas</h5>
		<label>Utilidad Neta: </label>
		@foreach($cuentas as $cu)

				<?php
				$arregloBD="{{$cu->nombre}}";
				$valorBD=$arregloBD;
				?>
				
				@if($valorBD == $valorCompCuentas8)
				<input type="text"  value="{{ $cu->valor }}" id="utilidadN-razonRentVentas" class="col-md-4">	
				@endif

				<?php
				$valorBD="";
				?>

			@endforeach
		<br>
		<label>Ventas: </label>
		<select data-live-search="true" class="selectpicker col-md-8" name="" id="id_numerador_ventas_razonRentVentas">
		  @foreach($ratios as $r)
            <option data-tokens="" data-precio="" value="">
            	{{ $r -> rnombre }} = {{ $r -> rcuentas }} , {{ $r -> inombre}}
            </option>
		  @endforeach
		  </select>
		  <input type="hidden" id="input_numerador_ventas_razonRentVentas">
		<br>
		<div class="col-6 col-md-4">
			<label>Resultado = </label>
			<input type="text" id="inputTotal-razonRentVentas" class="solo-numero">
		</div>
        
	</div>
	</div>

	<br>


	<div class="col-sm" id="rl">
		
		<h5>Rentabilidad sobre Inversion</h5>
		<label>Ingresos: </label>
		<select data-live-search="true" class="selectpicker col-md-8" name="" id="id_numerador_ing_razonInversion">
		  @foreach($ratios as $r)
            <option data-tokens="" data-precio="" value="">
            	{{ $r -> rnombre }} = {{ $r -> rcuentas }} , {{ $r -> inombre}}
            </option>
		  @endforeach
		  </select>
		  <input type="hidden" id="input_numerador_ing_razonInversion">
		<br>
		<label>Inversion: </label>
		<select data-live-search="true" class="selectpicker col-md-8" name="" id="id_numerador_inv_razonInversion">
		  @foreach($ratios as $r)
            <option data-tokens="" data-precio="" value="">
            	{{ $r -> rnombre }} = {{ $r -> rcuentas }} , {{ $r -> inombre}}
            </option>
		  @endforeach
		  </select>
		  <input type="hidden" id="input_numerador_inv_razonInversion">
		<br>
		<div class="col-6 col-md-4">
			<label>Resultado = </label>
			<input type="text" id="inputTotal-razonInversion" class="solo-numero">
		</div>
        
	</div>

	<div class="text-center" id="boton-razonRentabilidad">
		<input type="button" id="resultados-razonRentabilidad" value="Calcular" 
				onclick="razonNetaPatr();"
				onclick="razonAccion();"
				onclick="razonActivoTotal();"
				onclick="razonRentVentas();"
				onclick="razonInversion();">
	</div>


	<br>

	<br>

	<!-- ######################## RATIOS DE RENTABILIDAD ############################-->
	<u><h2>Razones de Rentabilidad</h2></u>

	<div class="row">

	<div class="col-sm" id="rl">
		
		<h5>Rentabilidad Neta del Patrimonio</h5>
		<label>Utilidad Neta: </label>
		@foreach($cuentas1 as $cu)

				<?php
				$arregloBD="{{$cu->nombre}}";
				$valorBD=$arregloBD;
				?>
				
				@if($valorBD == $valorCompCuentas8)
				<input type="text"  value="{{ $cu->valor }}" id="utilidadN-razonNetaP1" class="col-md-4">	
				@endif

				<?php
				$valorBD="";
				?>

			@endforeach
		<br>
		<label>Patrimonio Promedio: </label>
		<select data-live-search="true" class="selectpicker col-md-8" name="" id="id_numerador_patrimonioP_razonNetaP1">
		  @foreach($ratios1 as $r)
            <option data-tokens="" data-precio="" value="">
            	{{ $r -> rnombre }} = {{ $r -> rcuentas }} , {{ $r -> inombre}}
            </option>
		  @endforeach
		  </select>
		  <input type="hidden" id="input_numerador_patrimonioP_razonNetaP1">
		<div class="col-6 col-md-4">
			<label>Resultado = </label>
			<input type="text" id="inputTotal-razonNetaPatr1" class="solo-numero">
		</div>
        
	</div>
<br>
  

	<div class="col-sm" id="r">
		
		<h5>Rentabilidad por Acccion</h5>
		<label>Uilidad Neta: </label>
		@foreach($cuentas1 as $cu)

				<?php
				$arregloBD="{{$cu->nombre}}";
				$valorBD=$arregloBD;
				?>
				
				@if($valorBD == $valorCompCuentas8)
				<input type="text"  value="{{ $cu->valor }}" id="utilidadN-razonAccion1" class="col-md-4">	
				@endif

				<?php
				$valorBD="";
				?>

			@endforeach
		<br>
		<label>Numero de acciones: </label>
		<input type="text" id="numeroAcciones1" class="col-md-4">
		<br>
		<div class="col-6 col-md-4">
			<label>Resultado = </label>
			<input type="text" id="inputTotal-razonAccion1" class="solo-numero">
		</div>


	</div>

	</div>
	<br>
	<div class="row">
		<div class="col-sm" id="r">
		
		<h5>Rentabilidad del Activo</h5>
		<label>Utilidad Neta: </label>
		@foreach($cuentas1 as $cu)

				<?php
				$arregloBD="{{$cu->nombre}}";
				$valorBD=$arregloBD;
				?>
				
				@if($valorBD == $valorCompCuentas8)
				<input type="text"  value="{{ $cu->valor }}" id="utilidadN-razonRentActivo1" class="col-md-4">	
				@endif

				<?php
				$valorBD="";
				?>

			@endforeach
		<br>
		<label>Activo Total Promedio: </label>
		@foreach($cuentas1 as $cu)

				<?php
				$arregloBD="{{$cu->nombre}}";
				$valorBD=$arregloBD;
				?>
				
				@if($valorBD == $valorCompCuentas4)
				<input type="text"  value="{{ $cu->valor }}" id="activoTotal-razonRentActivo1" class="col-md-4">	
				@endif

				<?php
				$valorBD="";
				?>

			@endforeach
		<br>
		<div class="col-6 col-md-4">
			<label>Resultado = </label>
			<input type="text" id="inputTotal-razonActivoTotal1" class="solo-numero">
		</div>
	</div>
	
	<div class="col-sm" id="rl">
		
		<h5>Rentabilidad sobre Ventas</h5>
		<label>Utilidad Neta: </label>
		@foreach($cuentas1 as $cu)

				<?php
				$arregloBD="{{$cu->nombre}}";
				$valorBD=$arregloBD;
				?>
				
				@if($valorBD == $valorCompCuentas8)
				<input type="text"  value="{{ $cu->valor }}" id="utilidadN-razonRentVentas1" class="col-md-4">	
				@endif

				<?php
				$valorBD="";
				?>

			@endforeach
		<br>
		<label>Ventas: </label>
		<select data-live-search="true" class="selectpicker col-md-8" name="" id="id_numerador_ventas_razonRentVentas1">
		  @foreach($ratios1 as $r)
            <option data-tokens="" data-precio="" value="">
            	{{ $r -> rnombre }} = {{ $r -> rcuentas }} , {{ $r -> inombre}}
            </option>
		  @endforeach
		  </select>
		  <input type="hidden" id="input_numerador_ventas_razonRentVentas1">
		<br>
		<div class="col-6 col-md-4">
			<label>Resultado = </label>
			<input type="text" id="inputTotal-razonRentVentas1" class="solo-numero">
		</div>
        
	</div>
	</div>

	<br>


	<div class="col-sm" id="rl">
		
		<h5>Rentabilidad sobre Inversion</h5>
		<label>Ingresos: </label>
		<select data-live-search="true" class="selectpicker col-md-8" name="" id="id_numerador_ing_razonInversion1">
		  @foreach($ratios1 as $r)
            <option data-tokens="" data-precio="" value="">
            	{{ $r -> rnombre }} = {{ $r -> rcuentas }} , {{ $r -> inombre}}
            </option>
		  @endforeach
		  </select>
		  <input type="hidden" id="input_numerador_ing_razonInversion1">
		<br>
		<label>Inversion: </label>
		<select data-live-search="true" class="selectpicker col-md-8" name="" id="id_numerador_inv_razonInversion1">
		  @foreach($ratios1 as $r)
            <option data-tokens="" data-precio="" value="">
            	{{ $r -> rnombre }} = {{ $r -> rcuentas }} , {{ $r -> inombre}}
            </option>
		  @endforeach
		  </select>
		  <input type="hidden" id="input_numerador_inv_razonInversion1">
		<br>
		<div class="col-6 col-md-4">
			<label>Resultado = </label>
			<input type="text" id="inputTotal-razonInversion1" class="solo-numero">
		</div>
        
	</div>

	<div class="text-center" id="boton-razonRentabilidad1">
		<input type="button" id="resultados-razonRentabilidad1" value="Calcular" 
				onclick="razonNetaPatr1();"
				onclick="razonAccion1();"
				onclick="razonActivoTotal1();"
				onclick="razonRentVentas1();"
				onclick="razonInversion1();">
	</div>


	<br>
	<!-- ######################## RATIOS DE ENDEUDAMIENTO ############################-->
	<u><h2>Razones de Endeudamiento</h2></u>

	<div class="row">

	<div class="col-sm" id="rl">
		
		<h5>Grado de Endeudamiento</h5>
		<label>Pasivo Total: </label>
		@foreach($cuentas as $cu)

				<?php
				$arregloBD="{{$cu->nombre}}";
				$valorBD=$arregloBD;
				?>
				
				@if($valorBD == $valorCompCuentas10)
				<input type="text"  value="{{ $cu->valor }}" id="pasivoTotal-razonEndeudo" class="col-md-4">	
				@endif

				<?php
				$valorBD="";
				?>

			@endforeach
		<br>
		<label>Activo Total: </label>
		@foreach($cuentas as $cu)

				<?php
				$arregloBD="{{$cu->nombre}}";
				$valorBD=$arregloBD;
				?>
				
				@if($valorBD == $valorCompCuentas4)
				<input type="text"  value="{{ $cu->valor }}" id="activoTotal-razonEndeudo" class="col-md-4">	
				@endif

				<?php
				$valorBD="";
				?>

			@endforeach
		<div class="col-6 col-md-4">
			<label>Resultado = </label>
			<input type="text" id="inputTotal-razonGradoEnd" class="solo-numero">
		</div>
        
	</div>
<br>



	<div class="col-sm" id="r">
		
		<h5>Grado de Propiedad</h5>
		<label>Patrimonio: </label>
		<select data-live-search="true" class="selectpicker col-md-8" name="" id="id_numerador_patrimonio_razonPropiedad">
		  @foreach($ratios as $r)
            <option data-tokens="" data-precio="" value="">
            	{{ $r -> rnombre }} = {{ $r -> rcuentas }} , {{ $r -> inombre}}
            </option>
		  @endforeach
		  </select>
		  <input type="hidden" id="input_numerador_patrimonio_razonPropiedad">
		<br>
		<label>Activo Total: </label>
		@foreach($cuentas as $cu)

				<?php
				$arregloBD="{{$cu->nombre}}";
				$valorBD=$arregloBD;
				?>
				
				@if($valorBD == $valorCompCuentas4)
				<input type="text"  value="{{ $cu->valor }}" id="activoTotal-razonPropiedad" class="col-md-4">	
				@endif

				<?php
				$valorBD="";
				?>

			@endforeach
		<br>
		<div class="col-6 col-md-4">
			<label>Resultado = </label>
			<input type="text" id="inputTotal-razonPropiedad" class="solo-numero">
		</div>


	</div>

	</div>
	<br>
	<div class="row">
		<div class="col-sm" id="r">
		
		<h5>Razon de Endeudamiento Patrimonial</h5>
		<label>Pasivo Total: </label>
		@foreach($cuentas as $cu)

				<?php
				$arregloBD="{{$cu->nombre}}";
				$valorBD=$arregloBD;
				?>
				
				@if($valorBD == $valorCompCuentas10)
				<input type="text"  value="{{ $cu->valor }}" id="pasivoTotal-razonEndeudoPatr" class="col-md-4">	
				@endif

				<?php
				$valorBD="";
				?>

			@endforeach
		<br>
		<label>Patrimonio Total: </label>
		<select data-live-search="true" class="selectpicker col-md-8" name="" id="id_numerador_patrimonioTotal_razonEndeudoPatr">
		  @foreach($ratios as $r)
            <option data-tokens="" data-precio="" value="">
            	{{ $r -> rnombre }} = {{ $r -> rcuentas }} , {{ $r -> inombre}}
            </option>
		  @endforeach
		  </select>
		  <input type="hidden" id="input_numerador_patrimonioTotal_razonEndeudoPatr">
		<br>
		<div class="col-6 col-md-4">
			<label>Resultado = </label>
			<input type="text" id="inputTotal-razonEndeudoPatr" class="solo-numero">
		</div>
	</div>
	
	<div class="col-sm" id="rl">
		
		<h5>Razon de cobertura de Gastos Financieros</h5>
		<label>Utilidades antes de interes e impuestos: </label>
		@foreach($cuentas as $cu)

				<?php
				$arregloBD="{{$cu->nombre}}";
				$valorBD=$arregloBD;
				?>
				
				@if($valorBD == $valorCompCuentas11)
				<input type="text"  value="{{ $cu->valor }}" id="cobertura-razonGastosF" class="col-md-4">	
				@endif

				<?php
				$valorBD="";
				?>

			@endforeach
		<br>
		<label>Gastos Financieros: </label>
		<select data-live-search="true" class="selectpicker col-md-8" name="" id="id_numerador_g_razonGastosF">
		  @foreach($ratios as $r)
            <option data-tokens="" data-precio="" value="">
            	{{ $r -> rnombre }} = {{ $r -> rcuentas }} , {{ $r -> inombre}}
            </option>
		  @endforeach
		  </select>
		  <input type="hidden" id="input_numerador_g_razonGastosF">
		<br>
		<div class="col-6 col-md-4">
			<label>Resultado = </label>
			<input type="text" id="inputTotal-razonGastosF" class="solo-numero">
		</div>
        
	</div>
	</div>

	<br>
<div class="text-center" id="boton-razonEndeudamiento">
		<input type="button" id="resultados-razonGradoEnd" value="Calcular" 
				onclick="razonGradoEnd();"
				onclick="razonPropiedad();"
				onclick="razonEndeudoPatr();"
				onclick="razonEndeudoGastosF();">
	</div>


<br>
	<!-- ######################## RATIOS DE ENDEUDAMIENTO ############################-->
	<u><h2>Razones de Endeudamiento</h2></u>

	<div class="row">

	<div class="col-sm" id="rl">
		
		<h5>Grado de Endeudamiento</h5>
		<label>Pasivo Total: </label>
		@foreach($cuentas1 as $cu)

				<?php
				$arregloBD="{{$cu->nombre}}";
				$valorBD=$arregloBD;
				?>
				
				@if($valorBD == $valorCompCuentas10)
				<input type="text"  value="{{ $cu->valor }}" id="pasivoTotal-razonEndeudo1" class="col-md-4">	
				@endif

				<?php
				$valorBD="";
				?>

			@endforeach
		<br>
		<label>Activo Total: </label>
		@foreach($cuentas1 as $cu)

				<?php
				$arregloBD="{{$cu->nombre}}";
				$valorBD=$arregloBD;
				?>
				
				@if($valorBD == $valorCompCuentas4)
				<input type="text"  value="{{ $cu->valor }}" id="activoTotal-razonEndeudo1" class="col-md-4">	
				@endif

				<?php
				$valorBD="";
				?>

			@endforeach
		<div class="col-6 col-md-4">
			<label>Resultado = </label>
			<input type="text" id="inputTotal-razonGradoEnd1" class="solo-numero">
		</div>
        
	</div>
<br>



	<div class="col-sm" id="r">
		
		<h5>Grado de Propiedad</h5>
		<label>Patrimonio: </label>
		<select data-live-search="true" class="selectpicker col-md-8" name="" id="id_numerador_patrimonio_razonPropiedad1">
		  @foreach($ratios1 as $r)
            <option data-tokens="" data-precio="" value="">
            	{{ $r -> rnombre }} = {{ $r -> rcuentas }} , {{ $r -> inombre}}
            </option>
		  @endforeach
		  </select>
		  <input type="hidden" id="input_numerador_patrimonio_razonPropiedad1">
		<br>
		<label>Activo Total: </label>
		@foreach($cuentas1 as $cu)

				<?php
				$arregloBD="{{$cu->nombre}}";
				$valorBD=$arregloBD;
				?>
				
				@if($valorBD == $valorCompCuentas4)
				<input type="text"  value="{{ $cu->valor }}" id="activoTotal-razonPropiedad1" class="col-md-4">	
				@endif

				<?php
				$valorBD="";
				?>

			@endforeach
		<br>
		<div class="col-6 col-md-4">
			<label>Resultado = </label>
			<input type="text" id="inputTotal-razonPropiedad1" class="solo-numero">
		</div>


	</div>

	</div>
	<br>
	<div class="row">
		<div class="col-sm" id="r">
		
		<h5>Razon de Endeudamiento Patrimonial</h5>
		<label>Pasivo Total: </label>
		@foreach($cuentas1 as $cu)

				<?php
				$arregloBD="{{$cu->nombre}}";
				$valorBD=$arregloBD;
				?>
				
				@if($valorBD == $valorCompCuentas10)
				<input type="text"  value="{{ $cu->valor }}" id="pasivoTotal-razonEndeudoPatr1" class="col-md-4">	
				@endif

				<?php
				$valorBD="";
				?>

			@endforeach
		<br>
		<label>Patrimonio Total: </label>
		<select data-live-search="true" class="selectpicker col-md-8" name="" id="id_numerador_patrimonioTotal_razonEndeudoPatr1">
		  @foreach($ratios1 as $r)
            <option data-tokens="" data-precio="" value="">
            	{{ $r -> rnombre }} = {{ $r -> rcuentas }} , {{ $r -> inombre}}
            </option>
		  @endforeach
		  </select>
		  <input type="hidden" id="input_numerador_patrimonioTotal_razonEndeudoPatr1">
		<br>
		<div class="col-6 col-md-4">
			<label>Resultado = </label>
			<input type="text" id="inputTotal-razonEndeudoPatr1" class="solo-numero">
		</div>
	</div>
	
	<div class="col-sm" id="rl">
		
		<h5>Razon de cobertura de Gastos Financieros</h5>
		<label>Utilidades antes de interes e impuestos: </label>
		@foreach($cuentas1 as $cu)

				<?php
				$arregloBD="{{$cu->nombre}}";
				$valorBD=$arregloBD;
				?>
				
				@if($valorBD == $valorCompCuentas11)
				<input type="text"  value="{{ $cu->valor }}" id="cobertura-razonGastosF1" class="col-md-4">	
				@endif

				<?php
				$valorBD="";
				?>

			@endforeach
		<br>
		<label>Gastos Financieros: </label>
		<select data-live-search="true" class="selectpicker col-md-8" name="" id="id_numerador_g_razonGastosF1">
		  @foreach($ratios1 as $r)
            <option data-tokens="" data-precio="" value="">
            	{{ $r -> rnombre }} = {{ $r -> rcuentas }} , {{ $r -> inombre}}
            </option>
		  @endforeach
		  </select>
		  <input type="hidden" id="input_numerador_g_razonGastosF1">
		<br>
		<div class="col-6 col-md-4">
			<label>Resultado = </label>
			<input type="text" id="inputTotal-razonGastosF1" class="solo-numero">
		</div>
        
	</div>
	</div>

	<br>
<div class="text-center" id="boton-razonEndeudamiento1">
		<input type="button" id="resultados-razonGradoEnd1" value="Calcular" 
				onclick="razonGradoEnd1();"
				onclick="razonPropiedad1();"
				onclick="razonEndeudoPatr1();"
				onclick="razonEndeudoGastosF1();">
	</div>


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