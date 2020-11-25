@extends('layouts.app')

@section('botones')
<a href="{{ route('index') }}" class="btn btn-primary mr-2">Volver</a>
@endsection


@section('content')
	<h1 class="text-center mb-5">Crear Cuentas</h1>

    {{-- Incluyendo el modal para eliminar una cuenta --}}
    @include('cuentas.eliminarCuenta')
    <!-- Mensaje de éxito al eliminar una cuenta -->
    @if(session('info'))
        <script>
            swal({
                title: "{{session('info')}}",
                icon: "success",
            });
        </script>
    @endif
    <!-- Fin del mensaje de éxito al eliminar una cuenta -->
    <!-- Mensaje de error al eliminar una cuenta -->
    @if(session('error'))
        <script>
            swal({
                title: "{{session('error')}}",
                icon: "warning",
            });
        </script>
    @endif
    <!-- Fin del mensaje de error al eliminar una cuenta -->

	<dir class="row justify-content-center mt-5">
		<dir class="col-md-8">
			<form method="POST" action="{{ route('cuentas.store') }}" novalidate>
				@csrf

				<div class="form-group">
					 <label for="clases">Clase a la que pertenece</label>
					 <select
					 	name="clases"
					 	class="form-control"
					 	id="clases"
					 >
					 	@foreach ($cl as $c )
					 	@foreach ($gr as $g)
					 	@foreach ($if as $i )

					 	<?php
					 	//$claseFK="{}";
					 	//	$claseID="{}";

					 	$grupoFK="{$c->grupos_id}";
					 	$grupoID="{$g->id}";

					 	$infiFK="{$g->informefinancieros_id}";
					 	$infiID="{$i->id}";
					 	?>

					 	@if($grupoFK==$grupoID && $infiFK==$infiID)
					 	<option value="{{$c->id}}" >{{$c->codigo}} {{$c->nombre}} - balance: {{$i->nombre}} anio:{{$i->anio}}</option>
					 	@endif

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
						placeholder="Código Cuenta"
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
                           class="form-control @error('nombre') is-invalid @enderror" value="{{ old('nombre') }}"
						id="nombre"
						placeholder="Nombre Cuenta"
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
                           class="form-control @error('valor') is-invalid @enderror" value="{{ old('valor') }}"
						id="valor"
						placeholder="Valor Cuenta"
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

<h1 class="text-center mb-5">CUENTAS</h1>
<div class="col-md-10 mx-auto bg-white p-3">
	<table class="table">
		<thead class="bg-primary text-light">
			<tr>
				<th scole="col">Codigo</th>
				<th scole="col">Nombre</th>
				<th scole="col">Valor</th>
				<th scole="col">Clase</th>
				<th scole="col">Acciones</th>
			</tr>
		</thead>
		<tbody>
			@foreach( $cuenta as $sc )
			<tr>
				<td>{{$sc->codigo}}</td>
				<td>{{$sc->nombre}}</td>
				<td>{{$sc->valor}}</td>
				<?php
				$grande;
				$humilde;
				?>
				@foreach($cl as $ch)
					<?php
						$grande="{{$ch->id}}";
						$humilde="{{$sc->clases_id}}";
					?>
					@if( $grande == $humilde )


						@foreach ($gr as $g)
					 	@foreach ($if as $i )

					 	<?php
					 	//$claseFK="{}";
					 	//	$claseID="{}";

					 	$grupoFK="{$ch->grupos_id}";
					 	$grupoID="{$g->id}";

					 	$infiFK="{$g->informefinancieros_id}";
					 	$infiID="{$i->id}";
					 	?>

					 	@if($grupoFK==$grupoID && $infiFK==$infiID)
						<td>{{$ch->codigo}} {{$ch->nombre}} - balance: {{$i->nombre}} anio: {{$i->anio}}</td>
					 	@endif

					 	@endforeach
					 	@endforeach



					@endif
				@endforeach


				<td>
					<a href="{{ route('cuentas.edit', ['cuenta'=>$sc->id]) }}"class="btn btn-primary mr-2">Editar</a>
                    <!-- Botón de eliminar una cuenta -->
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

@section('javascript')
		<script src="{{ asset('js/Eliminar.js') }}"></script>
        <script type="text/javascript">
            function deleteData(id) {
                var id = id;
                var url = '{{ route("cuentas.destroy", ":id") }}';
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
