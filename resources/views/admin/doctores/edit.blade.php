@extends('layouts.admin')

@section('content')
    <div class="row" style="margin-left:40px">
        <h1>Doctor: {{ $doctor->nombres." ".$doctor->apellido }}</h1>
    </div>
    <hr>

    <div class="row">
        <div class="col-md-12">
            <div class="card card-outline card-success">
                <div class="card-header">
                    <h3 class="card-title">Llene los datos</h3>
                </div>

                    <div class="card-body">

                        <form action="{{url('/admin/doctores', $doctor->id)}}" method="post">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="">Nombre</label> <b>*</b>
                                        <input type="text" value="{{$doctor->nombres}}" name="nombres" class="form-control" required>
                                        @error('nombres')
                                            <small style="color:red">{{$message}}</small>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="">Apellido</label> <b>*</b>
                                        <input type="text" value="{{$doctor->apellido}}" name="apellido" class="form-control" required>
                                        @error('apellido')
                                            <small style="color:red">{{$message}}</small>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="">Teléfono</label> <b>*</b>
                                        <input type="number" value="{{$doctor->telefono}}" name="telefono" class="form-control" required>
                                        @error('telefono')
                                            <small style="color:red">{{$message}}</small>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="">Matrícula</label> <b>*</b>
                                        <input type="text" value="{{$doctor->matricula}}" name="matricula" class="form-control" required>
                                        @error('matricula')
                                            <small style="color:red">{{$message}}</small>
                                        @enderror
                                    </div>
                            </div>

                            </div>

                            <br>

                            <div class="row">

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="">Especialidad</label> <b>*</b>
                                        <input type="text" value="{{$doctor->especialidad}}" name="especialidad" class="form-control" required>
                                        @error('especialidad')
                                            <small style="color:red">{{$message}}</small>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="">Email</label> <b>*</b>
                                        <input type="email" value="{{$doctor->user->email}}" name="email" class="form-control" required>
                                        @error('email')
                                            <small style="color:red">{{$message}}</small>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="">Password</label> <b>*</b>
                                        <input type="password" name="password" class="form-control">
                                        @error('password')
                                            <small style="color:red">{{$message}}</small>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="">Verificación de password</label> <b>*</b>
                                        <input type="password" name="password_confirmation" class="form-control">
                                        @error('password_confirmation')
                                            <small style="color:red">{{$message}}</small>
                                        @enderror
                                    </div>
                                </div>

                            </div>

                            <hr>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <a href="{{url('admin/doctores')}}" class="btn btn-secondary">Cancelar</a>
                                        <button type="submit" class="btn btn-success">Actualizar doctor</button>
                                    </div>
                                </div>
                            </div>

                        </form>

                    </div>

            </div>

        </div>
    </div>
@endsection