@extends('layouts.app')

@section('botones')
<a href="{{ route('index') }}" class="btn btn-primary mr-2">Volver</a>
@endsection


@section('content')
	<h1 class="text-center mb-5">Crear Sub Cuentas</h1>


	<dir class="row justify-content-center mt-5">
		<dir class="col-md-8">
			<form method="POST" action="{{ route('sub_cuentas.store') }}" novalidate>
				@csrf
				<div class="form-group">
					 <label for="cuentas">Cuenta a la que pertenece</label>
					 <select 
					 	name="cuentas"
					 	class="form-control"
					 	id="cuentas"
					 >
					 	@foreach ($cuenhumilde as $cu)
					 	@foreach ($cl as $c )
					 	@foreach ($gr as $g)
					 	@foreach ($if as $i )
					 	<?php
					 	$claseFK="{$cu->clases_id}";
					 	$claseID="{$c->id}";

					 	$grupoFK="{$c->grupos_id}";
					 	$grupoID="{$g->id}";

					 	$infiFK="{$g->informefinancieros_id}";
					 	$infiID="{$i->id}";
					 	?>
					 	
					 	@if($grupoFK==$grupoID && $infiFK==$infiID && $claseFK==$claseID)
					 	<option value="{{$cu->id}}" >/*CODIGO: {{$cu->codigo}}*\  -  */BALANCE: {{$i->nombre}}\* - /*CUENTA: {{$cu->nombre}}*\  </option> 
					 	@endif
					 	
					 	@endforeach
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
						placeholder="Código SubCuenta"
					/>
				</div>
				<div class="form-group">
					<label for="nombre">Nombre</label>
					<input type="text" 
						name="nombre" 
						class="form-control" 
						id="nombre"
						placeholder="Nombre SubCuenta"
					/>
				</div>
				<div class="form-group">
					<label for="valor">Valor</label>
					<input type="text" 
						name="valor" 
						class="form-control" 
						id="valor"
						placeholder="Valor SubCuenta"
					/>
				</div>

				<div class="form-group">
					<input type="submit" class="btn btn-primary" 
					value="Agregar Sub Cuenta">
				</div>

			</form>
		</dir>
	</dir>

<h1 class="text-center mb-5">SUB CUENTAS</h1>
<div class="col-md-10 mx-auto bg-white p-3">
	<table class="table">
		<thead class="bg-primary text-light">
			<tr>
				<th scole="col">Codigo</th>
				<th scole="col">Nombre</th>
				<th scole="col">Valor</th>
				<th scole="col">Cuenta</th>
				<th scole="col">Acciones</th>
			</tr>
		</thead>
		<tbody>
			@foreach( $subcu as $sc )
			<tr>
				<td>{{$sc->codigo}}</td>
				<td>{{$sc->nombre}}</td>
				<td>{{$sc->valor}}</td>
				
				@foreach($cuenhumilde as $ch)
					@php 
						$grande="{{$ch->id}}";
						$humilde="{{$sc->cuentas_id}}";
					@endphp
					@if( $grande == $humilde )
						<td>{{$ch->codigo}}</td>
					@endif
				@endforeach

				<td>
					<a href="{{ route('sub_cuentas.edit', ['sub_cuenta'=>$sc->id]) }}"class="btn btn-primary mr-2">Editar</a>
				
					<form action="{{ route('sub_cuentas.destroy', ['sub_cuenta'=>$sc->id]) }}" method="POST">
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