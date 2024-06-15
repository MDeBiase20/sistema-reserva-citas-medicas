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
    </div>
@endsection