@extends('layouts.app')

@section('botones')
<a href="{{ route('index') }}" class="btn btn-primary mr-2">Volver</a>
@endsection


@section('content')
	<h1 class="text-center mb-5">Crear Grupo</h1>

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
					<input type="text" 
						name="codigo" 
						class="form-control" 
						id="codigo"
						placeholder="Código Grupo"
					/>
				</div>
				<div class="form-group">
					<label for="nombre">Nombre</label>
					<input type="text" 
						name="nombre" 
						class="form-control" 
						id="nombre"
						placeholder="Nombre Grupo"
					/>
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
				@foreach($ifs as $ch)
					@php 
						$grande="{{$ch->id}}";
						$humilde="{{$sc->informefinancieros_id}}";
					@endphp
					@if( $grande == $humilde )
						<td>{{$ch->nombre}}</td>
					@endif
				@endforeach				<td>
					<a href="{{ route('grupos.edit', ['grupo'=>$sc->id]) }}"class="btn btn-primary mr-2">Editar</a>
				
					<form action="{{ route('grupos.destroy', ['grupo'=>$sc->id]) }}" method="POST">
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