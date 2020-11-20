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
	$valorCompCuentasA="{ACTIVOS CORRIENTES}";
	//$valorCompCuentasB="ACTIVOS CORRIENTES";
	//$valorCompCuentas1B="ACTIVOS NO CORRIENTES";

	$valorCompCuentas2="{TOTAL PASIVOS CORRIENTES}";
	//$valorCompCuentas2A="{PASIVOS CORRIENTES}";
	$valorCompCuentas3="{Inventarios}";

	$valorCompCuentas4="{TOTAL ACTIVO}";
	$valorCompCuentas4A="{Total de los activos}";
	$valorCompCuentas4B="ACTIVO";

	$valorCompCuentas1A="TOTAL ACTIVOS CORRIENTES";
	$valorCompCuentas1AA="ACTIVOS CORRIENTES";
	$valorCompCuentas2A="TOTAL ACTIVOS NO CORRIENTES";
	$valorCompCuentas2AA="ACTIVOS NO CORRIENTES";

	$valorCompCuentas1B="TOTAL PASIVOS CORRIENTES";
	$valorCompCuentas1BB="PASIVOS CORRIENTES";
	$valorCompCuentas2B="TOTAL PASIVOS NO CORRIENTES";
	$valorCompCuentas2BB="PASIVOS NO CORRIENTES";

	$valorCompCuentas1C="ACTIVO";
	$valorCompCuentas2C="PASIVO";
	$valorCompCuentas3C="PATRIMONIO";


	
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



	$valorCompSubCuentas="{}";
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


<br>

	<h1 class="text-center">RATIOS</h1>
<!-- ######################## RATIOS DE LIQUIDEZ ############################-->
	<br>
	<u><h2>Razones de Liquidez</h2></u>

	<div class="row">

	<div class="col-sm" id="rl">
		
		<h5>Razon de liquidez corriente</h5>
		<label>Activo circulante: </label>
		
				<input type="text"  value="" id="activoCorriente-razonLiquidez" class="col-md-4">	
		
		<br>
		<label>Pasivo circulante: </label>
		
				<input type="text"  value="" id="pasivoCorriente-razonLiquidez" class="col-md-4">	
		
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
      			{{ $r-> gnombre }} - {{ $r->cnombre }} - Cuenta: {{ $r -> rnombre }} = {{ $r -> rcuentas }}
            </option>
		  @endforeach
		  </select>
		<br>
		<label>Valores de corto plazo: </label>
		<select data-live-search="true" class="selectpicker col-md-8" name="" id="id_numerador_valorCortoPlazo">
		  @foreach($ratios2 as $r)
            <option data-tokens="" data-precio="" value="">
            	{{ $r-> gnombre }} - {{ $r->cnombre }} - Cuenta: {{ $r -> rnombre }} = {{ $r -> rcuentas }}
            </option>
		  @endforeach
		  </select>
		<br>
		<label>Pasivo corriente: </label>
			
				<input type="text"  value="" id="pasivoCorriente-razonEfectivo" class="col-md-4">	
			
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
		
				<input type="text"  value="" id="activoCorriente-razonRapida" class="col-md-4">	
				
		<br>
		<label>Inventario: </label>
		@foreach($cuentas as $cu)

				<?php
				$arregloBD="{{$cu->nombre}}";
				$valorBD=$arregloBD;
				?>
				
				@if($valorBD == $valorCompCuentas3)
				<input type="text"  value="{{ $cu->valor}}" id="inventario-razonRapida" class="col-md-4">	
				@endif

				<?php
				$valorBD="";
				?>

			@endforeach
		<br>
		<label>Pasivo corriente: </label>
		
				<input type="text"  value="" id="pasivoCorriente-razonRapida" class="col-md-4">	
				
		<div class="col-6 col-md-4">
			<label>Resultado = </label>
			<input type="text" id="inputTotal-razonRapida" class="solo-numero">
		</div>
	</div>
	
	<div class="col-sm" id="rl">
		
		<h5>Razon de capital</h5>
		<label>Activo corriente: </label>
		
				<input type="text"  value="" id="activoCorriente-razonCapital" class="col-md-4">	
				
		<br>
		<label>Pasivo circulante: </label>
		
				<input type="text"  value="" id="pasivoCorriente-razonCapital" class="col-md-4">	
				
		<br>
		<label>Activo totales: </label>
		
				<input type="text"  value="" id="activoTotal-razonCapital" class="col-md-4">
		<div class="col-6 col-md-4">
			<label>Resultado = </label>
			<input type="text" id="inputTotal-razonCapital" class="solo-numero">
		</div>
        
	</div>
	</div>
	<br>
	<br>
	<div class="text-center" id="boton-razonLiquidez">
		<input class="btn btn-primary" type="button" id="resultados-razonLiquidez" value="Calcular" 
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
		
				<input type="text"  value="" id="activoCorriente-razonLiquidez1" class="col-md-4">	
				
		<br>
		<label>Pasivo circulante: </label>
		
				<input type="text"  value="" id="pasivoCorriente-razonLiquidez1" class="col-md-4">	
				
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
            	{{ $r-> gnombre }} - {{ $r->cnombre }} - Cuenta: {{ $r -> rnombre }} = {{ $r -> rcuentas }}
            </option>
		  @endforeach
		  </select>
		<br>
		<label>Valores de corto plazo: </label>
		<select data-live-search="true" class="selectpicker col-md-8" name="" id="id_numerador_valorCortoPlazo1">
		  @foreach($ratios3 as $r)
            <option data-tokens="" data-precio="" value="">
            	{{ $r-> gnombre }} - {{ $r->cnombre }} - Cuenta: {{ $r -> rnombre }} = {{ $r -> rcuentas }}
            </option>
		  @endforeach
		  </select>
		<br>
		<label>Pasivo corriente: </label>
			
				<input type="text"  value="" id="pasivoCorriente-razonEfectivo1" class="col-md-4">	
			
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
		
				<input type="text"  value="" id="activoCorriente-razonRapida1" class="col-md-4">	
				
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
		
				<input type="text"  value="" id="pasivoCorriente-razonRapida1" class="col-md-4">	
				
		<div class="col-6 col-md-4">
			<label>Resultado = </label>
			<input type="text" id="inputTotal-razonRapida1" class="solo-numero">
		</div>
	</div>
	
	<div class="col-sm" id="rl">
		
		<h5>Razon de capital</h5>
		<label>Activo corriente: </label>
		
				<input type="text"  value="" id="activoCorriente-razonCapital1" class="col-md-4">	
				
		<br>
		<label>Pasivo circulante: </label>
		
				<input type="text"  value="" id="pasivoCorriente-razonCapital1" class="col-md-4">	
				
		<br>
		<label>Activo totales: </label>
		
				<input type="text"  value="" id="activoTotal-razonCapital1" class="col-md-4">	
				
		<div class="col-6 col-md-4">
			<label>Resultado = </label>
			<input type="text" id="inputTotal-razonCapital1" class="solo-numero">
		</div>
        
	</div>
	</div>
	<br>
	<br>
	<div class="text-center" id="boton-razonLiquidez1">
		<input class="btn btn-primary" type="button" id="resultados-razonLiquidez1" value="Calcular" 
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
		
				<input type="text"  value="" id="activoTotal-razonIndiceA" class="col-md-4">	
				
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
				<input type="text"  value="" id="activoFijoNeto-razonActivoF" class="col-md-4">	
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
	@foreach($esre as $r)
		<?php
		$co = "{$r->costov}";
		$in = "{$r->eingreso}";
		$t = $in - $co;
		?>
				<input type="text"  value="{{ $t }}" id="utilidadB-razonMargenB" class="col-md-4">	
        @endforeach
		<br>
		<label>Ventas: </label>
		@foreach($esre as $r)
		<input  name="" id="id_numerador_ventasNetas_razonMargenB" value="{{ $r -> costov }}">
        @endforeach
		<br>
		<div class="col-6 col-md-4">
			<label>Resultado = </label>
			<input type="text" id="inputTotal-razonMargenB" class="solo-numero">
		</div>
	</div>
	
	<div class="col-sm" id="rl">
		
		<h5>Indice de Margen Operativo</h5>
		<label>Utilidad Operativa: </label>
		@foreach($esre as $r)
		<?php
		$co = "{$r->costov}";
		$in = "{$r->eingreso}";
		$t = $in - $co;
		$gas = "{$r->egastoO}";
		$t = $t - $gas;
		?>
				<input type="text"  value="{{ $t }}" id="utilidadO-razonMargenO" class="col-md-4">	
        @endforeach
		<br>
		<label>Ventas: </label>
		@foreach($esre as $r)
		<input  name="" id="id_numerador_ventas_razonMargenO" value="{{ $r -> costov }}">
        @endforeach
		<br>
		<div class="col-6 col-md-4">
			<label>Resultado = </label>
			<input type="text" id="inputTotal-razonMargenO" class="solo-numero">
		</div>
        
	</div>
	</div>
	
	<div class="text-center" id="boton-razonActividad">
		<br>
		<br>
		<input class="btn btn-primary" type="button" id="resultados-razonActividad" value="Calcular" 
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
		
				<input type="text"  value="" id="activoTotal-razonIndiceA1" class="col-md-4">	
		
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
				<input type="text"  value="" id="activoFijoNeto-razonActivoF1" class="col-md-4">	
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
		@foreach($esre1 as $r)
		<?php
		$co = "{$r->costov}";
		$in = "{$r->eingreso}";
		$t = $in - $co;
		?>
				<input type="text"  value="{{ $t }}" id="utilidadB-razonMargenB1" class="col-md-4">	
        @endforeach
		<br>
		<label>Ventas: </label>
		@foreach($esre1 as $r)
		<input  name="" id="id_numerador_ventasNetas_razonMargenB1" value="{{ $r -> costov }}">
        @endforeach
		<br>
		<div class="col-6 col-md-4">
			<label>Resultado = </label>
			<input type="text" id="inputTotal-razonMargenB1" class="solo-numero">
		</div>
	</div>
	
	<div class="col-sm" id="rl">
		
		<h5>Indice de Margen Operativo</h5>
		<label>Utilidad Operativa: </label>
		@foreach($esre1 as $r)
		<?php
		$co = "{$r->costov}";
		$in = "{$r->eingreso}";
		$t = $in - $co;
		$gas = "{$r->egastoO}";
		$t = $t - $gas;
		?>
				<input type="text"  value="{{ $t }}" id="utilidadO-razonMargenO1" class="col-md-4">	
        @endforeach
		<br>
		<label>Ventas: </label>
		@foreach($esre1 as $r)
		<input  name="" id="id_numerador_ventas_razonMargenO1" value="{{ $r -> costov }}">
        @endforeach
		<br>
		<div class="col-6 col-md-4">
			<label>Resultado = </label>
			<input type="text" id="inputTotal-razonMargenO1" class="solo-numero">
		</div>
        
	</div>
	</div>
	
	<div class="text-center" id="boton-razonActividad1">
		<br>
		<br>
		<input class="btn btn-primary" type="button" id="resultados-razonActividad1" value="Calcular" 
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
		@foreach($esre as $r)
		<?php
		$co = "{$r->costov}";
		$in = "{$r->eingreso}";
		$t = $in - $co;
		$gas = "{$r->egastoO}";
		$t = $t - $gas;
		$otrosIngresos ="{$r->eotrosI}";
		$t = $t + $otrosIngresos; 
		$impu = "{$r->eimpuesto}";
		$res = "{$r->ereserva}";
		$t = $t - $impu - $res;
		?>
				<input type="text"  value="{{ $t }}" id="utilidadN-razonNetaP" class="col-md-4">	
        @endforeach
		<br>
		<label>Patrimonio Promedio: </label>
		  <input type="text" id="input_numerador_patrimonioP_razonNetaP">
		<div class="col-6 col-md-4">
			<label>Resultado = </label>
			<input type="text" id="inputTotal-razonNetaPatr" class="solo-numero">
		</div>
        
	</div>
<br>
  

	<div class="col-sm" id="r">
		
		<h5>Rentabilidad por Acccion</h5>
		<label>Uilidad Neta: </label>
		@foreach($esre as $r)
		<?php
		$co = "{$r->costov}";
		$in = "{$r->eingreso}";
		$t = $in - $co;
		$gas = "{$r->egastoO}";
		$t = $t - $gas;
		$otrosIngresos ="{$r->eotrosI}";
		$t = $t + $otrosIngresos; 
		$impu = "{$r->eimpuesto}";
		$res = "{$r->ereserva}";
		$t = $t - $impu - $res;
		?>
				<input type="text"  value="{{ $t }}" id="utilidadN-razonAccion" class="col-md-4">	
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
		@foreach($esre as $r)
		<?php
		$co = "{$r->costov}";
		$in = "{$r->eingreso}";
		$t = $in - $co;
		$gas = "{$r->egastoO}";
		$t = $t - $gas;
		$otrosIngresos ="{$r->eotrosI}";
		$t = $t + $otrosIngresos; 
		$impu = "{$r->eimpuesto}";
		$res = "{$r->ereserva}";
		$t = $t - $impu - $res;
		?>
				<input type="text"  value="{{ $t }}" id="utilidadN-razonRentActivo" class="col-md-4">	
        @endforeach
		<br>
		<label>Activo Total Promedio: </label>
		
				<input type="text"  value="" id="activoTotal-razonRentActivo" class="col-md-4">	
		
		<br>
		<div class="col-6 col-md-4">
			<label>Resultado = </label>
			<input type="text" id="inputTotal-razonActivoTotal" class="solo-numero">
		</div>
	</div>
	
	<div class="col-sm" id="rl">
		
		<h5>Rentabilidad sobre Ventas</h5>
		<label>Utilidad Neta: </label>
		@foreach($esre as $r)
		<?php
		$co = "{$r->costov}";
		$in = "{$r->eingreso}";
		$t = $in - $co;
		$gas = "{$r->egastoO}";
		$t = $t - $gas;
		$otrosIngresos ="{$r->eotrosI}";
		$t = $t + $otrosIngresos; 
		$impu = "{$r->eimpuesto}";
		$res = "{$r->ereserva}";
		$t = $t - $impu - $res; 
		?>
				<input type="text"  value="{{ $t }}" id="utilidadN-razonRentVentas" class="col-md-4">	
        @endforeach
				
		<br>
		<label>Ventas: </label>
		@foreach($esre as $r)
		<input  name="" id="id_numerador_ventas_razonRentVentas" value="{{ $r -> costov }}">
        @endforeach
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
		@foreach($esre as $r)
		<input  name="" id="id_numerador_ing_razonInversion" value="{{ $r -> eingreso }}">
        @endforeach
		<br>
		<label>Inversion: </label>
		<select data-live-search="true" class="selectpicker col-md-8" name="" id="id_numerador_inv_razonInversion">
		  @foreach($ratios as $r)
            <option data-tokens="" data-precio="" value="">
            	{{ $r-> gnombre }} - {{ $r->cnombre }} - Cuenta: {{ $r -> rnombre }} = {{ $r -> rcuentas }}
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
		<br>
		<br>
		<input class="btn btn-primary" type="button" id="resultados-razonRentabilidad" value="Calcular" 
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
		@foreach($esre1 as $r)
		<?php
		$co = "{$r->costov}";
		$in = "{$r->eingreso}";
		$t = $in - $co;
		$gas = "{$r->egastoO}";
		$t = $t - $gas;
		$otrosIngresos ="{$r->eotrosI}";
		$t = $t + $otrosIngresos; 
		$impu = "{$r->eimpuesto}";
		$res = "{$r->ereserva}";
		$t = $t - $impu - $res;
		?>
				<input type="text"  value="{{ $t }}" id="utilidadN-razonNetaP1" class="col-md-4">	
        @endforeach
		<br>
		<label>Patrimonio Promedio: </label>
		  <input type="text" id="input_numerador_patrimonioP_razonNetaP1">
		<div class="col-6 col-md-4">
			<label>Resultado = </label>
			<input type="text" id="inputTotal-razonNetaPatr1" class="solo-numero">
		</div>
        
	</div>
<br>
  

	<div class="col-sm" id="r">
		
		<h5>Rentabilidad por Acccion</h5>
		<label>Uilidad Neta: </label>
		@foreach($esre1 as $r)
		<?php
		$co = "{$r->costov}";
		$in = "{$r->eingreso}";
		$t = $in - $co;
		$gas = "{$r->egastoO}";
		$t = $t - $gas;
		$otrosIngresos ="{$r->eotrosI}";
		$t = $t + $otrosIngresos; 
		$impu = "{$r->eimpuesto}";
		$res = "{$r->ereserva}";
		$t = $t - $impu - $res;
		?>
				<input type="text"  value="{{ $t }}" id="utilidadN-razonAccion1" class="col-md-4">	
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
		@foreach($esre1 as $r)
		<?php
		$co = "{$r->costov}";
		$in = "{$r->eingreso}";
		$t = $in - $co;
		$gas = "{$r->egastoO}";
		$t = $t - $gas;
		$otrosIngresos ="{$r->eotrosI}";
		$t = $t + $otrosIngresos; 
		$impu = "{$r->eimpuesto}";
		$res = "{$r->ereserva}";
		$t = $t - $impu - $res;
		?>
				<input type="text"  value="{{ $t }}" id="utilidadN-razonRentActivo1" class="col-md-4">	
        @endforeach
		<br>
		<label>Activo Total Promedio: </label>
		
				<input type="text"  value="" id="activoTotal-razonRentActivo1" class="col-md-4">	
		
		<br>
		<div class="col-6 col-md-4">
			<label>Resultado = </label>
			<input type="text" id="inputTotal-razonActivoTotal1" class="solo-numero">
		</div>
	</div>
	
	<div class="col-sm" id="rl">
		
		<h5>Rentabilidad sobre Ventas</h5>
		<label>Utilidad Neta: </label>
		@foreach($esre1 as $r)
		<?php
		$co = "{$r->costov}";
		$in = "{$r->eingreso}";
		$t = $in - $co;
		$gas = "{$r->egastoO}";
		$t = $t - $gas;
		$otrosIngresos ="{$r->eotrosI}";
		$t = $t + $otrosIngresos; 
		$impu = "{$r->eimpuesto}";
		$res = "{$r->ereserva}";
		$t = $t - $impu - $res;
		?>
				<input type="text"  value="{{ $t }}" id="utilidadN-razonRentVentas1" class="col-md-4">	
				@endforeach
		<br>
		<label>Ventas: </label>
		@foreach($esre1 as $r)
		<input  name="" id="id_numerador_ventas_razonRentVentas1" value="{{ $r -> costov }}">
        @endforeach
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
		@foreach($esre1 as $r)
		<input  name="" id="id_numerador_ing_razonInversion1" value="{{ $r -> eingreso }}">
        @endforeach
		<br>
		<label>Inversion: </label>
		<select data-live-search="true" class="selectpicker col-md-8" name="" id="id_numerador_inv_razonInversion1">
		  @foreach($ratios1 as $r)
            <option data-tokens="" data-precio="" value="">
            	{{ $r-> gnombre }} - {{ $r->cnombre }} - Cuenta: {{ $r -> rnombre }} = {{ $r -> rcuentas }}
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
		<br>
		<br>
		<input class="btn btn-primary" type="button" id="resultados-razonRentabilidad1" value="Calcular" 
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
		
				<input type="text"  value="" id="pasivoTotal-razonEndeudo" class="col-md-4">	
		
		<br>
		<label>Activo Total: </label>
				<input type="text"  value="" id="activoTotal-razonEndeudo" class="col-md-4">
		<div class="col-6 col-md-4">
			<label>Resultado = </label>
			<input type="text" id="inputTotal-razonGradoEnd" class="solo-numero">
		</div>
        
	</div>
<br>



	<div class="col-sm" id="r">
		
		<h5>Grado de Propiedad</h5>
		<label>Patrimonio: </label>
		  <input type="text" id="input_numerador_patrimonio_razonPropiedad">
		<br>
		<label>Activo Total: </label>
				<input type="text"  value="" id="activoTotal-razonPropiedad" class="col-md-4">	
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
				<input type="text"  value="" id="pasivoTotal-razonEndeudoPatr" class="col-md-4">	
		<br>
		<label>Patrimonio Total: </label>
		  <input type="hidden" id="input_pasivoTotal_razonEndeudoPatr">
		  <input type="hidden" id="input_patrimonio_razonEndeudoPatr">
		  <input type="text" id="input_numerador_patrimonioTotal_razonEndeudoPatr">
		<br>
		<div class="col-6 col-md-4">
			<label>Resultado = </label>
			<input type="text" id="inputTotal-razonEndeudoPatr" class="solo-numero">
		</div>
	</div>
	
	<div class="col-sm" id="rl">
		
		<h5>Razon de cobertura de Gastos Financieros</h5>
		<label>Utilidades antes de interes e impuestos: </label>
		@foreach($esre as $r)
		<?php
		$co = "{$r->costov}";
		$in = "{$r->eingreso}";
		$t = $in - $co;
		$gas = "{$r->egastoO}";
		$t = $t - $gas;
		$otrosIngresos ="{$r->eotrosI}";
		$t = $t + $otrosIngresos; 
		?>
				<input type="text"  value="{{ $t }}" id="cobertura-razonGastosF" class="col-md-4">	
        @endforeach
		<br>
		<label>Gastos Financieros: </label>
		@foreach($esre as $r)
		<input  name="" id="id_numerador_g_razonGastosF" value="{{ $r -> egastoF }}">
        @endforeach
		<br>
		<div class="col-6 col-md-4">
			<label>Resultado = </label>
			<input type="text" id="inputTotal-razonGastosF" class="solo-numero">
		</div>
        
	</div>
	</div>

	<br>
<div class="text-center" id="boton-razonEndeudamiento">
	<br>
	<br>
		<input class="btn btn-primary" type="button" id="resultados-razonGradoEnd" value="Calcular" 
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
				<input type="text"  value="" id="pasivoTotal-razonEndeudo1" class="col-md-4">	
		<br>
		<label>Activo Total: </label>
				<input type="text"  value="" id="activoTotal-razonEndeudo1" class="col-md-4">	
		<div class="col-6 col-md-4">
			<label>Resultado = </label>
			<input type="text" id="inputTotal-razonGradoEnd1" class="solo-numero">
		</div>
        
	</div>
<br>



	<div class="col-sm" id="r">
		
		<h5>Grado de Propiedad</h5>
		<label>Patrimonio: </label>
		  <input type="text" id="input_numerador_patrimonio_razonPropiedad1">
		<br>
		<label>Activo Total: </label>
				<input type="text"  value="" id="activoTotal-razonPropiedad1" class="col-md-4">	
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
				<input type="text"  value="" id="pasivoTotal-razonEndeudoPatr1" class="col-md-4">	
		<br>
		<label>Patrimonio Total: </label>
		  <input type="hidden" id="input_pasivoTotal_razonEndeudoPatr1">
		  <input type="hidden" id="input_patrimonio_razonEndeudoPatr1">
		  <input type="text" id="input_numerador_patrimonioTotal_razonEndeudoPatr1">
		<br>
		<div class="col-6 col-md-4">
			<label>Resultado = </label>
			<input type="text" id="inputTotal-razonEndeudoPatr1" class="solo-numero">
		</div>
	</div>
	
	<div class="col-sm" id="rl">
		
		<h5>Razon de cobertura de Gastos Financieros</h5>
		<label>Utilidades antes de interes e impuestos: </label>
		@foreach($esre1 as $r)
		<?php
		$co = "{$r->costov}";
		$in = "{$r->eingreso}";
		$t = $in - $co;
		$gas = "{$r->egastoO}";
		$t = $t - $gas;
		$otrosIngresos ="{$r->eotrosI}";
		$t = $t + $otrosIngresos; 
		?>
				<input type="text"  value="{{ $t }}" id="cobertura-razonGastosF1" class="col-md-4">	
        @endforeach
		<br>
		<label>Gastos Financieros: </label>
		@foreach($esre1 as $r)
		<input  name="" id="id_numerador_g_razonGastosF1" value="{{ $r -> egastoF }}">
        @endforeach
		<br>
		<div class="col-6 col-md-4">
			<label>Resultado = </label>
			<input type="text" id="inputTotal-razonGastosF1" class="solo-numero">
		</div>
        
	</div>
	</div>

	<br>
<div class="text-center" id="boton-razonEndeudamiento1">
	<br>
	<br>
		<input class="btn btn-primary" type="button" id="resultados-razonGradoEnd1" value="Calcular" 
				onclick="razonGradoEnd1();"
				onclick="razonPropiedad1();"
				onclick="razonEndeudoPatr1();"
				onclick="razonEndeudoGastosF1();">
	</div>


</div>

	@foreach($empresas as $em)
			<?php
				$emID="{$em->id}";
			?>
			
				<?php //--------------- INICIO AÑO 1 ---------------------- ?>
				<?php
				$inID=$bg1;
				//$emFK=1;
				$array=[];
				$arrayb=[];				
				?>	

				@foreach($infin as $if)
					<?php $ifPK="{$if->id}" ?>
					@if($ifPK==$bg1)
					<?php $emFK="{$if->empresas_id}" ?>
					@endif
				@endforeach

				

				@if($emFK==$emID)
					<!--<h1>EMPRESA: {{$em->nombre}} - SECTOR: {{$em->sector}}</h1>-->
					
					@foreach($infin as $infss)

						<?php $r="{$infss->id}"; $idBalance=$bg1; ?>
						
						@if($r==$idBalance)
						
							<!--<h2>BALANCE GENERAL: {{$infss->nombre}} - AÑO: {{$infss->anio}}</h2>-->
							@foreach($grupos as $gr)
								<?php
								$grID="{$gr->id}";
								$inFK="{$gr->informefinancieros_id}";
								
								?>						
								@if($inFK==$inID)
									<!--<h3>-GRUPO: {{$gr->nombre}}</h3>-->
									<?php
									$a=0;
									$b=0;
									?>
									@foreach($clases as $cl)
										<?php
										$clID="{$cl->id}";
										$grFK="{$cl->grupos_id}";
										
										?>
										@if($grFK==$grID)
											<!--<h4>--CLASE: {{$cl->nombre}}</h4>-->
											@foreach($cuentas as $cu)
												<?php
												$cuID="{$cu->id}";
												$clFK="{$cu->clases_id}";
												?>											
												@if($clFK==$clID)
													<!--<h5>----CUENTA: {{$cu->nombre}} --- VALOR: {{$cu->valor}}<h5>-->
														<?php
													
													$c="{$cu->valor}";
													$a=$a+$c;
													$b=$b+$c;
													
												?>
													@foreach($subcuentas as $sc)
														<?php
														$cuFK="{$sc->cuentas_id}";
														?>
														@if($cuFK==$cuID)
															<!--<h6>--------SUB CUENTA: {{$sc->nombre}} --- VALOR: {{$sc->valor}}</h6>-->
															<?php
															$d="{$sc->valor}";
															$a=$a+$d;
															$b=$b+$d;
														?>
														@endif
													@endforeach

												@endif
											@endforeach
											<!--<h4>--TOTAL CLASE: {{$cl->nombre}}  - VALOR= {{$b}}</h4>-->
											<!--<h2>{{ $cl->nombre }} == {{ $valorCompCuentas1AA }}</h2>-->
											@if( $cl->nombre == $valorCompCuentas1AA )
												<input type="hidden" id="activosCorrientes" value="{{$b}}">
											@endif
											@if( $cl->nombre == $valorCompCuentas2A || $cl->nombre == $valorCompCuentas2AA)
												<input type="hidden" id="activosCorrientesNo" value="{{$b}}">
											@endif
											<!--<h2>{{ $cl->nombre }} == {{ $valorCompCuentas1BB }}</h2>-->
											@if( $cl->nombre == $valorCompCuentas1B || $cl->nombre == $valorCompCuentas1BB)
												<input type="hidden" id="pasivosCorrientes" value="{{$b}}">
											@endif
											@if( $cl->nombre == $valorCompCuentas2B || $cl->nombre == $valorCompCuentas2BB)
												<input type="hidden" id="pasivosCorrientesNo" value="{{$b}}">
											@endif
										<?php
											$b=0;
										?>
										@endif
									@endforeach
									<!--<h3>-TOTAL GRUPO: {{$gr->nombre}} - VALOR= {{$a}}</h3>--> <br>
									<!--<h2>{{ $gr->nombre }} {{ $valorCompCuentas1C }}</h2>-->
											@if( $gr->nombre == $valorCompCuentas1C  )
												<input type="hidden" id="totalActivos" value="{{$a}}">
											@endif
									<!--<h2>{{ $gr->nombre }} {{ $valorCompCuentas2C }}</h2>-->
											@if( $gr->nombre == $valorCompCuentas2C )
												<input type="hidden" id="totalPasivos" value="{{$a}}">
											@endif
									<!--<h2>{{ $gr->nombre }} {{ $valorCompCuentas3C }}</h2>-->
											@if( $gr->nombre == $valorCompCuentas3C )
												<input type="hidden" id="totalPatrimonio" value="{{$a}}">
											@endif
								<?php
									$a=0;
								?>
									
									
								@endif
							@endforeach
						@endif
					@endforeach
				@endif

				<?php //--------------- FIN AÑO 1 ---------------------- ?>

				<?php //--------------- INICIO AÑO 2 ---------------------- ?>
				<?php
				$inID=$bg2;
				//$emFK=1;
				$arrayd=[];
				$arraye=[];
				
				?>		


				@foreach($infin as $if)
					<?php $ifPK="{$if->id}" ?>
					@if($ifPK==$bg2)
					<?php $emFK="{$if->empresas_id}" ?>
					@endif
				@endforeach	

				



				@if($emFK==$emID)
					<!--<h1>EMPRESA: {{$em->nombre}} - SECTOR: {{$em->sector}}</h1>-->
					@foreach($infin as $infss)

						<?php $r="{$infss->id}"; $idBalance=$bg2; ?>
						
						@if($r==$idBalance)

							<!--<h2>BALANCE GENERAL: {{$infss->nombre}} - AÑO: {{$infss->anio}}</h2>			-->		
							@foreach($grupos as $gr)
								<?php
								$grID="{$gr->id}";
								$inFK="{$gr->informefinancieros_id}";
								
								?>						
								@if($inFK==$inID)
									<!--<h3>-GRUPO: {{$gr->nombre}}</h3>-->
									<?php
									$a=0;
									$b=0;
									?>
									@foreach($clases as $cl)
										<?php
										$clID="{$cl->id}";
										$grFK="{$cl->grupos_id}";
										
										?>
										@if($grFK==$grID)
											<!--<h4>--CLASE: {{$cl->nombre}}</h4>-->
											@foreach($cuentasss1 as $cu)
												<?php
												$cuID="{$cu->id}";
												$clFK="{$cu->clases_id}";
												?>											
												@if($clFK==$clID)
												<!--	<h5>----CUENTA: {{$cu->nombre}} --- VALOR: {{$cu->valor}}<h5>-->
														<?php
													
													$c="{$cu->valor}";
													$a=$a+$c;
													$b=$b+$c;
													
												?>
														
													@foreach($subcuentas as $sc)
														<?php
														$cuFK="{$sc->cuentas_id}";
														
														?>
														@if($cuFK==$cuID)
															<!--<h6>--------SUB CUENTA: {{$sc->nombre}} --- VALOR: {{$sc->valor}}</h6>-->
															<?php
															$d="{$sc->valor}";
															$a=$a+$d;
															$b=$b+$d;
														?>
														@endif
													@endforeach

												@endif
											@endforeach
											<!--<h4>--TOTAL CLASE: {{$cl->nombre}}  - VALOR= {{$b}}</h4>-->

											<!--<h2>{{ $cl->nombre }} == {{ $valorCompCuentas1AA }}</h2>-->
											@if( $cl->nombre == $valorCompCuentas1AA )
												<input type="hidden" id="activosCorrientes1" value="{{$b}}">
											@endif
											@if( $cl->nombre == $valorCompCuentas2A || $cl->nombre == $valorCompCuentas2AA)
												<input type="hidden" id="activosCorrientesNo1" value="{{$b}}">
											@endif
											<!--<h2>{{ $cl->nombre }} == {{ $valorCompCuentas1BB }}</h2>-->
											@if( $cl->nombre == $valorCompCuentas1B || $cl->nombre == $valorCompCuentas1BB)
												<input type="hidden" id="pasivosCorrientes1" value="{{$b}}">
											@endif
											@if( $cl->nombre == $valorCompCuentas2B || $cl->nombre == $valorCompCuentas2BB)
												<input type="hidden" id="pasivosCorrientesNo1" value="{{$b}}">
											@endif
										<?php
											$b=0;
										?>
										@endif
									@endforeach
									<!--<h3>-TOTAL GRUPO: {{$gr->nombre}} - VALOR= {{$a}}</h3>--> <br>

									<!--<h2>{{ $gr->nombre }} {{ $valorCompCuentas1C }}</h2>-->
											@if( $gr->nombre == $valorCompCuentas1C  )
												<input type="hidden" id="totalActivos1" value="{{$a}}">
											@endif
									<!--<h2>{{ $gr->nombre }} {{ $valorCompCuentas2C }}</h2>-->
											@if( $gr->nombre == $valorCompCuentas2C )
												<input type="hidden" id="totalPasivos1" value="{{$a}}">
											@endif
									<!--<h2>{{ $gr->nombre }} {{ $valorCompCuentas3C }}</h2>-->
											@if( $gr->nombre == $valorCompCuentas3C )
												<input type="hidden" id="totalPatrimonio1" value="{{$a}}">
											@endif
								<?php
									$a=0;
								?>
									
									
								@endif
						@endforeach

						@endif
					@endforeach
				@endif
				
				<?php //--------------- FIN AÑO 2 ---------------------- ?>


			
		@endforeach


@endsection