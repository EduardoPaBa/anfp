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
            <select class="form-control @error('informe1') is-invalid @enderror" id="informe1" name="informe1">
                <option value="">Seleccione el primer año</option>
                @foreach($informe as $i)
                    <option value="{{ $i->id }}">{{ $i->nombre }} - año:{{ $i->anio }}</option>
                @endforeach
            </select>
            @error('informe1') {{-- Error balance general del primer año --}}
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
            <br>
            <br>
            <h3>Balance General y Estado de Resultados</h3>
            <select id="informe2" name="informe2" class="form-control @error('informe2') is-invalid @enderror">
                <option value="">Seleccione el segundo año</option>
                @foreach($informe as $i)
                    <option value="{{ $i->id }}">{{ $i->nombre }} - año:{{ $i->anio }}</option>
                @endforeach
            </select>
            @error('informe2') {{-- Error balance general del segundo año --}}
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
            <br>
            <button class="btn btn-primary" type="submit" value="Ver Ratios">Ver Ratios</button>
        </form>
    </div>
@endsection

