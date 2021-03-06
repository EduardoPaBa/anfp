@extends('layouts.app')
	@section('botones')
	<a href="{{ route('index') }}" class="btn btn-primary mr-2">Volver</a>
	@endsection
	@section('content')
		<h1 class="text-center mb-5">ANALISIS VERTICAL</h1>


<div class="p-3 mb-2 bg-dark text-white">
	@foreach($empresas as $em)
	<?php
		$emID="{$em->id}";
	?>
	<h1>--*-*- EMPRESA: {{$em->nombre}} - SECTOR: {{$em->sector}} -*-*--</h1>

		@foreach($infin as $in)
		<?php
		$inID="{$in->id}";
		$emFK="{$in->empresas_id}";
		?>
		

		@if($emFK==$emID)
			<h2>---------* BALANCE GENERAL: {{$in->nombre}} - AÑO: {{$in->anio}} *---------</h2>
			@foreach($grupos as $gr)
			<?php
			$grID="{$gr->id}";
			$inFK="{$gr->informefinancieros_id}";
			$valorBD="{$gr->nombre}";
			$total=0;
			$je=0;
			$y=0;
			?>
			

			@if($inFK==$inID)
			<div class="p-3 mb-2 bg-secondary text-white">
			<h3>{{$gr->codigo}}-GRUPO: {{$gr->nombre}}</h3>


				@foreach($clases as $cl)
				<?php
				$clID="{$cl->id}";
				$grFK="{$cl->grupos_id}";
				?>
				

				@if($grFK==$grID)
				<div class="p-3 mb-2 bg-primary text-white">
				<h4>{{$cl->codigo}}--CLASE: {{$cl->nombre}}</h4>
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
														$je= $je+$y;
														$totalclase= $totalclase+$y;
													@endphp
													@endif
											@endforeach
										@endif
									@endforeach 							
								@endif
							@endforeach
					

							@php
							//
							$total=$totalclase;

							$totalclase= 0;
							@endphp

				
							<?php //------------------------------------------------ ?>



							<?php
							//{{$total}}
							$x="{$cu->valor}";
							$y=($x/$total)*100;
							?>
							<h5>{{$cu->codigo}}----CUENTA: {{$cu->nombre}} --- VALOR: {{$cu->valor}} ({{$y}}%)  </h5>
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
									<h6>{{$sc->codigo}}--------SUB CUENTA: {{$sc->nombre}} --- VALOR: {{$sc->valor}} ({{$y}}%)</h6>

							@endif
						@endforeach

					@endif
					@endforeach
					</div>
				@endif

				@endforeach

				<h4> TOTAL GRUPO: {{$gr->nombre}} = {{$total}} (100%)</h4> <br>
			</div>
			@endif
			<?php	
				$total=0;
			?>
			@endforeach
		@endif
		@endforeach
	@endforeach

</div>

	@endsection