@extends('layouts.admin')

@section('content')
    <div class="row" style="margin-left:40px">
        <h1>Consultorio: {{ $consultorio->nombre }}</h1>
    </div>
    <hr>

    <div class="row">
        <div class="col-md-12">
            <div class="card card-outline card-success">
                <div class="card-header">
                    <h3 class="card-title">Llene los datos</h3>
                </div>

                    <div class="card-body">

                        <form action="{{url('/admin/consultorios', $consultorio->id)}}" method="post">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">Nombre del consultorio</label> <b>*</b>
                                        <input type="text" value="{{$consultorio->nombre}}" name="nombre" class="form-control" required>
                                        @error('nombre')
                                            <small style="color:red">{{$message}}</small>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">Ubicación</label> <b>*</b>
                                        <input type="text" value="{{$consultorio->ubicacion}}" name="ubicacion" class="form-control" required>
                                        @error('ubicacion')
                                            <small style="color:red">{{$message}}</small>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">Capacidad</label> <b>*</b>
                                        <input type="number" value="{{$consultorio->capacidad}}" name="capacidad" class="form-control" required>
                                        @error('capacidad')
                                            <small style="color:red">{{$message}}</small>
                                        @enderror
                                    </div>
                                </div>

                            </div>

                            <br>

                            <div class="row">

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">Especialidad</label> <b>*</b>
                                        <input type="text" value="{{$consultorio->especialidad}}" name="especialidad" class="form-control" required>
                                        @error('especialidad')
                                            <small style="color:red">{{$message}}</small>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">Estado</label> <b>*</b>
                                        <select name="estado" id="" class="form-control">
                                            @if($consultorio->estado == 'ACTIVO')
                                                <option value="ACTIVO">ACTIVO</option>
                                                <option value="INACTIVO">INACTIVO</option>
                                                    @else
                                                        <option value="ACTIVO">ACTIVO</option>
                                                        <option value="INACTIVO">INACTIVO</option>
                                            @endif
                                        </select>
                                    </div>
                                </div>

                                
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label for="">Teléfono</label>
                                        <input type="number" value="{{$consultorio->telefono}}" name="telefono" class="form-control">
                                    </div>
                                </div>


                            </div>

                            <br>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <a href="{{url('admin/consultorios')}}" class="btn btn-secondary">Cancelar</a>
                                        <button type="submit" class="btn btn-success">Actualizar consultorio</button>
                                    </div>
                                </div>
                            </div>

                        </form>

                    </div>

            </div>

        </div>
    </div>
@endsection