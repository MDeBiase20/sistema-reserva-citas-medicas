@extends('layouts.admin')

@section('content')
    <div class="row" style="margin-left:40px">
        <h1>Usuario: {{$usuario->name}}</h1>
    </div>
    <hr>

    <div class="row" style="margin-left:40px">
        <div class="col-md-6">
            <div class="card card-outline card-info">
                <div class="card-header">
                    <h3 class="card-title">Datos registrados</h3>
                </div>

                    <div class="card-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="">Nombre del usuario</label> <b>*</b>
                                            <p>{{$usuario->name}}</p>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="">Correo electrónico</label> <b>*</b>
                                            <p>{{$usuario->email}}</p>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <a href="{{url('admin/usuarios')}}" class="btn btn-secondary">Volver</a>
                                    </div>
                                </div>
                            </div>

                    </div>

            </div>

        </div>
    </div>
@endsection