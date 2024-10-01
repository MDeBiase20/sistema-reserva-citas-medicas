@extends('layouts.admin')

@section('content')
    <div class="row" style="margin-left:40px">
        <h1>Paciente: {{ $historial->paciente->apellido." ".$historial->paciente->nombres }}</h1>
    </div>
    <hr>

    <div class="row">
        <div class="col-md-12">
            <div class="card card-danger">
                <div class="card-header">
                    <h3 class="card-title">¿Desea eliminar el historial de la base de datos?</h3>
                </div>

                    <div class="card-body">

                        <form action="{{url('/admin/historial', $historial->id)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="">Paciente</label>
                                                    <p>{{ $historial->paciente->apellido." ".$historial->paciente->nombres }}</p>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="">Fecha de la cita médica</label>
                                                    <p>{{ $historial->fecha_visita }}</p>
                                            </div>
                                        </div>

                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="">Descripción de la cita médica</label>
                                                    <p>{!! $historial->detalle !!}</p>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <a href="{{url('admin/historial')}}" class="btn btn-secondary">Volver</a>
                                        <button type="submit" class="btn btn-danger">Eliminar historial</button>
                                    </div>
                                </div>
                            </div>

                        </form>

                    </div>

            </div>

        </div>
    </div>
@endsection