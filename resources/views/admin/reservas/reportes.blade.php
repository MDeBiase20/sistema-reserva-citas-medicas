@extends('layouts.admin')

@section('content')
    <div class="row" style="margin-left:40px">
        <h1>Reportes de reservas de citas médicas</h1>
    </div>
    <hr>

    <div class="row">
        <div class="col-md-4">
            <div class="card card-outline card-info">
                <div class="card-header">
                    <h3 class="card-title">Generar reporte</h3>
                </div>

                    <div class="card-body">

                        <a href="{{ url('/admin/reservas/pdf') }}" class="btn btn-success">
                            <i class="bi bi-printer"></i>Listado de todas las reservas
                        </a>

                    </div>

            </div>

        </div>
    </div>

    <div class="row">
        <div class="col-md-8">
            <div class="card card-outline card-info">
                <div class="card-header">
                    <h3 class="card-title">Generar reporte por fechas</h3>
                </div>

                    <div class="card-body">

                        <form action="{{ route('admin.reservas.pdf_fechas') }}" method="GET">
                            <div class="row">
                                <div class="col-md-4">
                                    <label for="">Fecha inicio:</label>
                                    <input type="date" class="form-control" name="fecha_inicio" id="">
                                </div>

                                <div class="col-md-4">
                                    <label for="">Fecha fin:</label>
                                    <input type="date" class="form-control" name="fecha_fin" id="">
                                </div>

                                <div class="col-md-4">
                                    <button style="margin: 30px" class="btn btn-success"><i class="bi bi-printer"></i>Generar reporte</button>
                                </div>

                            </div>
                        </form>

                    </div>

            </div>

        </div>
    </div>
@endsection