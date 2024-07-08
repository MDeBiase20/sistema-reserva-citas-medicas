@extends('layouts.admin')

@section('content')
    <div class="row" style="margin-left:20px">
        <h1>Panel principal</h1>
    </div>

    <div class="row">
            <div class="col-lg-3 col-6">

                <div class="small-box bg-info">
                <div class="inner">
                <h3>{{$total_usuarios}}</h3>
                <p>Usuarios</p>
                </div>
                <div class="icon">
                <i class="ion fas bi bi-file-person"></i>
                </div>
                <a href="{{url('admin/usuarios')}}" class="small-box-footer">Más información<i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>

            <div class="col-lg-3 col-6">

                <div class="small-box bg-primary">
                <div class="inner">
                <h3>{{$total_secretarias}}</h3>
                <p>Secretarias</p>
                </div>
                <div class="icon">
                <i class="ion fas bi bi-person-circle"></i>
                </div>
                <a href="{{url('admin/secretarias')}}" class="small-box-footer">Más información<i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>

            <div class="col-lg-3 col-6">

                <div class="small-box bg-success">
                <div class="inner">
                <h3>{{$total_pacientes}}</h3>
                <p>Pacientes</p>
                </div>
                <div class="icon">
                    <i class="ion fas bi bi-person-wheelchair"></i>
                </div>
                <a href="{{url('admin/pacientes')}}" class="small-box-footer">Más información<i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>

            <div class="col-lg-3 col-6">

                <div class="small-box bg-warning">
                <div class="inner">
                <h3>{{$total_consultorios}}</h3>
                <p>Consultorios</p>
                </div>
                <div class="icon">
                    <i class="ion fas bi bi-hospital"></i>
                </div>
                <a href="{{url('admin/consultorios')}}" class="small-box-footer">Más información<i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>

            <div class="col-lg-3 col-6">

                <div class="small-box bg-danger">
                <div class="inner">
                <h3>{{$total_doctores}}</h3>
                <p>Doctores</p>
                </div>
                <div class="icon">
                    <i class="ion fas bi bi-heart-pulse"></i>
                </div>
                <a href="{{url('admin/doctores')}}" class="small-box-footer">Más información<i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>

            <div class="col-lg-3 col-6">

                <div class="small-box bg-secondary">
                <div class="inner">
                <h3>{{$total_horarios}}</h3>
                <p>Horarios</p>
                </div>
                <div class="icon">
                    <i class="ion fas bi bi-calendar2-week"></i>
                </div>
                <a href="{{url('admin/horarios')}}" class="small-box-footer">Más información<i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>

    </div>
@endsection