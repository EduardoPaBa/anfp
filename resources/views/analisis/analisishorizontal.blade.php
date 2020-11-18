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
				<h1>EMPRESA: {{$em->nombre}} - SECTOR: {{$em->sector}}</h1>
					
					@foreach($infin as $infss)

						<?php $r="{$infss->id}"; $idBalance=$bg1; ?>
						
						@if($r==$idBalance)
						
							<h2>BALANCE GENERAL: {{$infss->nombre}} - AÑO: {{$infss->anio}}</h2>
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
									
									<?php
										$arrayb=$array;
										//$array=[0];
									?>
									
									
								@endif
							@endforeach
						@endif
					@endforeach
				@endif

				


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
				<h1>EMPRESA: {{$em->nombre}} - SECTOR: {{$em->sector}}</h1>
					@foreach($infin as $infss)

						<?php $r="{$infss->id}"; $idBalance=$bg2; ?>
						
						@if($r==$idBalance)

							<h2>BALANCE GENERAL: {{$infss->nombre}} - AÑO: {{$infss->anio}}</h2>					
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
														<?php $t=0; $t="{$cu->valor}"; array_push ($arrayd,$t ) ?>
													@foreach($subcuentas as $sc)
														<?php
														$cuFK="{$sc->cuentas_id}";
														
														?>
														@if($cuFK==$cuID)
															<h6>--------SUB CUENTA: {{$sc->nombre}} --- VALOR: {{$sc->valor}}</h6>
															<?php $t=0; $t="{$sc->valor}"; array_push ($arrayd,$t ) ?>
														@endif
													@endforeach

												@endif
											@endforeach
											
										@endif
									@endforeach
									
									<?php
										$arraye=$arrayd;
										//$arrayd=[0];
									?>
									
									
								@endif
						@endforeach

						@endif
					@endforeach
					

				<h1 class="text-center mb-5">ANALISIS HORIZONTAL</h1>
				@for($i = 0; $i < count($arrayb); $i++)
					
					valores cuentas/subcuentas BG1: {{$arrayb[(int)$i]}} 
					valores cuentas/subcuentas BG2: {{$arraye[(int)$i]}}
					<?php
					
					(float)$F="{$arrayb[(int)$i]}";
					(float)$FF="{$arraye[(int)$i]}";
					$madre =($FF-$F);
					$total = (($FF-$F)/$F)*100;
					?>
					variacion absoluta: {{$madre}} 
					variacion relativa: {{$total}}%<br>
				@endfor
				@endif
				








				
				

				


				



			
		@endforeach
	@endsection