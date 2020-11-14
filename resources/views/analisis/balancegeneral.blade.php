	@extends('layouts.app')
	@section('botones')
	<a href="{{ route('index') }}" class="btn btn-primary mr-2">Volver</a>
	@endsection
	@section('content')

	<?php
	$valorCompGrupos="{pasivo}";
	$valorCompClases="{pasivo corriente}";
	$valorCompCuentas="{cuenta simple}";
	$valorCompSubCuentas="{grande patas}";
	$totalPasivo=0;
	$totalActivo=0;
	$y=0;
	?>



	@foreach($grupos as $gr)

		<?php
		$arregloBD="{{$gr->nombre}}";
		$valorBD=$arregloBD;
		$grupoID="{$gr->id}";
		?>
		
		@if($valorBD == $valorCompGrupos)
			<h1>grupo encontrado</h1>

			@foreach($clases as $cl)
			<?php
			$grupoFK="$cl->grupos_id";
			$claseID="{$cl->id}";
			?>
			
			@if($grupoID==$grupoFK)

				@foreach($cuentas as $cu)
				<?php
				$claseFK="$cu->clases_id";
				$cuentaID="{$cu->id}"
				?>

				@if($claseID==$claseFK)
					<h1> ff c</h1>
					<?php
						$x="{$cu->valor}";							
					?>
					x{{$x}}
					@php
						$totalPasivo= $totalPasivo+$x;
					@endphp
					@foreach($subcuentas as $su)
						<?php
							$cuentaFK="{$su->cuentas_id}";
							//<h1> {{$cuentaFK}} - {{$cuentaID}}</h1>
						?>
						
						
							@if($cuentaID==$cuentaFK)
								<h1> ff sc</h1>
								<?php
									$y="{$su->valor}";
								?>
								y{{$y}}
								@php
									$totalPasivo= $totalPasivo+$y;
								@endphp




							@endif
							
							
							
							

							

					@endforeach
					
					


				@endif

				@endforeach
				

				<h1>Total pasivo {{$totalPasivo}}</h1>

			@endif
			@endforeach



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