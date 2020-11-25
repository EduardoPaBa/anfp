@extends('layouts.app')
	@section('botones')
	<a href="{{ route('estadoresultados.index') }}" class="btn btn-primary mr-2">Volver</a>
	@endsection
	@section('content')
	<h1 class="text-center mb-5">EDITAR ESTADO DE RESULTADOS</h1>

	<dir class="row justify-content-center mt-5">
		<dir class="col-md-8">
			<form method="POST" action="{{ route('estadoresultados.update',$Estadoresultado) }}" novalidate>
				@csrf
				@method('PUT')
				<div class="form-group">
					<label for="ingreso">Ingresos</label>
					<input type="text"
						name="ingreso"
                           class="form-control @error('ingreso') is-invalid @enderror"
                           @if($errors->any()) value="{{ old('ingreso') }}"
                           @else value="{{ $Estadoresultado->ingreso }}" @endif
						id="ingreso"
						placeholder="Ingresos"
						value="{{ $Estadoresultado->ingreso }}"
					/>
                    @error('ingreso') {{-- Error ingresos --}}
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
				</div>
				<div class="form-group">
					<label for="costodeventa">Costo de Venta</label>
					<input type="text"
						name="costodeventa"
                           class="form-control @error('costodeventa') is-invalid @enderror"
                           @if($errors->any()) value="{{ old('costodeventa') }}"
                           @else value="{{ $Estadoresultado->costodeventa }}" @endif
						id="costodeventa"
						placeholder="Costo de Venta"
						value="{{ $Estadoresultado->costodeventa }}"
					/>
                    @error('costodeventa') {{-- Error costo de venta --}}
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
				</div>

				<div class="form-group">
					<label for="gastodeoperacion">Gastos de operacion</label>
					<input type="text"
						name="gastodeoperacion"
                           class="form-control @error('gastodeoperacion') is-invalid @enderror"
                           @if($errors->any()) value="{{ old('gastodeoperacion') }}"
                           @else value="{{ $Estadoresultado->gastodeoperacion }}" @endif
						id="gastodeoperacion"
						placeholder="Gastos de operacion"
						value="{{ $Estadoresultado->gastodeoperacion }}"
					/>
                    @error('gastodeoperacion') {{-- Error gasto de operacion --}}
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
				</div>
				<div class="form-group">
					<label for="gastodeadministracion">Gastos de administracion</label>
					<input type="text"
						name="gastodeadministracion"
                           class="form-control @error('gastodeadministracion') is-invalid @enderror"
                           @if($errors->any()) value="{{ old('gastodeadministracion') }}"
                           @else value="{{ $Estadoresultado->gastodeadministracion }}" @endif
						id="gastodeadministracion"
						placeholder="Gastos de administracion"
						value="{{ $Estadoresultado->gastodeadministracion }}"
					/>
                    @error('gastodeadministracion') {{-- Error gasto de administracion --}}
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
				</div>
				<div class="form-group">
					<label for="gastodeventaymercadeo">Gastos de venta y mercadeo</label>
					<input type="text"
						name="gastodeventaymercadeo"
                           class="form-control @error('gastodeventaymercadeo') is-invalid @enderror"
                           @if($errors->any()) value="{{ old('gastodeventaymercadeo') }}"
                           @else value="{{ $Estadoresultado->gastodeventaymercadeo }}" @endif
						id="gastodeventaymercadeo"
						placeholder="Gastos de venta y mercadeo"
						value="{{ $Estadoresultado->gastodeventaymercadeo }}"
					/>
                    @error('gastodeventaymercadeo') {{-- Error gasto de venta y mercadeo --}}
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
				</div>
				<div class="form-group">
					<label for="gastofinancieros">Gastos financieros</label>
					<input type="text"
						name="gastofinancieros"
                           class="form-control @error('gastofinancieros') is-invalid @enderror"
                           @if($errors->any()) value="{{ old('gastofinancieros') }}"
                           @else value="{{ $Estadoresultado->gastofinancieros }}" @endif
						id="gastofinancieros"
						placeholder="Gastos financieros"
						value="{{ $Estadoresultado->gastofinancieros }}"
					/>
                    @error('gastofinancieros') {{-- Error gasto financiero --}}
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
				</div>
				<div class="form-group">
					<label for="otrosingresos">Otros ingresos</label>
					<input type="text"
						name="otrosingresos"
                           class="form-control @error('otrosingresos') is-invalid @enderror"
                           @if($errors->any()) value="{{ old('otrosingresos') }}"
                           @else value="{{ $Estadoresultado->otrosingresos }}" @endif
						id="otrosingresos"
						placeholder="Otros ingresos"
						value="{{ $Estadoresultado->otrosingresos }}"
					/>
                    @error('otrosingresos') {{-- Error otros ingresos--}}
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
				</div>
				<div class="form-group">
					<label for="reservalegal">Reserva legal</label>
					<input type="text"
						name="reservalegal"
                           class="form-control @error('reservalegal') is-invalid @enderror"
                           @if($errors->any()) value="{{ old('reservalegal') }}"
                           @else value="{{ $Estadoresultado->reservalegal }}" @endif
						id="reservalegal"
						placeholder="Reserva legal"
						value="{{ $Estadoresultado->reservalegal }}"
					/>
                    @error('reservalegal') {{-- Error reserva legal --}}
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
				</div>
				<div class="form-group">
					<label for="impuestosobrelarenta">Impuesto sobre la renta</label>
					<input type="text"
						name="impuestosobrelarenta"
                           class="form-control @error('impuestosobrelarenta') is-invalid @enderror"
                           @if($errors->any()) value="{{ old('impuestosobrelarenta') }}"
                           @else value="{{ $Estadoresultado->impuestosobrelarenta }}" @endif
						id="impuestosobrelarenta"
						placeholder="Impuesto sobre la renta"
						value="{{ $Estadoresultado->impuestosobrelarenta }}"
					/>
                    @error('impuestosobrelarenta') {{-- Error impuesto sobre la renta --}}
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
				</div>


				<div class="form-group">
					<input type="submit" class="btn btn-primary"
					value="Actualizar Estado de Resultados">
				</div>

			</form>
		</dir>
	</dir>

@endsection
