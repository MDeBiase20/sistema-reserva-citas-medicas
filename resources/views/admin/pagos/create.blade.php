@extends('layouts.admin')

@section('content')
    <div class="row" style="margin-left:40px">
        <h1>Registro de un nuevo pago</h1>
    </div>
    <hr>

    <div class="row" style="margin-left:40px">
        <div class="col-md-12">
            <div class="card card-outline card-primary">
                <div class="card-header">
                    <h3 class="card-title">Llene los datos</h3>
                </div>

                    <div class="card-body">

                        <form action="{{url('/admin/pagos/create')}}" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Paciente</label> <b>*</b>
                                        <select name="paciente_id" id="" class="form-control">
                                            @foreach($pacientes as $paciente)
                                                <option value="{{ $paciente->id }}">{{ $paciente->apellido." ".$paciente->nombres }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Doctores</label> <b>*</b>
                                        <select name="doctor_id" id="" class="form-control">
                                            @foreach($doctores as $doctor)
                                                <option value="{{ $doctor->id }}">{{ $doctor->apellido." ".$doctor->nombres." - ".$doctor->especialidad }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                            </div>

                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="">Fecha</label> <b>*</b>
                                        <input type="date" value="<?php echo date('Y-m-d'); ?>" name="fecha_pago" class="form-control">
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="">Monto</label> <b>*</b>
                                        <input type="text" name="monto" class="form-control">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Descripción</label> <b>*</b>
                                        <input type="text" name="descripcion" class="form-control">
                                    </div>
                                </div>

                            </div>

                            <br>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <a href="{{url('admin/pagos')}}" class="btn btn-secondary">Cancelar</a>
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