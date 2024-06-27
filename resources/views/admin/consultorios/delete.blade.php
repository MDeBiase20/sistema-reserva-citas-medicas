@extends('layouts.admin')

@section('content')
    <div class="row" style="margin-left:20px">
        <h1>Consultorio: {{$consultorio->nombre}}</h1>
    </div>
    <hr>

    <div class="row">
        <div class="col-md-12">
            <div class="card card-danger">
                <div class="card-header">
                    <h3 class="card-title">¿Desea eliminar este registro de la base de datos?</h3>
                </div>

                    <div class="card-body">

                            <form action="{{url('/admin/consultorios', $consultorio->id)}}" method="post">
                                @csrf
                                @method('DELETE')
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="">Nombre del consultorio</label>
                                            <p>{{ $consultorio->nombre }}</p>
                                        </div>
                                    </div>
    
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="">Ubicación</label>
                                            <p><p>{{ $consultorio->ubicacion }}</p></p>
                                        </div>
                                    </div>
    
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="">Capacidad</label>
                                            <p><p>{{ $consultorio->capacidad }}</p></p>
                                        </div>
                                    </div>
    
                                </div>
    
                                <br>
    
                                <div class="row">
    
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="">Especialidad</label>
                                            <p><p>{{ $consultorio->especialidad }}</p></p>
                                        </div>
                                    </div>
    
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="">Estado</label>
                                            <p><p>{{ $consultorio->estado }}</p></p>
                                        </div>
                                    </div>
    
                                    
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="">Teléfono</label>
                                            <p><p>{{ $consultorio->telefono }}</p></p>
                                        </div>
                                    </div>
    
    
                                </div>
    
                                <br>
    
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <a href="{{url('admin/consultorios')}}" class="btn btn-secondary">Volver</a>
                                            <button type="submit" class="btn btn-danger">Eliminar consultorio</button>
                                        </div>
                                    </div>
                                </div>
    
                            </form>

                    </div>

            </div>

        </div>
    </div>
@endsection