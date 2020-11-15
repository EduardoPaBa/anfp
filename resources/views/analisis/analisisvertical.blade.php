@extends('layouts.app')
	@section('botones')
	<a href="{{ route('index') }}" class="btn btn-primary mr-2">Volver</a>
	@endsection
	@section('content')
		<h1 class="text-center mb-5">ANALISIS VERTICAL</h1>



	@foreach($empresas as $em)
	<?php
		$emID="{$em->id}";
	?>
	<h1>EMPRESA: {{$em->nombre}}</h1>

		@foreach($infin as $in)
		<?php
		$inID="{$in->id}";
		$emFK="{$in->empresas_id}";
		?>
		

		@if($emFK==$emID)
		<h2>BALANCE GENERAL: {{$in->nombre}} - AÑO: {{$in->anio}}</h2>
			@foreach($grupos as $gr)
			<?php
			$grID="{$gr->id}";
			$inFK="{$gr->informefinancieros_id}";
			$valorBD="{$gr->nombre}";
			$total=0;
			?>
			

			@if($inFK==$inID)
			<h3>-GRUPO: {{$gr->nombre}}</h3>











				@foreach($clases as $cl)
				<?php
				$clID="{$cl->id}";
				$grFK="{$cl->grupos_id}";
				?>
				

				@if($grFK==$grID)
				<h4>--CLASE: {{$cl->nombre}}</h4>
					@foreach($cuentas as $cu)
					<?php
					$cuID="{$cu->id}";
					$clFK="{$cu->clases_id}";
					?>
					

					@if($clFK==$clID)


				<?php //------------------------------------------------ ?>
				<?php
				$valorCompGrupos="activo";
				$totalclase=0;
				?>
				

					@foreach($clases as $cl)
						<?php
							$grupoFK="$cl->grupos_id";
							$claseID="{$cl->id}";
						?>
			
						@if($grID==$grupoFK)

							@foreach($cuentas as $cus)
								<?php
									$claseFK="$cus->clases_id";
									$cuentaID="{$cus->id}"
								?>

								@if($claseID==$claseFK)
					
									<?php
										$x="{$cus->valor}";							
									?>
									@php
										
										$totalclase= $totalclase+$x;
									@endphp
									@foreach($subcuentas as $su)
										<?php										
										$cuentaFK="{$su->cuentas_id}";
										?>
						
						
										@if($cuentaID==$cuentaFK)
								
											<?php
											//---**aqui almaceno el valor de la sub cuenta****----------
											$y="{$su->valor}";
											?>
											@php
												$totalclase= $totalclase+$y;
											@endphp
										@endif
									@endforeach
								@endif
							@endforeach 
							
						@endif
					@endforeach
					
					
					@php
					//<h2>Total Grupo: {{$valorCompGrupos}} = {{$totalclase}} (100%)</h2>
						$total=$totalclase;
						$totalclase= 0;
					@endphp

				
				<?php //------------------------------------------------ ?>


				
					
					<?php
					//{{$total}}
					$x="{$cu->valor}";
					$y=($x/$total)*100;
					?>
					<h5>----CUENTA: {{$cu->nombre}} --- VALOR: {{$cu->valor}} ({{$y}}%)  <h5>
						@foreach($subcuentas as $sc)
						<?php
						$cuFK="{$sc->cuentas_id}";
						?>


						

						@if($cuFK==$cuID)
						<?php
						//{{$total}}
						$x="{$sc->valor}";
						$y=($x/$total)*100;
						?>
						<h6>--------SUB CUENTA: {{$sc->nombre}} --- VALOR: {{$sc->valor}} ({{$y}}%)</h6>

						@endif
						@endforeach
					@endif
					@endforeach
				@endif
				@endforeach
			<h4> TOTAL GRUPO: {{$gr->nombre}} = {{$total}} (100%)</h4>


				


			@endif

			<?php
				
				$total=0;
				?>
			@endforeach
		@endif
		@endforeach
	@endforeach

	@endsection