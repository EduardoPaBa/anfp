@extends('layouts.app')

@section('botones')
<a href="{{ route('empresas.create') }}" class="btn btn-primary mr-2">Empresas</a>
<a href="{{ route('informefinancieros.create') }}" class="btn btn-primary mr-2">Informes Financieros</a>

<br>
<br>

<a href="{{ route('grupos.create') }}" class="btn btn-primary mr-2">Crear nuevo Grupo</a>
<a href="{{ route('clases.create') }}" class="btn btn-primary mr-2">Crear nueva Clase</a>
<a href="{{ route('cuentas.create') }}" class="btn btn-primary mr-2">Crear nueva Cuenta</a>
<a href="{{ route('sub_cuentas.create') }}" class="btn btn-primary mr-2">Crear nueva Sub Cuenta</a>
<br>
<br>
<a href="{{ route('analisis.balancegeneral') }}" class="btn btn-primary mr-2">Ver Balance General</a>



@endsection




@section('content')
<h1 class="text-center mb-5">PAPÁ</h1>
<div class="col-md-10 mx-auto bg-white p-3">
	<table class="table">
		<thead class="bg-primary text-light">
			<tr>
				<th scole="col">Codigo</th>
				<th scole="col">Nombre</th>
				<th scole="col">Valor</th>
				<th scole="col">Acciones</th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td>1.1.10</td>
				<td>Cuentas por cobrar</td>
				<td>5120</td>
				<td></td>
			</tr>
		</tbody>
	</table>
</div>
@endsection