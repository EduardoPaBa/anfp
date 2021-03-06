	@extends('layouts.app')
	@section('botones')
	<a href="{{ route('index') }}" class="btn btn-primary mr-2">Volver</a>
	@endsection
	@section('content')
		<h1 class="text-center mb-5">ANALISIS HORIZONTAL</h1>	
		@foreach($empresas as $em)
			<?php
				$emID="{$em->id}";
			?>
			<h1>EMPRESA: {{$em->nombre}}</h1>
			@foreach($infin as $in)
				<?php
				$inID="{$in->id}";
				$emFK="{$in->empresas_id}";
				$array=[];
				$arrayb=[];
				?>				
				@if($emFK==$emID)
					<h2>BALANCE GENERAL: {{$in->nombre}} - AÑO: {{$in->anio}}</h2>
						@foreach($grupos as $gr)
							<?php
							$grID="{$gr->id}";
							$inFK="{$gr->informefinancieros_id}";
							
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
												<h5>----CUENTA: {{$cu->nombre}} --- VALOR: {{$cu->valor}}<h5>
													<?php $t=0; $t="{$cu->valor}"; array_push ($array,$t ) ?>
												@foreach($subcuentas as $sc)
													<?php
													$cuFK="{$sc->cuentas_id}";
													
													?>
													@if($cuFK==$cuID)
														<h6>--------SUB CUENTA: {{$sc->nombre}} --- VALOR: {{$sc->valor}}</h6>
														<?php $t=0; $t="{$sc->valor}"; array_push ($array,$t ) ?>
													@endif
												@endforeach

											@endif
										@endforeach
										
									@endif
								@endforeach
								{{$gr->nombre}}
								@foreach($array as $a)
									A: {{$a}} 

								@endforeach
								
								<?php
									//$array=[];
									$array=[0];								
								?>
							@endif
					@endforeach
				@endif
				

			@endforeach
		@endforeach
	@endsection