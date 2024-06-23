@extends('layouts.admin')

@section('content')
    <div class="row" style="margin-left:40px">
        <h1>Paciente: {{$paciente->nombres." ".$paciente->apellido}}</h1>
    </div>
    <hr>

    <div class="row">
        <div class="col-md-12">
            <div class="card card-outline card-success">
                <div class="card-header">
                    <h3 class="card-title">Llene los datos</h3>
                </div>

                    <div class="card-body">

                        <form action="{{url('/admin/pacientes', $paciente->id)}}" method="post">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="">Nombres</label> <b>*</b>
                                        <input type="text" value="{{$paciente->nombres}}" name="nombres" class="form-control" required>
                                        @error('nombres')
                                            <small style="color:red">{{$message}}</small>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="">Apellido</label> <b>*</b>
                                        <input type="text" value="{{$paciente->apellido}}" name="apellido" class="form-control" required>
                                        @error('apellido')
                                            <small style="color:red">{{$message}}</small>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="">Dni</label> <b>*</b>
                                        <input type="number" value="{{$paciente->dni}}" name="dni" class="form-control" required>
                                        @error('dni')
                                            <small style="color:red">{{$message}}</small>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="">Nro-Socio-Obra-Social</label> <b>*</b>
                                        <input type="number" value="{{$paciente->nro_socio_obra_social}}" name="nro_socio_obra_social" class="form-control" required>
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
                                        <input type="date" value="{{$paciente->fecha_nacimiento}}" name="fecha_nacimiento" class="form-control" required>
                                        @error('fecha_nacimiento')
                                            <small style="color:red">{{$message}}</small>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="">Género</label> <b>*</b>
                                        <select name="genero" id="" class="form-control">

                                        @if($paciente->genero == "M")
                                            <option value="M">MASCULINO</option>
                                            <option value="F">FEMENINO</option>
                                        @else
                                            <option value="F">FEMENINO</option>
                                            <option value="M">MASCULINO</option>
                                        @endif    
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="">Celular</label> <b>*</b>
                                        <input type="text" value="{{$paciente->celular}}" name="celular" class="form-control" required>
                                        @error('celular')
                                            <small style="color:red">{{$message}}</small>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="">Correo electrónico</label> <b>*</b>
                                        <input type="email" value="{{$paciente->email}}" name="email" class="form-control" required>
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
                                        <input type="address" value="{{$paciente->direccion}}" name="direccion" class="form-control" required>
                                        @error('direccion')
                                            <small style="color:red">{{$message}}</small>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="">Grupo Sanguineo</label> <b>*</b>
                                        <select name="grupo_sanguineo" id="" class="form-control">
                                            <option value="A+" @selected($paciente->grupo_sanguineo == 'A+')>A+</option>
                                            <option value="A-" @selected($paciente->grupo_sanguineo == 'A-')>A-</option>
                                            <option value="B+" @selected($paciente->grupo_sanguineo == 'B+')>B+</option>
                                            <option value="B-" @selected($paciente->grupo_sanguineo == 'B-')>B-</option>
                                            <option value="AB+" @selected($paciente->grupo_sanguineo == 'AB+')>AB+</option>
                                            <option value="AB-" @selected($paciente->grupo_sanguineo == 'AB-')>AB-</option>
                                            <option value="O+" @selected($paciente->grupo_sanguineo == 'O+')>O+</option>
                                            <option value="O-" @selected($paciente->grupo_sanguineo == 'O-')>O-</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="">Alergias</label> <b>*</b>
                                        <input type="text" value="{{$paciente->alergias}}" name="alergias" class="form-control" required>
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
                                        <input type="text" name="contacto_emergencia" value="{{$paciente->contacto_emergencia}}" class="form-control" required>
                                        @error('contacto_emergencia')
                                            <small style="color:red">{{$message}}</small>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-9">
                                    <div class="form-group">
                                        <label for="">Observaciones</label>
                                        <input type="text" name="observaciones" value="{{$paciente->observaciones}}" class="form-control">
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
                                        <button type="submit" class="btn btn-success">Actualizar paciente</button>
                                    </div>
                                </div>
                            </div>

                        </form>

                    </div>

            </div>

        </div>
    </div>
@endsection