	@extends('layouts.app')
	@section('botones')
	<a href="{{ route('index') }}" class="btn btn-primary mr-2">Volver</a>
	@endsection
	@section('content')
	<h1 class="text-center mb-5">BALANCE GENERAL</h1>

		@foreach($empresas as $em)
			<?php
				$emID="{$em->id}";
			?>
			<h1>--*-*- EMPRESA: {{$em->nombre}} -*-*--</h1>
			@foreach($infin as $in)
				<?php
					$inID="{$in->id}";
					$emFK="{$in->empresas_id}";
				?>				
				@if($emFK==$emID)
					<h2>--* BALANCE GENERAL: {{$in->nombre}} - AÑO: {{$in->anio}} *--</h2>
						@foreach($grupos as $gr)
							<?php
								$grID="{$gr->id}";
								$inFK="{$gr->informefinancieros_id}";
							?>						
							@if($inFK==$inID)
								<h3>-GRUPO: {{$gr->nombre}}</h3>
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
										<h4>--CLASE: {{$cl->nombre}}</h4>
										@foreach($cuentas as $cu)
											<?php
												$cuID="{$cu->id}";
												$clFK="{$cu->clases_id}";
											?>											
											@if($clFK==$clID)
												<h5>----CUENTA: {{$cu->nombre}} --- VALOR: {{$cu->valor}}</h5>
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
														<h6>--------SUB CUENTA: {{$sc->nombre}} --- VALOR: {{$sc->valor}}</h6>
														<?php
															$d="{$sc->valor}";
															$a=$a+$d;
															$b=$b+$d;
														?>
													@endif
												@endforeach
											@endif
										@endforeach
										<h4>--TOTAL CLASE: {{$cl->nombre}}  - VALOR= {{$b}}</h4>
										<?php
											$b=0;
										?>
									@endif
								@endforeach
								<h3>-TOTAL GRUPO: {{$gr->nombre}} - VALOR= {{$a}}</h3> <br>
								<?php
									$a=0;
								?>
							@endif
					@endforeach
				@endif
			@endforeach
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