@extends('layouts.app')

@section('botones')
    <a href="{{ route('sub_cuentas.create') }}" class="btn btn-primary mr-2">Volver</a>
@endsection


@section('content')
    <h1 class="text-center mb-5">Editar Sub Cuentas</h1>


    <dir class="row justify-content-center mt-5">
        <dir class="col-md-8">
            <form method="POST" action="{{ route('sub_cuentas.update', $subCuenta) }}" novalidate>
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="cuentas">Cuenta a la que pertenece</label>
                    <input type="text"
                           name="cuenta"
                           class="form-control"
                           id="cuenta"
                           placeholder="Cuenta"
                           disabled="true"
                           value="{{ $subCuenta->cuentas_id }}"
                    />
                </div>

                <div class="form-group">
                    <label for="codigo">Código</label>
                    <input type="text"
                           name="codigo"
                           class="form-control @error('codigo') is-invalid @enderror"
                           @if($errors->any()) value="{{ old('codigo') }}"
                           @else value="{{ $subCuenta->codigo }}" @endif
                           id="codigo"
                           placeholder="Código SubCuenta"
                           value="{{ $subCuenta->codigo }}"
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
                           class="form-control @error('nombre') is-invalid @enderror"
                           @if($errors->any()) value="{{ old('nombre') }}"
                           @else value="{{ $subCuenta->nombre }}" @endif
                           id="nombre"
                           placeholder="Nombre SubCuenta"
                           value="{{ $subCuenta->nombre }}"
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
                           class="form-control @error('valor') is-invalid @enderror"
                           @if($errors->any()) value="{{ old('valor') }}"
                           @else value="{{ $subCuenta->valor }}" @endif
                           id="valor"
                           placeholder="Valor SubCuenta"
                           value="{{ $subCuenta->valor }}"
                    />
                    @error('valor') {{-- Error valor de la subcuenta --}}
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>

                <div class="form-group">
                    <input type="submit" class="btn btn-primary"
                           value="Actualizar Sub Cuenta">
                </div>

            </form>
        </dir>
    </dir>

@endsection
