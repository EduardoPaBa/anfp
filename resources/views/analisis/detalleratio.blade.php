@extends('layouts.app')


@section('estilo')

@endsection


@section('javascript')

@endsection


@section('content')
<div class="row justify-content-center mt-5">
    <form method="POST" action="{{ route('ratiosPrueba.store') }}">
        @csrf
        <h1 class="text-center"><u>DETALLE RATIO</u></h1>
        <br>
        <h1 class="text-center mb-5">Seleccione los años a comparar</h1>
        <h3>Balance General y Estado de Resultados</h3>
        <select class="form-control" id="informe1" name="informe1">
                <option>Seleccione el primer año</option>
            @foreach($informe as $i)
                <option value="{{ $i->id }}">{{ $i->nombre }} - año:{{ $i->anio }}</option>
            @endforeach
        </select>
        <br>
        <br>
        <h3>Balance General y Estado de Resultados</h3>
        <select id="informe2" name="informe2" class="form-control">
                <option>Seleccione el segundo año</option>
            @foreach($informe as $i)
                <option value="{{ $i->id }}">{{ $i->nombre }} - año:{{ $i->anio }}</option>
            @endforeach
        </select>
        <br>
        <input class="btn btn-primary" type="submit" value="Ver Ratios">
    </form>
</div>
@endsection

