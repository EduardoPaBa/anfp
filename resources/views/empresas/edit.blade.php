@extends('layouts.app')
@section('botones')
<a href="{{ route('empresas.create') }}" class="btn btn-primary mr-2">Volver</a>
@endsection
@section('content')

<h1 class="text-center mb-5">Editar Empresa</h1>

	<dir class="row justify-content-center mt-5">
		<dir class="col-md-8">
			<form method="POST" action="{{ route('empresas.update', $empresa) }}">
				@csrf
				@method('PATCH')

				<div class="form-group">
					<label for="nombre">Nombre</label>
					<input type="text"
						name="nombre"
						class="form-control @error('nombre') is-invalid @enderror"
                           @if($errors->any()) value="{{ old('nombre') }}"
                           @else value="{{ $empresa->nombre }}" @endif
						id="nombre"
						placeholder="Nombre de la Empresa"
						value="{{ $empresa->nombre }}"
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
						class="form-control @error('sector') is-invalid @enderror"
                           @if($errors->any()) value="{{ old('sector') }}"
                           @else value="{{ $empresa->sector }}" @endif
						id="sector"
						placeholder="Sector de la Empresa"
						value="{{ $empresa->sector }}"
					/>
                    @error('sector') {{-- Error sector de la empresa --}}
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
				</div>


				<div class="form-group">
					<input type="submit" class="btn btn-primary"
					value="Actualizar Empresa">
				</div>

			</form>
		</dir>
	</dir>




@endsection
