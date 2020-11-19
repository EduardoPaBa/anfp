	@extends('layouts.app')
	@section('botones')
	<a href="{{ route('index') }}" class="btn btn-primary mr-2">Volver</a>
	@endsection
	@section('content')
	<h1 class="text-center mb-5">BALANCE GENERAL</h1>
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
							?>	
												
							@if($inFK==$inID)
							<div class="p-3 mb-2 bg-secondary text-white">
								<h3>{{$gr->codigo}}-GRUPO: {{$gr->nombre}}</h3>
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
									<div class="p-3 mb-2 bg-primary text-white">
										<h4>{{$cl->codigo}}--CLASE: {{$cl->nombre}}</h4>
										@foreach($cuentas as $cu)
											<?php
												$cuID="{$cu->id}";
												$clFK="{$cu->clases_id}";
											?>											
											@if($clFK==$clID)
												<h5>{{$cu->codigo}}----CUENTA: {{$cu->nombre}} --- VALOR: {{$cu->valor}}</h5>
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
														<h6>{{$sc->codigo}}--------SUB CUENTA: {{$sc->nombre}} --- VALOR: {{$sc->valor}}</h6>
														<?php
															$d="{$sc->valor}";
															$a=$a+$d;
															$b=$b+$d;
														?>
													@endif
												@endforeach
											@endif
										@endforeach
										<h4>TOTAL CLASE: {{$cl->nombre}}  - VALOR= {{$b}}</h4> <br>
										<?php
											$b=0;
										?>
										</div>
									@endif
								
								@endforeach
								<h3>TOTAL GRUPO: {{$gr->nombre}} - VALOR= {{$a}}</h3> <br> <br>
								<?php
									$a=0;
								?>
								</div>
							@endif
						
					@endforeach
				@endif
			@endforeach
		@endforeach
	</div>


	@endsection