@extends('layouts.admin')

@section('content')
    <div class="row" style="margin-left:40px">
        <h1>Eliminar secretaria: {{$secretaria->nombres}}  {{$secretaria->apellido}}</h1>
    </div>
    <hr>

    <div class="row">
        <div class="col-md-12">
            <div class="card card-danger">
                <div class="card-header">
                    <h3 class="card-title">¿Estás seguro de eliminar este registro de la base de datos?</h3>
                </div>

                    <div class="card-body">

                        <form action="{{url('/admin/secretarias', $secretaria->id)}}" method="post">
                        @csrf

                        <!---Esto sirve para que se pueda realizar la eliminación de los registros--->
                        @method('DELETE')
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="">Nombre</label>
                                        <input type="text" value="{{$secretaria->nombres}}" name="nombres" class="form-control" disabled>
                                        @error('nombres')
                                            <small style="color:red">{{$message}}</small>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="">Apellido</label>
                                        <input type="text" value="{{$secretaria->apellido}}" name="apellido" class="form-control" disabled>
                                        @error('apellido')
                                            <small style="color:red">{{$message}}</small>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="">Dni</label>
                                        <input type="text" value="{{$secretaria->dni}}" name="dni" class="form-control" disabled>
                                        @error('dni')
                                            <small style="color:red">{{$message}}</small>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="">Celular</label>
                                        <input type="text" value="{{$secretaria->celular}}" name="celular" class="form-control" disabled>
                                        @error('celular')
                                            <small style="color:red">{{$message}}</small>
                                        @enderror
                                    </div>
                            </div>

                            </div>

                            <br>

                            <div class="row">

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Dirección</label>
                                        <input type="address" value="{{$secretaria->direccion}}" name="direccion" class="form-control" disabled>
                                        @error('direccion')
                                            <small style="color:red">{{$message}}</small>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="">Fecha de nacimiento</label>
                                        <input type="date" value="{{$secretaria->fecha_nacimiento}}" name="fecha_nacimiento" class="form-control" disabled>
                                        @error('fecha_nacimiento')
                                            <small style="color:red">{{$message}}</small>
                                        @enderror
                                    </div>
                                </div>

                                
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="">Email</label>
                                        <input type="email" value="{{$secretaria->user->email}}" name="email" class="form-control" disabled>
                                        @error('email')
                                            <small style="color:red">{{$message}}</small>
                                        @enderror
                                    </div>
                                </div>

                            </div>
                            <br>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <a href="{{url('admin/secretarias')}}" class="btn btn-secondary">Cancelar</a>
                                        <button type="submit" class="btn btn-danger">Eliminar</button>
                                    </div>
                                </div>
                            </div>

                        </form>

                    </div>

            </div>

        </div>
    </div>
@endsection