@extends('layouts.app')

@section('botones')
<a href="{{ route('index') }}" class="btn btn-primary mr-2">Volver</a>
@endsection


@section('content')
	<h1 class="text-center mb-5">Crear Cuentas</h1>

	<dir class="row justify-content-center mt-5">
		<dir class="col-md-8">
			<form method="POST" action="{{ route('cuentas.store') }}" novalidate>
				@csrf

				<div class="form-group">
					 <label for="clases">Clase a la que pertenece</label>
					 <select 
					 	name="clases"
					 	class="form-control"
					 	id="clases"
					 >					 
					 	@foreach ($cl as $c )
					 	@foreach ($gr as $g)
					 	@foreach ($if as $i )

					 	<?php
					 	//$claseFK="{}";
					 	//	$claseID="{}";

					 	$grupoFK="{$c->grupos_id}";
					 	$grupoID="{$g->id}";

					 	$infiFK="{$g->informefinancieros_id}";
					 	$infiID="{$i->id}";
					 	?>
					 	
					 	@if($grupoFK==$grupoID && $infiFK==$infiID)
					 	<option value="{{$c->id}}" >{{$c->codigo}} {{$c->nombre}} - balance: {{$i->nombre}} anio:{{$i->anio}}</option> 
					 	@endif

					 	@endforeach
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
						placeholder="Código Cuenta"
					/>
				</div>
				<div class="form-group">
					<label for="nombre">Nombre</label>
					<input type="text" 
						name="nombre" 
						class="form-control" 
						id="nombre"
						placeholder="Nombre Cuenta"
					/>
				</div>
				<div class="form-group">
					<label for="valor">Valor</label>
					<input type="text" 
						name="valor" 
						class="form-control" 
						id="valor"
						placeholder="Valor Cuenta"
					/>
				</div>

				<div class="form-group">
					<input type="submit" name="submit" class="btn btn-primary" 
					value="Agregar Cuenta">
				</div>

			</form>
		</dir>
	</dir>

<h1 class="text-center mb-5">CUENTAS</h1>
<div class="col-md-10 mx-auto bg-white p-3">
	<table class="table">
		<thead class="bg-primary text-light">
			<tr>
				<th scole="col">Codigo</th>
				<th scole="col">Nombre</th>
				<th scole="col">Valor</th>
				<th scole="col">Clase</th>
				<th scole="col">Acciones</th>
			</tr>
		</thead>
		<tbody>
			@foreach( $cuenta as $sc )
			<tr>
				<td>{{$sc->codigo}}</td>
				<td>{{$sc->nombre}}</td>
				<td>{{$sc->valor}}</td>
				<?php 
				$grande; 
				$humilde; 
				?>
				@foreach($cl as $ch)
					<?php 
						$grande="{{$ch->id}}";
						$humilde="{{$sc->clases_id}}";
					?>
					@if( $grande == $humilde )
						

						@foreach ($gr as $g)
					 	@foreach ($if as $i )

					 	<?php
					 	//$claseFK="{}";
					 	//	$claseID="{}";

					 	$grupoFK="{$ch->grupos_id}";
					 	$grupoID="{$g->id}";

					 	$infiFK="{$g->informefinancieros_id}";
					 	$infiID="{$i->id}";
					 	?>
					 	
					 	@if($grupoFK==$grupoID && $infiFK==$infiID)
						<td>{{$ch->codigo}} {{$ch->nombre}} - balance: {{$i->nombre}} anio: {{$i->anio}}</td>
					 	@endif

					 	@endforeach
					 	@endforeach



					@endif
				@endforeach
					

				<td>
					<a href="{{ route('cuentas.edit', ['cuenta'=>$sc->id]) }}"class="btn btn-primary mr-2">Editar</a>
				
					<form action="{{ route('cuentas.destroy', ['cuenta'=>$sc->id]) }}" method="POST" id="miFormulario">
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

@section('javascript')
		<script src="{{ asset('js/Eliminar.js') }}"></script>
@endsection