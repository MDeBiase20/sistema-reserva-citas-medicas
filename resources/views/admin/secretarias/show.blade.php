@extends('layouts.admin')

@section('content')
    <div class="row" style="margin-left:40px">
        <h1>Secretaria: {{$secretaria->nombres}} {{$secretaria->apellido}}</h1>
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
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="">Nombre</label>
                                        <input type="text" value="{{$secretaria->nombres}}" name="nombres" class="form-control" disabled>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="">Apellido</label>
                                        <input type="text" value="{{$secretaria->apellido}}" name="apellido" class="form-control" disabled>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="">Dni</label>
                                        <input type="text" value="{{$secretaria->dni}}" name="dni" class="form-control" disabled>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="">Celular</label>
                                        <input type="text" value="{{$secretaria->celular}}" name="celular" class="form-control" disabled>
                                    </div>
                            </div>

                            </div>

                            <br>

                            <div class="row">

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Dirección</label>
                                        <input type="address" value="{{$secretaria->direccion}}" name="direccion" class="form-control" disabled>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="">Fecha de nacimiento</label>
                                        <input type="date" value="{{$secretaria->fecha_nacimiento}}" name="fecha_nacimiento" class="form-control" disabled>
                                    </div>
                                </div>

                                
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="">Email</label>
                                        <input type="email" value="{{$secretaria->user->email}}" name="email" class="form-control" disabled>
                                    </div>
                                </div>

                            </div>

                            <br>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <a href="{{url('admin/secretarias')}}" class="btn btn-secondary">Volver</a>
                                    </div>
                                </div>
                            </div>

                    </div>

            </div>

        </div>
    </div>
@endsection