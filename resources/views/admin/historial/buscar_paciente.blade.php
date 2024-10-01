@extends('layouts.admin')

@section('content')
    <div class="row" style="margin-left:40px">
        <h1>Búsqueda de pacientes: </h1>
    </div>
    <hr>

    <div class="row">
        <div class="col-md-12">
            <div class="card card-outline card-info">
                <div class="card-header">
                    <h3 class="card-title">Buscar Paciente</h3>
                </div>

                    <div class="card-body">

                        <form action="{{ url('/admin/historial/buscar_paciente') }}" method="get">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="">Dni paciente: </label>
                                        <input type="text" name="dni" class="form form-control">
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <div style="height: 32px"></div>
                                        <button type="submit"class="btn btn-primary"> <i class="bi bi-search"></i> Buscar</button>
                                    </div>
                                </div>

                            </div>
                        </form> 
                        <hr>
                        @if($paciente)
                        <h3>Información del paciente</h3>
                            <div class="row">
                                
                                    <table>
                                        <tr>
                                            <td><b>Paciente:</b></td>
                                            <td>{{ $paciente->apellido." ".$paciente->nombres }}</td>
                                            
                                        </tr>

                                        <tr>
                                            <td><b>DNI:</b></td>
                                            <td>{{ $paciente->dni }}</td>
                                        </tr>

                                        <tr>
                                            <td><b>Nro. Obra Social</b></td>
                                            <td>{{ $paciente->nro_socio_obra_social }}</td>
                                        </tr>

                                        <tr>
                                            <td><b>Fecha de nacimiento:</b></td>
                                            <td>{{ $paciente->fecha_nacimiento }}</td>
                                        </tr>
                                    </table>
                            </div>
                            <br>
                            <div class="row">
                                <a href="{{ url('/admin/historial/paciente', $paciente->id) }}" class="btn btn-success"> <i class="bi bi-printer-fill"></i> Imprimir historial médico del paciente</a>
                            </div>
                        @else
                            <p style="color:red">Paciente no encontrado</p> 
                        @endif
                        
                    </div>

            </div>

        </div>
    </div>
@endsection