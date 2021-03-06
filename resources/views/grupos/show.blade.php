@extends('layouts.app')

@section('botones')
<a href="{{ route('index') }}" class="btn btn-primary mr-2">Volver</a>
@endsection


@section('content')
	<h1 class="text-center mb-5">Detalle Grupo</h1>

	<dir class="row justify-content-center mt-5">
		<dir class="col-md-8">
			<form method="POST" action="{{ route('grupos.store') }}" novalidate>
				@csrf


				<div class="form-group">
					 <label for="bg">Balance General al que pertenece</label>
					 <select 
					 	name="bg"
					 	class="form-control"
					 	id="bg"
					 >
					 

					 	@foreach ($inffin as $cod => $ii)
					 	@foreach ($infi as $nom => $iii)
					 	
					 	@if($iii==$ii)
					 	<option value="{{$ii}}" >{{$cod}} - año:{{$nom}}</option> 
					 	@endif
					 	
					 	@endforeach
					 	@endforeach
					 </select>
				</div>



				<div class="form-group">
					<label for="codigo">Código</label>
					<p class="text-uppercase col-auto text-left"><strong>Codigo: </strong> {{$grupo->codigo}}</p>
				</div>
				<div class="form-group">
					<p class="text-uppercase col-auto text-left"><strong>Nombre: </strong> {{$grupo->nombre}}</p>
				</div>
				

				<div class="form-group">
					<input type="submit" class="btn btn-primary" 
					value="Agregar Grupo">
				</div>

			</form>
		</dir>
	</dir>

<h1 class="text-center mb-5">GRUPOS</h1>
<div class="col-md-10 mx-auto bg-white p-3">
	<table class="table">
		<thead class="bg-primary text-light">
			<tr>
				<th scole="col">Codigo</th>
				<th scole="col">Nombre</th>
				
				<th scole="col">Balance General</th>
				<th scole="col">Acciones</th>
			</tr>
		</thead>
		<tbody>
			@foreach( $grupo as $sc )
			<tr>
				<td>{{$sc->codigo}}</td>
				<td>{{$sc->nombre}}</td>
				<td>trabajando aun xd</td>
				<td>
					
				</td>
			</tr> 
			@endforeach
		</tbody>
	</table>
</div>


@endsection