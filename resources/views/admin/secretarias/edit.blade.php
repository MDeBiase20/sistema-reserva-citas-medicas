@extends('layouts.admin')

@section('content')
    <div class="row" style="margin-left:40px">
        <h1>Modificar secretaria: {{$secretaria->nombres}}  {{$secretaria->apellido}}</h1>
    </div>
    <hr>

    <div class="row">
        <div class="col-md-12">
            <div class="card card-outline card-success">
                <div class="card-header">
                    <h3 class="card-title">Llene los datos</h3>
                </div>

                    <div class="card-body">

                        <form action="{{url('/admin/secretarias', $secretaria->id)}}" method="post">
                        @csrf

                        <!---Esto sirve para que se pueda realizar la actualización de los registros--->
                        @method('PUT')
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="">Nombre</label>
                                        <input type="text" value="{{$secretaria->nombres}}" name="nombres" class="form-control">
                                        @error('nombres')
                                            <small style="color:red">{{$message}}</small>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="">Apellido</label>
                                        <input type="text" value="{{$secretaria->apellido}}" name="apellido" class="form-control">
                                        @error('apellido')
                                            <small style="color:red">{{$message}}</small>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="">Dni</label>
                                        <input type="text" value="{{$secretaria->dni}}" name="dni" class="form-control">
                                        @error('dni')
                                            <small style="color:red">{{$message}}</small>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="">Celular</label>
                                        <input type="text" value="{{$secretaria->celular}}" name="celular" class="form-control">
                                        @error('celular')
                                            <small style="color:red">{{$message}}</small>
                                        @enderror
                                    </div>
                            </div>

                            </div>

                            <br>

                            <div class="row">

                                <div class="col-md-9">
                                    <div class="form-group">
                                        <label for="">Dirección</label>
                                        <input type="address" value="{{$secretaria->direccion}}" name="direccion" class="form-control">
                                        @error('direccion')
                                            <small style="color:red">{{$message}}</small>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="">Fecha de nacimiento</label>
                                        <input type="date" value="{{$secretaria->fecha_nacimiento}}" name="fecha_nacimiento" class="form-control">
                                        @error('fecha_nacimiento')
                                            <small style="color:red">{{$message}}</small>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <br>

                            <div class="row">

                            <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">Email</label>
                                        <input type="email" value="{{$secretaria->user->email}}" name="email" class="form-control" >
                                        @error('email')
                                            <small style="color:red">{{$message}}</small>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">Password</label>
                                        <input type="password" name="password" class="form-control">
                                        @error('password')
                                            <small style="color:red">{{$message}}</small>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">Verificación de password</label>
                                        <input type="password" name="password_confirmation" class="form-control">
                                        @error('password_confirmation')
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
                                        <button type="submit" class="btn btn-success">Actualizar</button>
                                    </div>
                                </div>
                            </div>

                        </form>

                    </div>

            </div>

        </div>
    </div>
@endsection