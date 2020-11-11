@extends('layouts.app')

@section('botones')
<a href="{{ route('index') }}" class="btn btn-primary mr-2">Volver</a>
@endsection


@section('content')
	<h1 class="text-center mb-5">Crear Clase</h1>

	<dir class="row justify-content-center mt-5">
		<dir class="col-md-8">
			<form method="POST" action="{{ route('clases.store') }}" novalidate>
				@csrf

				<div class="form-group">
					 <label for="grupos">Grupo a la que pertenece</label>
					 <select 
					 	name="grupos"
					 	class="form-control"
					 	id="grupos"
					 >
					 

					 	@foreach ($grupo as $cod => $ii)
					 	@foreach ($gru as $nom => $iii)
					 	@if($iii==$ii)
					 	<option value="{{$ii}}" >{{$cod}} {{$nom}}</option> 
					 	@endif
					 	@endforeach
					 	@endforeach
					 </select>
				</div>

				<div class="form-group">
					<label for="codigo">Código</label>
					<input type="text" 
						name="codigo" 
						class="form-control" 
						id="codigo"
						placeholder="Código Clase"
					/>
				</div>
				<div class="form-group">
					<label for="nombre">Nombre</label>
					<input type="text" 
						name="nombre" 
						class="form-control" 
						id="nombre"
						placeholder="Nombre Clase"
					/>
				</div>
			

				<div class="form-group">
					<input type="submit" class="btn btn-primary" 
					value="Agregar Clase">
				</div>

			</form>
		</dir>
	</dir>

<h1 class="text-center mb-5">CLASES</h1>
<div class="col-md-10 mx-auto bg-white p-3">
	<table class="table">
		<thead class="bg-primary text-light">
			<tr>
				<th scole="col">Codigo</th>
				<th scole="col">Nombre</th>
				
				<th scole="col">Grupo</th>
				<th scole="col">Acciones</th>
			</tr>
		</thead>
		<tbody>
			@foreach( $clase as $sc )
			<tr>
				<td>{{$sc->codigo}}</td>
				<td>{{$sc->nombre}}</td>
				
				<?php 
				$grande; 
				$humilde; 
				?>
				@foreach($gr as $ch)
					<?php 
						$grande="{{$ch->id}}";
						$humilde="{{$sc->grupos_id}}";
					?>
					@if( $grande == $humilde )
						<td>{{$ch->codigo}}</td>
					@endif
				@endforeach

				<td>
					<a href="{{ route('clases.edit', ['clase'=>$sc->id]) }}"class="btn btn-primary mr-2">Editar</a>
				
					<form action="{{ route('clases.destroy', ['clase'=>$sc->id]) }}" method="POST">
						@csrf
						@method('DELETE')
						<input type="submit" name="Eliminar" class="btn btn-danger" value="Eliminar">
					</form>
				</td>
			</tr> 
			@endforeach
		</tbody>
	</table>
</div>

@endsection