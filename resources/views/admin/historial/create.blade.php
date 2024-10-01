@extends('layouts.admin')

@section('content')
    <div class="row" style="margin-left:40px">
        <h1>Registro de un nuevo historial</h1>
    </div>
    <hr>

    <div class="row">
        <div class="col-md-12">
            <div class="card card-outline card-primary">
                <div class="card-header">
                    <h3 class="card-title">Llene los datos</h3>
                </div>

                    <div class="card-body">

                        <form action="{{url('/admin/historial/create')}}" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-md-12">
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
                                                <label for="">Fecha de la cita médica</label> <b>*</b>
                                                <input type="date" value="<?php echo date('Y-m-d');?>" name="fecha_visita" class="form-control">
                                            </div>
                                        </div>

                                    </div>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="">Descripción de la cita médica</label>
                                                <textarea name="detalle" class="form-control" id="editor" cols="30" rows="50" style="width: 100%; height:500px"></textarea>

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
                                        <button type="submit" class="btn btn-primary">Registrar historial</button>
                                    </div>
                                </div>
                            </div>

                        </form>

                    </div>

            </div>

        </div>
    </div>
@endsection