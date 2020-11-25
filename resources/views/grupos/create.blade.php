@extends('layouts.app')

@section('botones')
    <a href="{{ route('index') }}" class="btn btn-primary mr-2">Volver</a>
@endsection
@section('javascript')
    <script src="{{ asset('js/Eliminar.js') }}"></script>
    <script type="text/javascript">
        function deleteData(id) {
            var id = id;
            var url = '{{ route("grupos.destroy", ":id") }}';
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
    <h1 class="text-center mb-5">Crear Grupo</h1>

    {{-- Incluyendo el modal para eliminar un grupo --}}
    @include('grupos.eliminarGrupo')
    <!-- Mensaje de éxito al eliminar un grupo -->
    @if(session('info'))
        <script>
            swal({
                title: "{{session('info')}}",
                icon: "success",
            });
        </script>
    @endif
    <!-- Fin del mensaje de éxito al eliminar un grupo -->
    <!-- Mensaje de error al eliminar un grupo -->
    @if(session('error'))
        <script>
            swal({
                title: "{{session('error')}}",
                icon: "warning",
            });
        </script>
    @endif
    <!-- Fin del mensaje de error al eliminar un grupo -->

    <dir class="row justify-content-center mt-5">
        <dir class="col-md-8">
            <form method="POST" action="{{ route('grupos.store') }}" novalidate>
                @csrf
                <div class="form-group">
                    <label for="bg">Balance General al que pertenece</label>
                    <select
                        name="bg"
                        class="form-control"
                        id="bg"
                    >

                        @foreach ($ifs as $i)


                            <option value="{{$i->id}}">{{$i->nombre}} - año:{{$i->anio}}</option>



                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="codigo">Código</label>
                    <input type="text"
                           name="codigo"
                           class="form-control @error('codigo') is-invalid @enderror" value="{{ old('codigo') }}"
                           id="codigo"
                           placeholder="Código Grupo"
                    />
                    @error('codigo') {{-- Error codigo del grupo --}}
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
                           placeholder="Nombre Grupo"
                    />
                    @error('nombre') {{-- Error nombre del grupo --}}
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="form-group">
                    <input type="submit" class="btn btn-primary"
                           value="Agregar Grupo">
                </div>

            </form>
        </dir>
    </dir>

    <h1 class="text-center mb-5">GRUPOS</h1>
    <div class="col-md-10 mx-auto bg-white p-3">
        <table class="table">
            <thead class="bg-primary text-light">
            <tr>
                <th scole="col">Codigo</th>
                <th scole="col">Nombre</th>

                <th scole="col">Balance General</th>
                <th scole="col">Acciones</th>
            </tr>
            </thead>
            <tbody>
            @foreach( $grupo as $sc )
                <tr>
                    <td>{{$sc->codigo}}</td>
                    <td>{{$sc->nombre}}</td>
                    @foreach($ifs as $ch)
                        @php
                            $grande="{{$ch->id}}";
                            $humilde="{{$sc->informefinancieros_id}}";
                        @endphp
                        @if( $grande == $humilde )
                            <td>{{$ch->nombre}} año: {{$ch->anio}}</td>
                        @endif
                    @endforeach
                    <td>
                        <a href="{{ route('grupos.edit', ['grupo'=>$sc->id]) }}" class="btn btn-primary mr-2">Editar</a>
                        <!-- Botón de eliminar un grupo -->
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
