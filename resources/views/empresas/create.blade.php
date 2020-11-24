@extends('layouts.app')
@section('botones')
    <a href="{{ route('index') }}" class="btn btn-primary mr-2">Volver</a>
@endsection
@section('javascript')
    <script src="{{ asset('js/Eliminar.js') }}"></script>
    <script type="text/javascript">
        function deleteData(id) {
            var id = id;
            var url = '{{ route("empresas.destroy", ":id") }}';
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

    <h1 class="text-center mb-5">Crear Empresa</h1>
    {{-- Incluyendo el modal para eliminar un evento --}}
    @include('empresas.eliminarEmpresa')
    <!-- Mensaje de éxito al eliminar una empresa -->
    @if(session('info'))
        <script>
            swal({
                title: "{{session('info')}}",
                icon: "success",
            });
        </script>
    @endif
    <!-- Fin del mensaje de éxito al eliminar una empresa -->
    <!-- Mensaje de error al eliminar una empresa -->
    @if(session('error'))
        <script>
            swal({
                title: "{{session('error')}}",
                icon: "warning",
            });
        </script>
    @endif
    <!-- Fin del mensaje de error al eliminar una empresa -->

    <dir class="row justify-content-center mt-5">
        <dir class="col-md-8">
            <form method="POST" action="{{ route('empresas.store') }}" novalidate>
                @csrf

                <div class="form-group">
                    <label for="nombre">Nombre</label>
                    <input type="text"
                           name="nombre"
                           class="form-control @error('nombre') is-invalid @enderror" value="{{ old('nombre') }}"
                           id="nombre"
                           placeholder="Nombre de la Empresa"
                    />
                    @error('nombre') {{-- Error nombre de la empresa --}}
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="sector">Sector</label>
                    <input type="text"
                           name="sector"
                           class="form-control @error('sector') is-invalid @enderror" value="{{ old('sector') }}"
                           id="sector"
                           placeholder="Sector de la Empresa"
                    />
                    @error('sector') {{-- Error sector de la empresa --}}
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>


                <div class="form-group">
                    <input type="submit" class="btn btn-primary"
                           value="Agregar Empresa">
                </div>

            </form>
        </dir>
    </dir>

    <h1 class="text-center mb-5">EMPRESA</h1>
    <div class="col-md-10 mx-auto bg-white p-3">
        <table class="table">
            <thead class="bg-primary text-light">
            <tr>
                <th scole="col">Nombre</th>
                <th scole="col">Sector</th>
                <th scole="col">Acciones</th>
            </tr>
            </thead>
            <tbody>
            @foreach( $empresa as $e )
                <tr>
                    <td>{{$e->nombre}}</td>
                    <td>{{$e->sector}}</td>
                    <td>
                        <a href="{{ route('empresas.edit', ['empresa'=>$e->id]) }}"
                           class="btn btn-primary mr-2">Editar</a>
                            <!-- Botón de eliminar una empresa -->
                            <a href="javascript:;" data-toggle="modal" onclick="deleteData({{$e->id}})" data-target="#DeleteModal" class="btn btn-danger">
                                Eliminar
                            </a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>


@endsection
