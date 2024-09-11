@extends('layouts.admin')

@section('content')
    <div class="row" style="margin-left:40px">
        <h1>Clínica/Hospital registrado: {{ $configuracion->nombre }}</h1>
    </div>
    <hr>

    <div class="row">
        <div class="col-md-12">
            <div class="card card-outline card-info">
                <div class="card-header">
                    <h3 class="card-title">Datos registrados</h3>
                </div>

                    <div class="card-body">

                            <div class="row">
                                <div class="col-md-8">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="">Nombre de la clínica/hostpital</label>
                                                <p>{{ $configuracion->nombre }}</p>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="">Dirección</label>
                                                <p>{{ $configuracion->direccion }}</p>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="">Teléfono</label>
                                                <p>{{ $configuracion->telefono }}</p>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="">Correo</label>
                                                <p>{{ $configuracion->correo }}</p>
                                            </div>
                                        </div>

                                    </div>

                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">Logo</label>
                                        <br>
                                        <img src="{{ url('storage/'.$configuracion->logo) }}" alt="logo" width="300px">
                                    </div>
                                </div>

                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <a href="{{url('admin/configuraciones')}}" class="btn btn-secondary">volver</a>
                                    </div>
                                </div>
                            </div>

                    </div>

            </div>

        </div>
    </div>
@endsection