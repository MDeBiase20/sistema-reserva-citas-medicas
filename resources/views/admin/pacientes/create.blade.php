@extends('layouts.admin')

@section('content')
    <div class="row" style="margin-left:40px">
        <h1>Registro de pacientes</h1>
    </div>
    <hr>

    <div class="row" style="margin-left:40px">
        <div class="col-md-12">
            <div class="card card-outline card-primary">
                <div class="card-header">
                    <h3 class="card-title">Llene los datos</h3>
                </div>

                    <div class="card-body">

                        <form action="{{url('/admin/pacientes/create')}}" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="">Nombres</label> <b>*</b>
                                        <input type="text" value="{{old('nombres')}}" name="nombres" class="form-control" required>
                                        @error('nombres')
                                            <small style="color:red">{{$message}}</small>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="">Apellido</label> <b>*</b>
                                        <input type="text" value="{{old('apellido')}}" name="apellido" class="form-control" required>
                                        @error('apellido')
                                            <small style="color:red">{{$message}}</small>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="">Dni</label> <b>*</b>
                                        <input type="number" value="{{old('dni')}}" name="dni" class="form-control" required>
                                        @error('dni')
                                            <small style="color:red">{{$message}}</small>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="">Nro-Socio-Obra-Social</label> <b>*</b>
                                        <input type="number" value="{{old('nro_socio_obra_social')}}" name="nro_socio_obra_social" class="form-control" required>
                                        @error('nro_socio_obra_social')
                                            <small style="color:red">{{$message}}</small>
                                        @enderror
                                    </div>
                                </div>

                            </div>

                            <br>

                            <div class="row">

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="">Fecha de nacimiento</label> <b>*</b>
                                        <input type="date" value="{{old('fecha_nacimiento')}}" name="fecha_nacimiento" class="form-control" required>
                                        @error('fecha_nacimiento')
                                            <small style="color:red">{{$message}}</small>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="">Género</label> <b>*</b>
                                        <select name="genero" id="" class="form-control">
                                            <option value="M">MASCULINO</option>
                                            <option value="F">FEMENINO</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="">Celular</label> <b>*</b>
                                        <input type="number" value="{{old('celular')}}" name="celular" class="form-control" required>
                                        @error('celular')
                                            <small style="color:red">{{$message}}</small>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="">Correo electrónico</label> <b>*</b>
                                        <input type="email" value="{{old('email')}}" name="email" class="form-control" required>
                                        @error('email')
                                            <small style="color:red">{{$message}}</small>
                                        @enderror
                                    </div>
                                </div>

                            </div>

                            <br>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Dirección</label> <b>*</b>
                                        <input type="address" value="{{old('direccion')}}" name="direccion" class="form-control" required>
                                        @error('direccion')
                                            <small style="color:red">{{$message}}</small>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="">Grupo Sanguineo</label> <b>*</b>
                                        <select name="grupo_sanguineo" id="" class="form-control">
                                            <option value="A+">A+</option>
                                            <option value="A-">A-</option>
                                            <option value="B+">B+</option>
                                            <option value="B-">B-</option>
                                            <option value="AB+">AB+</option>
                                            <option value="AB-">AB-</option>
                                            <option value="O+">O+</option>
                                            <option value="O-">O-</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="">Alergias</label> <b>*</b>
                                        <input type="text" value="{{old('alergias')}}" name="alergias" class="form-control" required>
                                        @error('alergias')
                                            <small style="color:red">{{$message}}</small>
                                        @enderror
                                    </div>
                                </div>

                            </div>

                            <br>

                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="">Contacto de emergencia</label> <b>*</b>
                                        <input type="number" name="contacto_emergencia" value="{{old('contacto_emergencia')}}" class="form-control" required>
                                        @error('contacto_emergencia')
                                            <small style="color:red">{{$message}}</small>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-9">
                                    <div class="form-group">
                                        <label for="">Observaciones</label>
                                        <input type="text" name="observaciones" value="{{old('observaciones')}}" class="form-control">
                                        @error('observaciones')
                                            <small style="color:red">{{$message}}</small>
                                        @enderror
                                    </div>
                                </div>

                            </div>

                            <br>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <a href="{{url('admin/pacientes')}}" class="btn btn-secondary">Cancelar</a>
                                        <button type="submit" class="btn btn-primary">Registrar paciente</button>
                                    </div>
                                </div>
                            </div>

                        </form>

                    </div>

            </div>

        </div>
    </div>
@endsection