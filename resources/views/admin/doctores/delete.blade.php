@extends('layouts.admin')

@section('content')
    <div class="row" style="margin-left:40px">
        <h1>Doctor: {{ $doctor->nombres." ".$doctor->apellido }}</h1>
    </div>
    <hr>

    <div class="row">
        <div class="col-md-12">
            <div class="card card-danger">
                <div class="card-header">
                    <h3 class="card-title">¿Estás seguro que desea eliminar este registro de la base de datos?</h3>
                </div>

                    <div class="card-body">

                        <form action="{{url('/admin/doctores', $doctor->id)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="">Nombre</label>
                                        <input type="text" value="{{$doctor->nombres}}" name="nombres" class="form-control" disabled>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="">Apellido</label>
                                        <input type="text" value="{{$doctor->apellido}}" name="apellido" class="form-control" disabled>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="">Teléfono</label>
                                        <input type="number" value="{{$doctor->telefono}}" name="telefono" class="form-control" disabled>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="">Matrícula</label>
                                        <input type="text" value="{{$doctor->matricula}}" name="matricula" class="form-control" disabled>
                                    </div>
                            </div>

                            </div>

                            <br>

                            <div class="row">

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="">Especialidad</label>
                                        <input type="text" value="{{$doctor->especialidad}}" name="especialidad" class="form-control" disabled>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="">Email</label>
                                        <input type="email" value="{{$doctor->user->email}}" name="email" class="form-control" disabled>
                                    </div>
                                </div>                               
                            </div>

                            <hr>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <a href="{{url('admin/doctores')}}" class="btn btn-secondary">Cancelar</a>
                                        <button type="submit" class="btn btn-danger">Eliminar doctor</button>
                                    </div>
                                </div>
                            </div>

                        </form>

                    </div>

            </div>

        </div>
    </div>
@endsection