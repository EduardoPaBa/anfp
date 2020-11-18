	@extends('layouts.app')
	@section('botones')
	<a href="{{ route('index') }}" class="btn btn-primary mr-2">Volver</a>
	@endsection
	@section('content')
		<h1 class="text-center mb-5">Seleccione los años a comparar</h1>
	<dir class="row justify-content-center mt-5">
		<dir class="col-md-8">
			<form method="POST" action="{{ route('detalleah.store') }}" novalidate>
				@csrf
				{{ csrf_field() }}
				<div class="form-group">


					 <label for="bg1">Balance General año uno</label>
					 <select 
					 	name="bg1"
					 	class="form-control"
					 	id="bg1"
					 >
					 	@foreach ($infin as $i)					 						 	
					 	<option value="{{$i->id}}" >{{$i->nombre}} - año:{{$i->anio}}</option> 
					 	<?php//  $bg1 ="{$i->id}";?>
					 	@endforeach
					 </select>


					 <label for="bg2">Balance General año dos</label>
					 <select 
					 	name="bg2"
					 	class="form-control"
					 	id="bg2"
					 >					 	
					 	@foreach ($infin as $ii)					 						 	
					 	<option value="{{$ii->id}}" >{{$ii->nombre}} - año:{{$ii->anio}}</option>
					 	@endforeach
					 </select>
				</div>
				<div class="form-group">
					<input type="submit" class="btn btn-primary" 
					value="Ver Analisis Horizontal">	
				</div>
			</form>
		</dir>
	</dir>

	@endsection