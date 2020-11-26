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
<a href="{{ route('analisis.balancegeneral') }}" class="btn btn-primary mr-2">Balance General</a>
<!--
<a href="{{ route('analisis.ratios') }}" class="btn btn-primary mr-2">Ratios</a>
-->
<a href="{{ route('analisis.detalleratio') }}" class="btn btn-primary mr-2">Detalle Ratios</a>
<a href="{{ route('analisis.detalleConclusion') }}" class="btn btn-primary mr-2">Conclusion Ratios</a>
<a href="{{ route('estadoresultados.index') }}" class="btn btn-primary mr-2">Estado de Resultados</a>
<a href="{{ route('detalleah.index') }}" class="btn btn-primary mr-2">Analisis Horizontal</a>
<a href="{{ route('analisisvertical.index') }}" class="btn btn-primary mr-2">Analisis Vertical</a>
<br>
<br>
<a href="{{ route('print')}}" class="btn btn-primary mr-2">pdf</a>
@endsection
