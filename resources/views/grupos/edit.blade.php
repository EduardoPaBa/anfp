@extends('layouts.app')

@section('botones')
<a href="{{ route('grupos.create') }}" class="btn btn-primary mr-2">Volver</a>
@endsection

@section('content')

<h1 class="text-center mb-5">Editar Grupo</h1>

	<dir class="row justify-content-center mt-5">
		<dir class="col-md-8">

			<form method="POST" action="{{ route('grupos.update', $grupo ) }}" novalidate>

				@csrf
				@method('PUT')


				<div class="form-group">
					 <label for="bg">Balance General al que pertenece</label>
					 <input type="text" name="bg" class="form-control"
						id="bg"
						placeholder="Balance General"
						disabled="true" value="{{ $grupo->informefinancieros_id }}" />
				</div>


				<div class="form-group">
					<label for="codigo">Código</label>
					<input type="text"
						name="codigo"
                           class="form-control @error('codigo') is-invalid @enderror"
                           @if($errors->any()) value="{{ old('codigo') }}"
                           @else value="{{ $grupo->codigo }}" @endif
						id="codigo"
						placeholder="Código Grupo"
						value="{{ $grupo->codigo }}"
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
                           class="form-control @error('nombre') is-invalid @enderror"
                           @if($errors->any()) value="{{ old('nombre') }}"
                           @else value="{{ $grupo->nombre }}" @endif
						id="nombre"
						placeholder="Nombre Grupo"
						value="{{ $grupo->nombre }}"
					/>
                    @error('nombre') {{-- Error nombre de la clase --}}
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
				</div>

				<div class="form-group">
					<button type="submit" class="btn btn-primary">Actualizar</button>
				</div>

			</form>
		</dir>
	</dir>

@endsection
