@extends('layouts.admin')

@section('content')
    <div class="row" style="margin-left:40px">
        <h1>Modificar historial</h1>
    </div>
    <hr>

    <div class="row">
        <div class="col-md-12">
            <div class="card card-outline card-success">
                <div class="card-header">
                    <h3 class="card-title">Llene los datos</h3>
                </div>

                    <div class="card-body">

                        <form action="{{url('/admin/historial',$historial->id)}}" method="post">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="">Paciente</label> <b>*</b>
                                                <select name="paciente_id" id="" class="form-control">
                                                    @foreach($pacientes as $paciente)
                                                        <option value="{{ $paciente->id }}" {{ $historial->paciente_id == $paciente->id ? 'selected' : '' }}>{{ $paciente->apellido." ".$paciente->nombres }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="">Fecha de la cita médica</label> <b>*</b>
                                                <input type="date" value="{{ $historial->fecha_visita }}" name="fecha_visita" class="form-control">
                                            </div>
                                        </div>

                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="">Descripción de la cita médica</label>
                                                <textarea name="detalle" class="form-control" id="editor" cols="30" rows="50" style="width: 100%; height:500px">
                                                    {!! $historial->detalle !!}
                                                </textarea>

                                                <!--Script para el ckeditor5-->
                                                <script type="importmap">
                                                    {
                                                        "imports": {
                                                            "ckeditor5": "https://cdn.ckeditor.com/ckeditor5/43.1.0/ckeditor5.js",
                                                            "ckeditor5/": "https://cdn.ckeditor.com/ckeditor5/43.1.0/"
                                                        }
                                                    }
                                                </script>

                                                <script type="module">
                                                    import {
                                                        ClassicEditor,
                                                        Essentials,
                                                        Bold,
                                                        Italic,
                                                        Font,
                                                        Paragraph
                                                    } from 'ckeditor5';
                                                
                                                    ClassicEditor
                                                        .create( document.querySelector( '#editor' ), {
                                                            plugins: [ Essentials, Bold, Italic, Font, Paragraph ],
                                                            toolbar: [
                                                                'undo', 'redo', '|', 'bold', 'italic', '|',
                                                                'fontSize', 'fontFamily', 'fontColor', 'fontBackgroundColor'
                                                            ]
                                                        } )
                                                        .then( /* ... */ )
                                                        .catch( /* ... */ );
                                                </script>
                                                
                                                <!--Script para el ckeditor5-->

                                            </div>
                                        </div>
                                    </div>

                                </div>

                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <a href="{{url('admin/historial')}}" class="btn btn-secondary">Cancelar</a>
                                        <button type="submit" class="btn btn-success">Actualizar historial</button>
                                    </div>
                                </div>
                            </div>

                        </form>

                    </div>

            </div>

        </div>
    </div>
@endsection