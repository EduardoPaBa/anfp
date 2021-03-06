@extends('layouts.app')

@section('botones')
    <a href="{{ route('index') }}" class="btn btn-primary mr-2">Volver</a>
@endsection

@section('javascript')
    <script src="{{ asset('js/Eliminar.js') }}"></script>
    <script type="text/javascript">
        function deleteData(id) {
            var id = id;
            var url = '{{ route("clases.destroy", ":id") }}';
            url = url.replace(':id', id);
            $("#deleteForm").attr('action', url);
        }

        function formSubmit() {
            $("#deleteForm").submit();
        }
    </script>
    <!-- Librería para mostrar alertas -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
@endsection

@section('content')
    <h1 class="text-center mb-5">Crear Clase</h1>

    {{-- Incluyendo el modal para eliminar una clase --}}
    @include('clases.eliminarClase')
    <!-- Mensaje de éxito al eliminar una clase -->
    @if(session('info'))
        <script>
            swal({
                title: "{{session('info')}}",
                icon: "success",
            });
        </script>
    @endif
    <!-- Fin del mensaje de éxito al eliminar una clase -->
    <!-- Mensaje de error al eliminar una clase -->
    @if(session('error'))
        <script>
            swal({
                title: "{{session('error')}}",
                icon: "warning",
            });
        </script>
    @endif
    <!-- Fin del mensaje de error al eliminar una clase -->

    <dir class="row justify-content-center mt-5">
        <dir class="col-md-8">
            <form method="POST" action="{{ route('clases.store') }}" novalidate>
                @csrf

                <div class="form-group">
                    <label for="grupos">Grupo a la que pertenece</label>
                    <select
                        name="grupos"
                        class="form-control"
                        id="grupos"
                    >
                        @foreach($gr as $g)

                            @foreach($if as $i)

                                <?php
                                $x = "";
                                $y = "";
                                $x = "{$g->informefinancieros_id}";
                                $y = "{$i->id}";
                                ?>
                                x:{{$x}}
                                y:{{$y}}
                                <h1>fff</h1>
                                @if( $x == $y)
                                    <option value="{{$g->id}}">{{$g->codigo}} {{$g->nombre}} -- Balance al que
                                        pertenece: {{$i->nombre}} {{$i->anio}}</option>
                                @endif
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
                           placeholder="Código Clase"
                    />
                    @error('codigo') {{-- Error codigo de la clase --}}
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
                           placeholder="Nombre Clase"
                    />
                    @error('nombre') {{-- Error nombre de la clase --}}
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>


                <div class="form-group">
                    <input type="submit" class="btn btn-primary"
                           value="Agregar Clase">
                </div>

            </form>
        </dir>
    </dir>

    <h1 class="text-center mb-5">CLASES</h1>
    <div class="col-md-10 mx-auto bg-white p-3">
        <table class="table">
            <thead class="bg-primary text-light">
            <tr>
                <th scole="col">Codigo</th>
                <th scole="col">Nombre</th>

                <th scole="col">Grupo</th>
                <th scole="col">Acciones</th>
            </tr>
            </thead>
            <tbody>
            @foreach( $clase as $sc )
                <tr>
                    <td>{{$sc->codigo}}</td>
                    <td>{{$sc->nombre}}</td>
                    <?php
                    $grande;
                    $humilde;
                    ?>
                    @foreach($gr as $ch)
                        <?php
                        $grande = "{{$ch->id}}";
                        $n = "{{$ch->informefinancieros_id}}";
                        $humilde = "{{$sc->grupos_id}}";
                        ?>
                        @if( $grande == $humilde )
                            @foreach($if as $i)
                                <?php
                                $p = "{{$i->id}}";
                                ?>
                                @if($p==$n)
                                    <td>codigo grupo:{{$ch->codigo}} - Balance al que pertenece:{{$i->nombre}}
                                        anio{{$i->anio}}</td>
                                @endif
                            @endforeach
                        @endif
                    @endforeach

                    <td>
                        <a href="{{ route('clases.edit', ['clase'=>$sc->id]) }}" class="btn btn-primary mr-2">Editar</a>
                        <!-- Botón de eliminar una clase -->
                        <a href="javascript:;" data-toggle="modal" onclick="deleteData({{$sc->id}})" data-target="#DeleteModal" class="btn btn-danger">
                            Eliminar
                        </a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

@endsection
