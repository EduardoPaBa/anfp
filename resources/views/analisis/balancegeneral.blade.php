	@extends('layouts.app')
	@section('botones')
	<a href="{{ route('index') }}" class="btn btn-primary mr-2">Volver</a>
	@endsection
	@section('content')
	<h1 class="text-center mb-5">BALANCE GENERAL</h1>

	<?php
	
	
	$valorCompCuentas="{cuenta simple}";
	$valorCompSubCuentas="{grande patas}";
	$totalGrupo=0;
	$totalclase=0;
	$y=0;
	?>

	





	@foreach($empresas as $em)

		<?php
		$emID="{$em->id}";
		?>
		<h1>---*- NOMBRE EMPRESA: "{{$em->nombre}}" -*---</h1>
		
		
	@foreach($infin as $in)
		<?php
			$infiID="{$in->id}";
			$emFK="{$in->empresas_id}";
		?>
		@if($emID==$emFK)

		<h2>--* Balance General: "{{$in->nombre}}" - Año: {{$in->anio}} *--</h2>
		@php
			//-------------------------------------------
		@endphp
		@foreach($grupos as $gr)
			<?php
				$arregloBD="{$gr->nombre}";
				$valorBD=$arregloBD;
				$grupoID="{$gr->id}";
				$infiFK="{$gr->informefinancieros_id}";
			?>

			@if($infiFK==$infiID)
		
				




				







 


				<?php
				$valorCompGrupos="activo";
				$valorCompClases="activo corriente";
				$valorCompClases1="activo no corriente";
				?>
				@if($valorBD == $valorCompGrupos)

					@foreach($clases as $cl)
						<?php
							$grupoFK="$cl->grupos_id";
							$claseID="{$cl->id}";
						?>
			
						@if($grupoID==$grupoFK)









						@php
						//-------------------------------------------
						@endphp
						<?php
							$arregloBD="{$cl->nombre}";
							$valorBD=$arregloBD;
						?>
						@if($valorBD == $valorCompClases)

							@foreach($cuentas as $cu)
								<?php
									$claseFK="$cu->clases_id";
									$cuentaID="{$cu->id}"
								?>

								@if($claseID==$claseFK)
					
									<?php
										//---*******aqui almaceno el valor de la cuenta***********----------
										$x="{$cu->valor}";	
										$totalGrupo =$totalGrupo+$x;
									?>
									
									@foreach($subcuentas as $su)
										<?php										
										$cuentaFK="{$su->cuentas_id}";
										?>
						
						
										@if($cuentaID==$cuentaFK)
								
											<?php
											//---*******aqui almaceno el valor de la sub cuenta***********----------
											$y="{$su->valor}";
											$totalGrupo =$totalGrupo+$y;
											?>
											
										@endif
									@endforeach
								@endif
							@endforeach 
							<h4>Total Clase: {{$valorCompClases}} = {{$totalGrupo}}</h4>
							<?php
								$valorBD="";
							?>
							@php
								$totalGrupo= 0;
							@endphp

						@endif
						@php
						//-------------------------------------------
						@endphp

						@php
						//-------------------------------------------
						@endphp
						<?php
							$arregloBD="{$cl->nombre}";
							$valorBD=$arregloBD;
						?>
						@if($valorBD == $valorCompClases1)

							@foreach($cuentas as $cu)
								<?php
									$claseFK="$cu->clases_id";
									$cuentaID="{$cu->id}"
								?>

								@if($claseID==$claseFK)
					
									<?php
										//---*******aqui almaceno el valor de la cuenta***********----------
										$x="{$cu->valor}";	
										$totalGrupo =$totalGrupo+$x;
									?>
									
									@foreach($subcuentas as $su)
										<?php										
										$cuentaFK="{$su->cuentas_id}";
										?>
						
						
										@if($cuentaID==$cuentaFK)
								
											<?php
											//---*******aqui almaceno el valor de la sub cuenta***********----------
											$y="{$su->valor}";
											$totalGrupo =$totalGrupo+$y;
											?>
											
										@endif
									@endforeach
								@endif
							@endforeach 
							<h4>Total Clase: {{$valorCompClases1}} = {{$totalGrupo}}</h4>
							<?php
								$valorBD="";
							?>
							@php
								$totalGrupo= 0;
							@endphp

						@endif
						@php
						//-------------------------------------------
						@endphp










							@foreach($cuentas as $cu)
								<?php
									$claseFK="$cu->clases_id";
									$cuentaID="{$cu->id}"
								?>

								@if($claseID==$claseFK)
					
									<?php
										$x="{$cu->valor}";							
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
					<h2>Total Grupo: {{$valorCompGrupos}} = {{$totalclase}}</h2>
					
					@php
						$totalclase= 0;
					@endphp

				@endif









				<?php
				$valorCompGrupos="pasivo";
				$valorCompClases="pasivo corriente";
				$valorCompClases1="pasivo no corriente";
				$valorCompClases2="patrimonio";
				?>
				@if($valorBD == $valorCompGrupos)

					@foreach($clases as $cl)
						<?php
							$grupoFK="$cl->grupos_id";
							$claseID="{$cl->id}";
						?>
			
						@if($grupoID==$grupoFK)









						@php
						//-------------------------------------------
						@endphp
						<?php
							$arregloBD="{$cl->nombre}";
							$valorBD=$arregloBD;
						?>
						@if($valorBD == $valorCompClases)

							@foreach($cuentas as $cu)
								<?php
									$claseFK="$cu->clases_id";
									$cuentaID="{$cu->id}"
								?>

								@if($claseID==$claseFK)
					
									<?php
										//---*******aqui almaceno el valor de la cuenta***********----------
										$x="{$cu->valor}";	
										$totalGrupo =$totalGrupo+$x;
									?>
									
									@foreach($subcuentas as $su)
										<?php										
										$cuentaFK="{$su->cuentas_id}";
										?>
						
						
										@if($cuentaID==$cuentaFK)
								
											<?php
											//---*******aqui almaceno el valor de la sub cuenta***********----------
											$y="{$su->valor}";
											$totalGrupo =$totalGrupo+$y;
											?>
											
										@endif
									@endforeach
								@endif
							@endforeach 
							<h4>Total Clase: {{$valorCompClases}} = {{$totalGrupo}}</h4>
							<?php
								$valorBD="";
							?>
							@php
								$totalGrupo= 0;
							@endphp

						@endif
						@php
						//-------------------------------------------
						@endphp

						@php
						//-------------------------------------------
						@endphp
						<?php
							$arregloBD="{$cl->nombre}";
							$valorBD=$arregloBD;
						?>
						@if($valorBD == $valorCompClases1)

							@foreach($cuentas as $cu)
								<?php
									$claseFK="$cu->clases_id";
									$cuentaID="{$cu->id}"
								?>

								@if($claseID==$claseFK)
					
									<?php
										//---*******aqui almaceno el valor de la cuenta***********----------
										$x="{$cu->valor}";	
										$totalGrupo =$totalGrupo+$x;
									?>
									
									@foreach($subcuentas as $su)
										<?php										
										$cuentaFK="{$su->cuentas_id}";
										?>
						
						
										@if($cuentaID==$cuentaFK)
								
											<?php
											//---*******aqui almaceno el valor de la sub cuenta***********----------
											$y="{$su->valor}";
											$totalGrupo =$totalGrupo+$y;
											?>
											
										@endif
									@endforeach
								@endif
							@endforeach 
							<h4>Total Clase: {{$valorCompClases1}} = {{$totalGrupo}}</h4>
							
							@php
								$totalGrupo= 0;
							@endphp

						@endif
						@php
						//-------------------------------------------
						@endphp

						@php
						//-------------------------------------------
						@endphp
						<?php
							$arregloBD="{$cl->nombre}";
							$valorBD=$arregloBD;
						?>
						@if($valorBD == $valorCompClases2)

							@foreach($cuentas as $cu)
								<?php
									$claseFK="$cu->clases_id";
									$cuentaID="{$cu->id}"
								?>

								@if($claseID==$claseFK)
					
									<?php
										//---*******aqui almaceno el valor de la cuenta***********----------
										$x="{$cu->valor}";	
										$totalGrupo =$totalGrupo+$x;
									?>
									
									@foreach($subcuentas as $su)
										<?php										
										$cuentaFK="{$su->cuentas_id}";
										?>
						
						
										@if($cuentaID==$cuentaFK)
								
											<?php
											//---*******aqui almaceno el valor de la sub cuenta***********----------
											$y="{$su->valor}";
											$totalGrupo =$totalGrupo+$y;
											?>
											
										@endif
									@endforeach
								@endif
							@endforeach 
							<h4>Total Clase: {{$valorCompClases2}} = {{$totalGrupo}}</h4>
							<?php
								$valorBD="";
							?>
							@php
								$totalGrupo= 0;
							@endphp

						@endif
						@php
						//-------------------------------------------
						@endphp












							@foreach($cuentas as $cu)
								<?php
									$claseFK="$cu->clases_id";
									$cuentaID="{$cu->id}"
								?>

								@if($claseID==$claseFK)
					
									<?php
										$x="{$cu->valor}";							
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
					<h2>Total Grupo: {{$valorCompGrupos}} = {{$totalclase}}</h2>
					<?php
						$valorBD="";
					?>
					@php
						$totalclase= 0;
					@endphp

				@endif






				
			@endif
		@endforeach
		@php
			//-------------------------------------------
		@endphp
		<br>
		<br>
		@endif
	@endforeach

	

	@endforeach

	










	@foreach($clases as $cl)

		<?php
		$arregloBD="{{$cl->nombre}}";
		$valorBD=$arregloBD;
		?>
		
		@if($valorBD == $valorCompClases)
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