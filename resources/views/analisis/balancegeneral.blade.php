	@extends('layouts.app')
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
		<table class="table" id="table">
			<thead class="bg-primary text-light">
				<tr>
					<th >Codigo</th>
					<th >Nombre</th>
					<th >Valor</th>
					<th >Acciones</th>
				</tr>
			</thead>
			<tbody>


				@foreach ($empresas as $em)
					<tr>	
						<td>*--*--*--*</td>
						<td>---- {{$em->nombre}} ----</td>
						<td>---- SECTOR: {{$em->sector}} ----</td>
						<td> </td>	
					</tr>

					@foreach ($infin as $if)
					@php
					$x="{{$em->id}}";
					$y="{{$if->empresas_id}}";
					@endphp
					@if($x==$y)
					<tr>	
						<td>--*--</td>
						<td>--- {{$if->nombre}} ---</td>
						<td>--- AÑO: {{$if->anio}} ---</td>
						<td> </td>	
					</tr>
					


						@foreach ($grupos as $gr)
						@php
						$x="{{$if->id}}";
						$y="{{$gr->informefinancieros_id}}";
						@endphp
						@if($x==$y)
						<tr>		
							<td>{{$gr->codigo}}</td>
							<td>{{$gr->nombre}}</td>
							<td> </td>
							<td> </td>
						</tr>
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
							</tr>
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
								</tr>
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
								
								@endif
								@endforeach
							
							@endif
							@endforeach
						
						@endif
						@endforeach
				@endif
				@endforeach



				@endforeach

				
				
				
			</tbody>
		</table>
	</div>





	@endsection