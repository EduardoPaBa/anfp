@extends('layouts.app')


@section('estilo')

@endsection


@section('javascript')

@endsection


@section('content')
<div class="row justify-content-center mt-5">
    <form method="POST" action="{{ route('ratiosConclusion.store') }}">
        @csrf
        <h1 class="text-center"><u>CONCLUSION DE RATIOS</u></h1>
        <br>
        <h1 class="text-center mb-5">Seleccione los años a comparar</h1>
        <h3>Balance General y Estado de Resultados de la Primer Empresa</h3>
        <select class="form-control" id="informe1" name="informe1">
            @foreach($informe as $i)
                <option value="{{ $i->iid }}">Empresa: {{ $i->enombre }} - Sector: {{ $i->esector }} - Balance: {{ $i->inombre }} - año:{{ $i->ianio }}</option>
            @endforeach
        </select>
        <br>
        <br>
        <h3>Balance General y Estado de Resultados de la Segunda Empresa</h3>
        <select id="informe2" name="informe2" class="form-control">
            @foreach($informe as $i)
                <option value="{{ $i->iid }}">Empresa: {{ $i->enombre }} - Sector: {{ $i->esector }} - Balance: {{ $i->inombre }} - año:{{ $i->ianio }}</option>
            @endforeach
        </select>
        <br>
        <input class="btn btn-primary" type="submit" value="Ver Ratios">
    </form>
</div>
@endsection

