@extends('layouts.app')


@section('estilo')

@endsection


@section('javascript')

@endsection


@section('content')

<form method="POST" action="{{ route('ratio.index') }}" >
@csrf
<h1>DETALLE RATIO</h1>
<h2>Primer Año</h2>
<select class="" id="informe1">
	@foreach($informe as $i)
		<option>{{ $i->id }} - {{ $i->nombre }} - {{ $i->anio }}</option>
	@endforeach
</select>
<br>
<br>
<h2>Segundo Año</h2>
<select id="informe2">
	@foreach($informe as $i)
		<option>{{ $i->id }} - {{ $i->nombre }} - {{ $i->anio }}</option>
	@endforeach
</select>

<button id="submit">Enviar</button>
</form>

@endsection

