@extends('layouts.app')
@section('botones')

    <a href="{{ route('index') }}" class="btn btn-primary mr-2">Volver</a>

@endsection
@section('content')
    {{-- Incluyendo el modal para eliminar un estado de resultado --}}
    @include('analisis.eliminarEstadoResultado')
    <!-- Mensaje de éxito al eliminar un estado de resultado -->
    @if(session('info'))
        <script>
            swal({
                title: "{{session('info')}}",
                icon: "success",
            });
        </script>
    @endif
    <!-- Fin del mensaje de éxito al eliminar un estado de resultado -->
    <!-- Mensaje de error al eliminar un estado de resultado -->
    @if(session('error'))
        <script>
            swal({
                title: "{{session('error')}}",
                icon: "warning",
            });
        </script>
    @endif
    <!-- Fin del mensaje de error al eliminar un estado de resultado -->



    <h1 class="text-center mb-5">ESTADO DE RESULTADOS</h1>

    <dir class="row justify-content-center mt-5">
        <dir class="col-md-8">
            <form method="POST" action="{{ route('estadoresultados.store') }}" novalidate>
                @csrf
                <div class="form-group">
                    <label for="bg">Balance General al que pertenece</label>
                    <select
                        name="bg"
                        class="form-control"
                        id="bg"
                    >

                        @foreach ($infin as $i )
                            <option value="{{$i->id}}">{{$i->nombre}} - año:{{$i->anio}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="ingreso">Ingresos</label>
                    <input type="text"
                           name="ingreso"
                           class="form-control @error('ingreso') is-invalid @enderror" value="{{ old('ingreso') }}"
                           id="ingreso"
                           placeholder="Ingresos"
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
                           value="{{ old('costodeventa') }}"
                           id="costodeventa"
                           placeholder="Costo de Venta"
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
                           value="{{ old('gastodeoperacion') }}"
                           id="gastodeoperacion"
                           placeholder="Gastos de operacion"
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
                           value="{{ old('gastodeadministracion') }}"
                           id="gastodeadministracion"
                           placeholder="Gastos de administracion"
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
                           value="{{ old('gastodeventaymercadeo') }}"
                           id="gastodeventaymercadeo"
                           placeholder="Gastos de venta y mercadeo"
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
                           value="{{ old('gastofinancieros') }}"
                           id="gastofinancieros"
                           placeholder="Gastos financieros"
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
                           value="{{ old('otrosingresos') }}"
                           id="otrosingresos"
                           placeholder="Otros ingresos"
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
                           value="{{ old('reservalegal') }}"
                           id="reservalegal"
                           placeholder="Reserva legal"
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
                           value="{{ old('impuestosobrelarenta') }}"
                           id="impuestosobrelarenta"
                           placeholder="Impuesto sobre la renta"
                    />
                    @error('impuestosobrelarenta') {{-- Error impuesto sobre la renta --}}
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>


                <div class="form-group">
                    <input type="submit" class="btn btn-primary"
                           value="Agregar Estado de Resultados">
                </div>

            </form>
        </dir>
    </dir>


    <div class="col-md-10 mx-auto bg-white p-3">
        <table class="table">
            <thead class="bg-primary text-light">
            <tr>
                <th scole="col">id</th>
                <th scole="col">ingreso</th>

                <th scole="col">costodeventa</th>
                <th scole="col">gastodeoperacion</th>
                <th scole="col">gastodeadministracion</th>
                <th scole="col">gastodeventaymercadeo</th>
                <th scole="col">gastofinancieros</th>
                <th scole="col">otrosingresos</th>
                <th scole="col">reservalegal</th>
                <th scole="col">impuestosobrelarenta</th>
                <th scole="col">BG</th>
                <th scole="col">acciones</th>
            </tr>
            </thead>
            <tbody>
            @foreach( $esre as $er )
                <tr>
                    <td>{{$er->id}}</td>
                    <td>{{$er->ingreso}}</td>
                    <td>{{$er->costodeventa}}</td>

                    <td>{{$er->gastodeoperacion}}</td>
                    <td>{{$er->gastodeadministracion}}</td>
                    <td>{{$er->gastodeventaymercadeo}}</td>
                    <td>{{$er->gastofinancieros}}</td>
                    <td>{{$er->otrosingresos}}</td>
                    <td>{{$er->reservalegal}}</td>
                    <td>{{$er->impuestosobrelarenta}}</td>


                    @foreach($infin as $if)
                        @if($if->id == $er->informefinancieros_id)
                            <td>{{$if->nombre}} - {{$if->anio}}</td>
                        @endif

                    @endforeach


                    <td>
                        <a href="{{ route('estadoresultados.edit', ['estadoresultado'=>$er->id]) }}"
                           class="btn btn-primary mr-2">Editar</a>

                        <!-- Botón de eliminar un estado de resultado -->
                        <a href="javascript:;" data-toggle="modal" onclick="deleteData({{$er->id}})" data-target="#DeleteModal" class="btn btn-danger">
                            Eliminar
                        </a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>


    <h1 class="text-center mb-5">ESTADO DE RESULTADOS</h1>


    <div class="p-3 mb-2 bg-dark text-white">
        @foreach($empresas as $em)
            <?php
            $empID = "{$em->id}";
            ?>
            <h1>Empresa: {{$em->nombre}}</h1>
            @foreach($infin as $in)
                <?php
                $infiID = "{$in->id}";
                $empFK = "{$in->empresas_id}";
                $nom = "{$in->nombre}";
                $ani = "{$in->anio}";
                ?>

                @if($empID==$empFK)

                    @foreach($esre as $er)
                        <?php
                        $erID = "{$er->id}";
                        $infiFK = "{$er->informefinancieros_id}";
                        ?>
                        @if($infiID==$infiFK)
                            <div class="p-3 mb-2 bg-secondary text-white">

                                <h2>BG: {{$nom}} año: {{$ani}}</h2>
                                <?php
                                //<h1>er: {{$er->id}} </h1><br>



                                $co = "{$er->costodeventa}";
                                $in = "{$er->ingreso}";
                                $t = $in - $co;
                                ?>
                                <div class="p-3 mb-2 bg-primary text-white">
                                    <h5>Utilidad bruta: {{$t}}</h5>
                                    <?php
                                    $co = $t;
                                    $in = "{$er->gastodeoperacion}";
                                    $t = $co - $in;
                                    ?>
                                    <h5>Utilidad de operación: {{$t}}</h5>
                                    <?php
                                    $co = $t;
                                    $in = "{$er->otrosingresos}";
                                    $t = $co + $in;
                                    ?>
                                    <h5>Utilidad antes de impuestos y reserva legal: {{$t}}</h5>
                                    <?php
                                    $co = $t;
                                    $in = "{$er->reservalegal}";
                                    $xx = "{$er->impuestosobrelarenta}";
                                    $t = $co - $in - $xx;
                                    ?>
                                    <h5>Utilidad neta: {{$t}}</h5>
                                </div>
                            </div>
                        @endif




                    @endforeach
                @endif
            @endforeach
        @endforeach
    </div>


@endsection

@section('javascript')
    <script type="text/javascript">
        function deleteData(id) {
            var id = id;
            var url = '{{ route("estadoresultados.destroy", ":id") }}';
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
