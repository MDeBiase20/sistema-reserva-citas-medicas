@extends('layouts.admin')

@section('content')
    <div class="row" style="margin-left:40px">
        <h1>Pagos del paciente: {{ $pago->paciente->apellido }} {{ $pago->paciente->nombres }} </h1>
    </div>
    <hr>

    <div class="row" style="margin-left:40px">
        <div class="col-md-12">
            <div class="card card-outline card-info">
                <div class="card-header">
                    <h3 class="card-title">Datos registrados</h3>
                </div>

                    <div class="card-body">

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Paciente</label>
                                        <p>{{ $pago->paciente->apellido." ".$pago->paciente->nombres }}</p>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Doctores</label>
                                        <p>{{ $pago->doctor->apellido." ".$pago->doctor->nombres }}</p>
                                    </div>
                                </div>

                            </div>
                            <br>
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="">Fecha</label>
                                        <p>{{ $pago->fecha_pago }}</p>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="">Monto</label>
                                        <p>{{ $pago->monto }}</p>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Descripción</label>
                                        <p>{{ $pago->descripcion }}</p>                                        
                                    </div>
                                </div>

                            </div>

                            <br>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <a href="{{url('admin/pagos')}}" class="btn btn-secondary">Volver</a>   
                                    </div>
                                </div>
                            </div>

                    </div>

            </div>

        </div>
    </div>
@endsection