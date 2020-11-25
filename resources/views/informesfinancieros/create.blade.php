@extends('layouts.app')
@section('botones')
    <a href="{{ route('index') }}" class="btn btn-primary mr-2">Volver</a>
@endsection
@section('javascript')
    <script src="{{ asset('js/Eliminar.js') }}"></script>
    <script type="text/javascript">
        function deleteData(id) {
            var id = id;
            var url = '{{ route("informefinancieros.destroy", ":id") }}';
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
    <h1 class="text-center mb-5">Crear Blance General</h1>

    {{-- Incluyendo el modal para eliminar un informe financiero --}}
    @include('informesfinancieros.eliminarInformeFinanciero')
    <!-- Mensaje de éxito al eliminar un informe financiero -->
    @if(session('info'))
        <script>
            swal({
                title: "{{session('info')}}",
                icon: "success",
            });
        </script>
    @endif
    <!-- Fin del mensaje de éxito al eliminar un informe financiero -->
    <!-- Mensaje de error al eliminar un informe financiero -->
    @if(session('error'))
        <script>
            swal({
                title: "{{session('error')}}",
                icon: "warning",
            });
        </script>
    @endif
    <!-- Fin del mensaje de error al eliminar un informe financiero -->

    <dir class="row justify-content-center mt-5">
        <dir class="col-md-8">
            <form method="POST" action="{{ route('informefinancieros.store') }}" novalidate>
                @csrf

                <div class="form-group">
                    <label for="empresas">Empresa a la que pertenece</label>
                    <select
                        name="empresas"
                        class="form-control"
                        id="empresas"
                    >
                        @foreach ($emp as $em)
                            <option value="{{$em->id}}"> {{$em->id}} {{$em->nombre}} {{$em->sector}} </option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="nombre">Nombre</label>
                    <input type="text"
                           name="nombre"
                           class="form-control @error('nombre') is-invalid @enderror" value="{{ old('nombre') }}"
                           id="nombre"
                           placeholder="Nombre del Balance General"
                    />
                    @error('nombre') {{-- Error nombre del balance general de la empresa --}}
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="anio">Año</label>
                    <input type="text"
                           name="anio"
                           class="form-control @error('anio') is-invalid @enderror" value="{{ old('anio') }}"
                           id="anio"
                           placeholder="Año del Balance General"
                    />
                    @error('anio') {{-- Error año del balance general la empresa --}}
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-primary"
                           value="Agregar Balance General">
                </div>
            </form>
        </dir>
    </dir>

    <h1 class="text-center mb-5">INFORMES FINANCIEROS</h1>
    <div class="col-md-10 mx-auto bg-white p-3">
        <table class="table">
            <thead class="bg-primary text-light">
            <tr>
                <th scole="col">Nombre</th>
                <th scole="col">Año</th>
                <th scole="cole">Empresa</th>
                <th scole="col">Acciones</th>
            </tr>
            </thead>
            <tbody>
            @foreach( $if as $inf )
                <tr>
                    <td>{{$inf->nombre}}</td>
                    <td>{{$inf->anio}}</td>
                    @foreach($e as $empresas)
                        <?php
                        $afuera = "{{$empresas->id}}";
                        $misma = "{{$inf->empresas_id}}";
                        ?>
                        @if( $afuera == $misma )
                            <td>{{$empresas->nombre}}</td>
                        @endif
                    @endforeach
                    <td>
                        <a href="{{ route('informefinancieros.edit', ['informefinanciero'=>$inf->id]) }}"
                           class="btn btn-primary mr-2">Editar</a>
                        <!-- Botón de eliminar un informe financiero -->
                        <a href="javascript:;" data-toggle="modal" onclick="deleteData({{$inf->id}})" data-target="#DeleteModal" class="btn btn-danger">
                            Eliminar
                        </a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>


@endsection
