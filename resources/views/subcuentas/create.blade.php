@extends('layouts.app')

@section('botones')
    <a href="{{ route('index') }}" class="btn btn-primary mr-2">Volver</a>
@endsection
@section('javascript')
    <script src="{{ asset('js/Eliminar.js') }}"></script>
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
                                        $claseFK = "{$cu->clases_id}";
                                        $claseID = "{$c->id}";

                                        $grupoFK = "{$c->grupos_id}";
                                        $grupoID = "{$g->id}";

                                        $infiFK = "{$g->informefinancieros_id}";
                                        $infiID = "{$i->id}";
                                        ?>

                                        @if($grupoFK==$grupoID && $infiFK==$infiID && $claseFK==$claseID)
                                            <option value="{{$cu->id}}">{{$cu->codigo}} {{$cu->nombre}} -
                                                balance: {{$i->nombre}} anio: {{$i->anio}}</option>
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
                           class="form-control @error('codigo') is-invalid @enderror" value="{{ old('codigo') }}"
                           id="codigo"
                           placeholder="Código SubCuenta"
                    />
                    @error('codigo') {{-- Error codigo de la subcuenta --}}
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="nombre">Nombre</label>
                    <input type="text"
                           name="nombre"
                           class="form-control @error('nombre') is-invalid @enderror" value="{{ old('nombre') }}"
                           id="nombre"
                           placeholder="Nombre SubCuenta"
                    />
                    @error('nombre') {{-- Error nombre de la subcuenta --}}
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="valor">Valor</label>
                    <input type="text"
                           name="valor"
                           class="form-control @error('valor') is-invalid @enderror" value="{{ old('valor') }}"
                           id="valor"
                           placeholder="Valor SubCuenta"
                    />
                    @error('valor') {{-- Error valor de la subcuenta --}}
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
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


                            @foreach ($gr as $g)
                                @foreach ($if as $i )
                                    @foreach($cl as $c)

                                        <?php
                                        $claseFK = "{$ch->clases_id}";
                                        $claseID = "{$c->id}";

                                        $grupoFK = "{$c->grupos_id}";
                                        $grupoID = "{$g->id}";

                                        $infiFK = "{$g->informefinancieros_id}";
                                        $infiID = "{$i->id}";
                                        ?>
                                        @if($grupoFK==$grupoID && $infiFK==$infiID && $claseFK==$claseID)
                                            <td>{{$ch->codigo}} {{$ch->nombre}} - balance: {{$i->nombre}}
                                                anio: {{$i->anio}}</td>
                                        @endif
                                    @endforeach
                                @endforeach
                            @endforeach


                        @endif
                    @endforeach

                    <td>
                        <a href="{{ route('sub_cuentas.edit', ['sub_cuenta'=>$sc->id]) }}" class="btn btn-primary mr-2">Editar</a>

                        <form action="{{ route('sub_cuentas.destroy', ['sub_cuenta'=>$sc->id]) }}" method="POST"
                              id="miFormulario">
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
