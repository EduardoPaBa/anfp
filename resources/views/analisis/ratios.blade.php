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
$valorCompGrupos="{Grupo grande}";
$valorCompClases="{activo}";
$valorCompCuentas="{cuenta simple}";
$valorCompSubCuentas="{grande patas}";
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

	<br>
	<u><h2>Razones de Liquidez</h2></u>

	<div class="row">

	<div class="col-sm" id="rl">
		
		<h5>Razon de liquidez corriente</h5>
		<label>Activo circulante: </label>
		<select data-live-search="true" class="selectpicker col-md-8" name="" id="id_numerador">
		  @foreach($ratios as $r)
            <option data-tokens="" data-precio="" value="">
            	{{ $r -> rnombre }} = {{ $r -> rcuentas }}
            </option>
		  @endforeach
		  </select>
		<br>
		<label>Pasivo circulante: </label>
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
		
		<h5>Razon de efectivo</h5>
		<label>Efectivo: </label>
		<input type="text" name="act" class="col-md-4">
		<br>
		<label>Valores de corto plazo: </label>
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
	<div class="row">
		<div class="col-sm" id="r">
		
		<h5>Razon rapida o prueba acida</h5>
		<label>Activo corriente: </label>
		<input type="text" name="act" class="col-md-4">
		<br>
		<label>Inventario: </label>
		<input type="text" name="pas" class="col-md-4">
		<br>
		<label>Pasivo corriente: </label>
		<input type="text" name="pas" class="col-md-4">
		<div class="col-6 col-md-4">
			<label>Resultado = </label>
			<input type="text" id="inputTotal" class="solo-numero">
		</div>
	</div>
	
	<div class="col-sm" id="rl">
		
		<h5>Razon de capital</h5>
		<label>Activo corriente: </label>
		<select data-live-search="true" class="selectpicker" name="" id="id_numerador">
		  <option value="">Seleccionar cuenta</option>
		  @foreach($ratios as $r)
		            <option data-tokens="" data-precio="{{ $r -> rcuentas }}" value="{{ $r -> rcuentas }}">
		            	{{ $r -> rcuentas }}
		            </option>
		            @endforeach
		  </select>
		<br>
		<label>Pasivo circulante: </label>
		<select data-live-search="true" class="selectpicker" name="" id="id_denominador">
  		<option value="">Seleccionar cuenta</option>
  		@foreach($ratios as $r)
            <option data-tokens="" data-precio="{{ $r -> rcuentas }}" value="{{ $r -> rcuentas }}">
            	{{ $r -> rcuentas }}
            </option>
            @endforeach
  		</select>
		<br>
		<label>Activo totales: </label>
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
	</div>
<br>

	<br>
	<u><h2>Razones de Actividad</h2></u>

	<div class="row">

	<div class="col-sm" id="rl">
		
		<h5>Razon de liquidez corriente</h5>
		<label>Activo circulante: </label>
		<select data-live-search="true" class="selectpicker col-md-8" name="" id="id_numerador">
		  @foreach($ratios as $r)
            <option data-tokens="" data-precio="" value="">
            	{{ $r -> rnombre }} = {{ $r -> rcuentas }}
            </option>
		  @endforeach
		  </select>
		<br>
		<label>Pasivo circulante: </label>
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
		
		<h5>Razon de efectivo</h5>
		<label>Efectivo: </label>
		<input type="text" name="act" class="col-md-4">
		<br>
		<label>Valores de corto plazo: </label>
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
		
		<h5>Razon rapida o prueba acida</h5>
		<label>Activo corriente: </label>
		<input type="text" name="act" class="col-md-4">
		<br>
		<label>Inventario: </label>
		<input type="text" name="pas" class="col-md-4">
		<br>
		<label>Pasivo corriente: </label>
		<input type="text" name="pas" class="col-md-4">
		<div class="col-6 col-md-4">
			<label>Resultado = </label>
			<input type="text" id="inputTotal" class="solo-numero">
		</div>
	</div>
	
	<div class="col-sm" id="rl">
		
		<h5>Razon de capital</h5>
		<label>Activo corriente: </label>
		<select data-live-search="true" class="selectpicker" name="" id="id_numerador">
		  <option value="">Seleccionar cuenta</option>
		  @foreach($ratios as $r)
		            <option data-tokens="" data-precio="{{ $r -> rcuentas }}" value="{{ $r -> rcuentas }}">
		            	{{ $r -> rcuentas }}
		            </option>
		            @endforeach
		  </select>
		<br>
		<label>Pasivo circulante: </label>
		<select data-live-search="true" class="selectpicker" name="" id="id_denominador">
  		<option value="">Seleccionar cuenta</option>
  		@foreach($ratios as $r)
            <option data-tokens="" data-precio="{{ $r -> rcuentas }}" value="{{ $r -> rcuentas }}">
            	{{ $r -> rcuentas }}
            </option>
            @endforeach
  		</select>
		<br>
		<label>Activo totales: </label>
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
	</div>

	<br>

	<div class="row">
		<div class="col-sm" id="r">
		
		<h5>Razon rapida o prueba acida</h5>
		<label>Activo corriente: </label>
		<input type="text" name="act" class="col-md-4">
		<br>
		<label>Inventario: </label>
		<input type="text" name="pas" class="col-md-4">
		<br>
		<label>Pasivo corriente: </label>
		<input type="text" name="pas" class="col-md-4">
		<div class="col-6 col-md-4">
			<label>Resultado = </label>
			<input type="text" id="inputTotal" class="solo-numero">
		</div>
	</div>
	
	<div class="col-sm" id="rl">
		
		<h5>Razon de capital</h5>
		<label>Activo corriente: </label>
		<select data-live-search="true" class="selectpicker" name="" id="id_numerador">
		  <option value="">Seleccionar cuenta</option>
		  @foreach($ratios as $r)
		            <option data-tokens="" data-precio="{{ $r -> rcuentas }}" value="{{ $r -> rcuentas }}">
		            	{{ $r -> rcuentas }}
		            </option>
		            @endforeach
		  </select>
		<br>
		<label>Pasivo circulante: </label>
		<select data-live-search="true" class="selectpicker" name="" id="id_denominador">
  		<option value="">Seleccionar cuenta</option>
  		@foreach($ratios as $r)
            <option data-tokens="" data-precio="{{ $r -> rcuentas }}" value="{{ $r -> rcuentas }}">
            	{{ $r -> rcuentas }}
            </option>
            @endforeach
  		</select>
		<br>
		<label>Activo totales: </label>
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
	</div>

	<br>

	<div class="row">
		<div class="col-sm" id="r">
		
		<h5>Razon rapida o prueba acida</h5>
		<label>Activo corriente: </label>
		<input type="text" name="act" class="col-md-4">
		<br>
		<label>Inventario: </label>
		<input type="text" name="pas" class="col-md-4">
		<br>
		<label>Pasivo corriente: </label>
		<input type="text" name="pas" class="col-md-4">
		<div class="col-6 col-md-4">
			<label>Resultado = </label>
			<input type="text" id="inputTotal" class="solo-numero">
		</div>
	</div>
	
	<div class="col-sm" id="rl">
		
		<h5>Razon de capital</h5>
		<label>Activo corriente: </label>
		<select data-live-search="true" class="selectpicker" name="" id="id_numerador">
		  <option value="">Seleccionar cuenta</option>
		  @foreach($ratios as $r)
		            <option data-tokens="" data-precio="{{ $r -> rcuentas }}" value="{{ $r -> rcuentas }}">
		            	{{ $r -> rcuentas }}
		            </option>
		            @endforeach
		  </select>
		<br>
		<label>Pasivo circulante: </label>
		<select data-live-search="true" class="selectpicker" name="" id="id_denominador">
  		<option value="">Seleccionar cuenta</option>
  		@foreach($ratios as $r)
            <option data-tokens="" data-precio="{{ $r -> rcuentas }}" value="{{ $r -> rcuentas }}">
            	{{ $r -> rcuentas }}
            </option>
            @endforeach
  		</select>
		<br>
		<label>Activo totales: </label>
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
	</div>

	<br>

	<div class="row">
		<div class="col-sm" id="r">
		
		<h5>Razon rapida o prueba acida</h5>
		<label>Activo corriente: </label>
		<input type="text" name="act" class="col-md-4">
		<br>
		<label>Inventario: </label>
		<input type="text" name="pas" class="col-md-4">
		<br>
		<label>Pasivo corriente: </label>
		<input type="text" name="pas" class="col-md-4">
		<div class="col-6 col-md-4">
			<label>Resultado = </label>
			<input type="text" id="inputTotal" class="solo-numero">
		</div>
	</div>
	
	<div class="col-sm" id="rl">
		
		<h5>Razon de capital</h5>
		<label>Activo corriente: </label>
		<select data-live-search="true" class="selectpicker" name="" id="id_numerador">
		  <option value="">Seleccionar cuenta</option>
		  @foreach($ratios as $r)
		            <option data-tokens="" data-precio="{{ $r -> rcuentas }}" value="{{ $r -> rcuentas }}">
		            	{{ $r -> rcuentas }}
		            </option>
		            @endforeach
		  </select>
		<br>
		<label>Pasivo circulante: </label>
		<select data-live-search="true" class="selectpicker" name="" id="id_denominador">
  		<option value="">Seleccionar cuenta</option>
  		@foreach($ratios as $r)
            <option data-tokens="" data-precio="{{ $r -> rcuentas }}" value="{{ $r -> rcuentas }}">
            	{{ $r -> rcuentas }}
            </option>
            @endforeach
  		</select>
		<br>
		<label>Activo totales: </label>
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
	</div>

	<br>
	<u><h2>Razones de Actividad</h2></u>

	<div class="row">

	<div class="col-sm" id="rl">
		
		<h5>Razon de liquidez corriente</h5>
		<label>Activo circulante: </label>
		<select data-live-search="true" class="selectpicker col-md-8" name="" id="id_numerador">
		  @foreach($ratios as $r)
            <option data-tokens="" data-precio="" value="">
            	{{ $r -> rnombre }} = {{ $r -> rcuentas }}
            </option>
		  @endforeach
		  </select>
		<br>
		<label>Pasivo circulante: </label>
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
		
		<h5>Razon de efectivo</h5>
		<label>Efectivo: </label>
		<input type="text" name="act" class="col-md-4">
		<br>
		<label>Valores de corto plazo: </label>
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
		
		<h5>Razon rapida o prueba acida</h5>
		<label>Activo corriente: </label>
		<input type="text" name="act" class="col-md-4">
		<br>
		<label>Inventario: </label>
		<input type="text" name="pas" class="col-md-4">
		<br>
		<label>Pasivo corriente: </label>
		<input type="text" name="pas" class="col-md-4">
		<div class="col-6 col-md-4">
			<label>Resultado = </label>
			<input type="text" id="inputTotal" class="solo-numero">
		</div>
	</div>
	
	<div class="col-sm" id="rl">
		
		<h5>Razon de capital</h5>
		<label>Activo corriente: </label>
		<select data-live-search="true" class="selectpicker" name="" id="id_numerador">
		  <option value="">Seleccionar cuenta</option>
		  @foreach($ratios as $r)
		            <option data-tokens="" data-precio="{{ $r -> rcuentas }}" value="{{ $r -> rcuentas }}">
		            	{{ $r -> rcuentas }}
		            </option>
		            @endforeach
		  </select>
		<br>
		<label>Pasivo circulante: </label>
		<select data-live-search="true" class="selectpicker" name="" id="id_denominador">
  		<option value="">Seleccionar cuenta</option>
  		@foreach($ratios as $r)
            <option data-tokens="" data-precio="{{ $r -> rcuentas }}" value="{{ $r -> rcuentas }}">
            	{{ $r -> rcuentas }}
            </option>
            @endforeach
  		</select>
		<br>
		<label>Activo totales: </label>
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
	</div>

	<br>
	<div class="col-sm" id="rl">
		
		<h5>Razon de capital</h5>
		<label>Activo corriente: </label>
		<select data-live-search="true" class="selectpicker" name="" id="id_numerador">
		  <option value="">Seleccionar cuenta</option>
		  @foreach($ratios as $r)
		            <option data-tokens="" data-precio="{{ $r -> rcuentas }}" value="{{ $r -> rcuentas }}">
		            	{{ $r -> rcuentas }}
		            </option>
		            @endforeach
		  </select>
		<br>
		<label>Pasivo circulante: </label>
		<select data-live-search="true" class="selectpicker" name="" id="id_denominador">
  		<option value="">Seleccionar cuenta</option>
  		@foreach($ratios as $r)
            <option data-tokens="" data-precio="{{ $r -> rcuentas }}" value="{{ $r -> rcuentas }}">
            	{{ $r -> rcuentas }}
            </option>
            @endforeach
  		</select>
		<br>
		<label>Activo totales: </label>
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





	<input type="button" id="resultados" value="Enviar formulario">
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