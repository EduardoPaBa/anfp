@extends('layouts.app')

@section('botones')
<a href="{{ route('cuentas.create') }}" class="btn btn-primary mr-2">Volver</a>
@endsection


@section('content')
	<h1 class="text-center mb-5">Editar Cuentas</h1>

	<dir class="row justify-content-center mt-5">
		<dir class="col-md-8">
			<form method="POST" action="{{ route('cuentas.update', $cuenta) }}" novalidate>
				@csrf
				@method('PUT')

				<div class="form-group">
					 <label for="clases">Clase a la que pertenece</label>
					 <input type="text"
						name="codigo"
						class="form-control"
						id="codigo"
						placeholder="Código Cuenta"
						disabled="true"
						value="{{ $cuenta->clases_id }}"
					/>
				</div>

				<div class="form-group">
					<label for="codigo">Código</label>
					<input type="text"
						name="codigo"
                           class="form-control @error('codigo') is-invalid @enderror"
                           @if($errors->any()) value="{{ old('codigo') }}"
                           @else value="{{ $cuenta->codigo }}" @endif
						id="codigo"
						placeholder="Código Cuenta"
						value="{{ $cuenta->codigo }}"
					/>
                    @error('codigo') {{-- Error codigo de la cuenta --}}
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
                           @else value="{{ $cuenta->nombre }}" @endif
						id="nombre"
						placeholder="Nombre Cuenta"
						value="{{ $cuenta->nombre }}"
					/>
                    @error('nombre') {{-- Error nombre de la cuenta --}}
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
                           @else value="{{ $cuenta->valor }}" @endif
                           id="valor"
						placeholder="Valor Cuenta"
						value="{{ $cuenta->valor }}"
					/>
                    @error('valor') {{-- Error valor de la cuenta --}}
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
				</div>

				<div class="form-group">
					<input type="submit" name="submit" class="btn btn-primary"
					value="Agregar Cuenta">
				</div>

			</form>
		</dir>
	</dir>

@endsection
