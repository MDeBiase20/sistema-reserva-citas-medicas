@extends('layouts.admin')

@section('content')
    <div class="row" style="margin-left:40px">
        <h1>Pago del paciente: {{ $pagos->paciente->apellido." ".$pagos->paciente->nombres }}</h1>
    </div>
    <hr>

    <div class="row" style="margin-left:40px">
        <div class="col-md-12">
            <div class="card card-outline card-success">
                <div class="card-header">
                    <h3 class="card-title">Llene los datos</h3>
                </div>

                    <div class="card-body">

                        <form action="{{url('/admin/pagos', $pagos->id)}}" method="post">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Paciente</label> <b>*</b>
                                        <select name="paciente_id" id="" class="form-control">
                                            @foreach($pacientes as $paciente)
                                                <option value="{{ $paciente->id }}" {{ $pagos->paciente_id == $paciente->id ? 'selected': ''}}>{{ $pagos->paciente->apellido." ".$pagos->paciente->nombres }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Doctores</label> <b>*</b>
                                        <select name="doctor_id" id="" class="form-control">
                                            @foreach($doctores as $doctor)
                                                <option value="{{ $doctor->id }}" {{ $pagos->doctor_id == $doctor->id ? 'selected' : '' }}>{{ $doctor->apellido." ".$doctor->nombres." - ".$doctor->especialidad }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                            </div>

                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="">Fecha</label> <b>*</b>
                                        <input type="date" value="{{ $pagos->fecha_pago }}" name="fecha_pago" class="form-control">
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="">Monto</label> <b>*</b>
                                        <input type="text" name="monto" value="{{ $pagos->monto }}" class="form-control">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Descripción</label> <b>*</b>
                                        <input type="text" value="{{ $pagos->descripcion }}" name="descripcion" class="form-control">
                                    </div>
                                </div>

                            </div>

                            <br>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <a href="{{url('admin/pagos')}}" class="btn btn-secondary">Cancelar</a>
                                        <button type="submit" class="btn btn-success">Actualizar pago</button>
                                    </div>
                                </div>
                            </div>

                        </form>

                    </div>

            </div>

        </div>
    </div>
@endsection