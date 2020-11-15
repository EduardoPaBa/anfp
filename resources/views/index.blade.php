@extends('layouts.app')

@section('head')
@endsection

@section('estilo')
	<link href="{{ asset('css/seleccion.css') }}" rel="stylesheet">
@endsection
@section('javascript')
	<script src="{{ asset('js/seleccion.js') }}"></script>
@endsection

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
<a href="{{ route('analisis.ratios') }}" class="btn btn-primary mr-2">Ratios</a>
<a href="{{ route('analisis.estadoresultados') }}" class="btn btn-primary mr-2">Estado de Resultados</a>
<a href="{{ route('analisishorizontal.index') }}" class="btn btn-primary mr-2">Analisis Horizontal</a>

@endsection

@section('content')
<h1 class="text-center mb-5">HUMILDE</h1>
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
			<tr>
				<td>1.1.10</td>
				<td>Cuentas por cobrar</td>
				<td>5120</td>
				<td></td>
			</tr>
			<tr>
				<td>1.1.10</td>
				<td>Cuentas por pagar</td>
				<td>120</td>
				<td></td>
			</tr>
		</tbody>
	</table>
</div>

<a href=""><input type="text" name="codigo" id="codigo"></a>
@endsection
