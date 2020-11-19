	@extends('layouts.app')
	@section('botones')
	<a href="{{ route('index') }}" class="btn btn-primary mr-2">Volver</a>
	@endsection
	@section('content')
		<h1 class="text-center mb-5">ANALISIS HORIZONTAL</h1>
		<div class="p-3 mb-2 bg-dark text-white">	
		@foreach($empresas as $em)
			<?php
				$emID="{$em->id}";
			?>
			
			
				<?php
				$inID=$bg1;
				//$emFK=1;
				$array=[];
				$arrayb=[];
				$arraynombreA=[];
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
								<div class="p-3 mb-2 bg-secondary text-white">
									<h3>-GRUPO: {{$gr->nombre}}</h3>
									@foreach($clases as $cl)
										<?php
										$clID="{$cl->id}";
										$grFK="{$cl->grupos_id}";
										
										?>
										@if($grFK==$grID)
										<div class="p-3 mb-2 bg-primary text-white">
											<h4>--CLASE: {{$cl->nombre}}</h4>
											@foreach($cuentas as $cu)
												<?php
												$cuID="{$cu->id}";
												$clFK="{$cu->clases_id}";
												?>											
												@if($clFK==$clID)
													<h5>----CUENTA: {{$cu->nombre}} --- VALOR: {{$cu->valor}}</h5>
														<?php $t=0; $t="{$cu->valor}"; array_push ($array,$t ) ?>
														<?php $tt; $tt="{$cu->codigo} - {$cu->nombre}"; array_push ($arraynombreA,$tt ) ?>
													@foreach($subcuentas as $sc)
														<?php
														$cuFK="{$sc->cuentas_id}";
														
														?>
														@if($cuFK==$cuID)
															<h6>--------SUB CUENTA: {{$sc->nombre}} --- VALOR: {{$sc->valor}}</h6>
															<?php $t=0; $t="{$sc->valor}"; array_push ($array,$t ) ?>
															<?php $tt; $tt="{$sc->codigo} - {$sc->nombre}"; array_push ($arraynombreA,$tt ) ?>
														@endif
													@endforeach

												@endif
											@endforeach
										</div>
										@endif
									@endforeach
									
									<?php
										$arrayb=$array;
										//$array=[0];
									?>
									
								</div>	
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
				$arraynombreB=[];
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
								<div class="p-3 mb-2 bg-secondary text-white">
									<h3>-GRUPO: {{$gr->nombre}}</h3>
									@foreach($clases as $cl)
										<?php
										$clID="{$cl->id}";
										$grFK="{$cl->grupos_id}";
										
										?>
										@if($grFK==$grID)
										<div class="p-3 mb-2 bg-primary text-white">
											<h4>--CLASE: {{$cl->nombre}}</h4>
											@foreach($cuentas as $cu)
												<?php
												$cuID="{$cu->id}";
												$clFK="{$cu->clases_id}";
												?>											
												@if($clFK==$clID)
													<h5>----CUENTA: {{$cu->nombre}} --- VALOR: {{$cu->valor}}</h5>
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
										</div>	
										@endif
									@endforeach
									
									<?php
										$arraye=$arrayd;
										//$arrayd=[0];
									?>
									
									</div>
								@endif
						@endforeach

						@endif
					@endforeach
					

				<h1 class="text-center mb-5">ANALISIS HORIZONTAL</h1>
				<div class="col-md-10 mx-auto bg-white p-3">
	<table class="table">
		<thead class="bg-primary text-light">
			<tr>
				<th scole="col">Nombre</th>
				<th scole="col">Valor en BG1</th>
				<th scole="col">Valor en BG2</th>
				<th scole="col">Variacion Absoluta</th>
				<th scole="col">Variacion Relativa</th>
			</tr>
		</thead>
		<tbody>
				@for($i = 0; $i < count($arrayb); $i++)
					<tr>
					<td>{{$arraynombreA[(int)$i]}}</td>
					 <td>{{$arrayb[(int)$i]}} </td>
					<td>{{$arraye[(int)$i]}}</td>
					<?php
					
					(float)$F="{$arrayb[(int)$i]}";
					(float)$FF="{$arraye[(int)$i]}";
					$madre =($FF-$F);
					$total = (($FF-$F)/$F)*100;
					?>
					
					<td>{{$madre}} </td>
					<td>{{$total}}%</td>
					</tr>
				@endfor
				@endif
				</tbody>
	</table>
</div>
				








				
				

				</div>


				



			
		@endforeach
	@endsection