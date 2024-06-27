@extends('layouts.admin')

@section('content')
    <div class="row" style="margin-left:40px">
        <h1>Consultorio: {{$consultorio->nombre}}</h1>
    </div>
    <hr>

    <div class="row">
        <div class="col-md-12">
            <div class="card card-outline card-info">
                <div class="card-header">
                    <h3 class="card-title">Datos del consultorio</h3>
                </div>

                    <div class="card-body">

                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">Nombre del consultorio</label>
                                        <p>{{ $consultorio->nombre }}</p>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">Ubicación</label>
                                        <p><p>{{ $consultorio->ubicacion }}</p></p>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">Capacidad</label>
                                        <p><p>{{ $consultorio->capacidad }}</p></p>
                                    </div>
                                </div>

                            </div>

                            <br>

                            <div class="row">

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">Especialidad</label>
                                        <p><p>{{ $consultorio->especialidad }}</p></p>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">Estado</label>
                                        <p><p>{{ $consultorio->estado }}</p></p>
                                    </div>
                                </div>

                                
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">Teléfono</label>
                                        <p><p>{{ $consultorio->telefono }}</p></p>
                                    </div>
                                </div>


                            </div>

                            <br>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <a href="{{url('admin/consultorios')}}" class="btn btn-secondary">Volver</a>
                                    </div>
                                </div>
                            </div>

                    </div>

            </div>

        </div>
    </div>
@endsection