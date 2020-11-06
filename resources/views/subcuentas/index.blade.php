@extends('layouts.app')

@section('botones')

<a href="{{ route('index') }}" class="btn btn-primary mr-2">Volver</a>
@endsection


@section('content')
<h1 class="text-center mb-5">Sub Cuentas</h1>
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