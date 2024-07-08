@extends('layouts.admin')

@section('content')
    <div class="row"style="margin-left:20px">
        <h1>Listado de horarios</h1>
    </div>

    <div class="row">
        <div class="col-sm-12">
                <div class="card card-outline card-primary">
            <div class="card-header">
                <h3 class="card-title">horarios registrados</h3>

                <div class="card-tools">
                    <a href="{{url('admin/horarios/create')}}" class="btn btn-primary btn-sm">
                        Registrar nuevo horario
                    </a>
                </div>

            </div>

            <div class="card-body">
            <table id="example1" class="table table-striped table-bordered table-hover table-sm">
                <thead>
                    <tr>
                        <td style="text-align:center">Nro</td>
                        <td style="text-align:center">Doctor</td>
                        <td style="text-align:center">Especialidad</td>
                        <td style="text-align:center">Consultorio</td>
                        <td style="text-align:center">Día de atención</td>
                        <td style="text-align:center">Hora de inicio</td>
                        <td style="text-align:center">Hora de salida</td>
                        <td style="text-align:center">Acciones</td>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $contador_horarios = 1;
                    ?>
                    @foreach($horarios as $horario)
                        <tr>
                            <td style="text-align:center">{{$contador_horarios++}}</td>
                            <td style="text-align:center">{{$horario->doctor->nombres ." ".$horario->doctor->apellido}}</td>
                            <td style="text-align:center">{{$horario->doctor->especialidad}}</td>
                            <td style="text-align:center">{{$horario->consultorio->nombre." - Piso ".$horario->consultorio->ubicacion}}</td>
                            <td style="text-align:center">{{$horario->dia}}</td>
                            <td style="text-align:center">{{$horario->hora_inicio}}</td>
                            <td style="text-align:center">{{$horario->hora_fin}}</td>
                            <td style="text-align:center">
                                <div class="btn-group" role="group" aria-label="Basic example">
                                    <a href="{{url('admin/horarios/'.$horario->id)}}" type="button" class="btn btn-info btn-sm">
                                        <i class="bi bi-eye-fill"></i>
                                    </a>
                                    <a href="{{url('admin/horarios/'.$horario->id.'/edit')}}" type="button" class="btn btn-success btn-sm">
                                        <i class="bi bi-pencil"></i>
                                    </a>
                                    <a href="{{url('admin/horarios/'.$horario->id.'/confirm-delete')}}" type="button" class="btn btn-danger btn-sm">
                                        <i class="bi bi-trash"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <!--Script para DataTable--->
            <script>
            $(function () {
                    $("#example1").DataTable({
                                                "pageLength": 5,
                                                "language": {
                                                    "emptyTable": "No hay información",
                                                    "info": "Mostrando _START_ a _END_ de _TOTAL_ Horarios",
                                                    "infoEmpty": "Mostrando 0 a 0 de 0 Horarios",
                                                    "infoFiltered": "(Filtrado de _MAX_ total Horarios)",
                                                    "infoPostFix": "",
                                                    "thousands": ",",
                                                    "lengthMenu": "Mostrar _MENU_ Horarios",
                                                    "loadingRecords": "Cargando...",
                                                    "processing": "Procesando...",
                                                    "search": "Buscador:",
                                                    "zeroRecords": "Sin resultados encontrados",
                                                    "paginate": {
                                                        "first": "Primero",
                                                        "last": "Ultimo",
                                                        "next": "Siguiente",
                                                        "previous": "Anterior"
                                                    }
                                                },
                                                "responsive": true, "lengthChange": true, "autoWidth": false,
                                                buttons: [{
                                                    extend: 'collection',
                                                    text: 'Reportes',
                                                    orientation: 'landscape',
                                                    buttons: [{
                                                        text: 'Copiar',
                                                        extend: 'copy',
                                                    }, {
                                                        extend: 'pdf'
                                                    },{
                                                        extend: 'csv'
                                                    },{
                                                        extend: 'excel'
                                                    },{
                                                        text: 'Imprimir',
                                                        extend: 'print'
                                                    }
                                                    ]
                                                },
                                                    {
                                                        extend: 'colvis',
                                                        text: 'Visor de columnas',
                                                        collectionLayout: 'fixed three-column'
                                                    }
                                                ],
                                            }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
                                        });
            </script>
            </div>
        </div>

            <!-- Calendario -->
        <div class="col-sm-12">
            <div class="card card-outline card-primary">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-4">
                            <h3 class="card-title">Calendario de atención de doctores</h3>
                        </div>
                        <div class="col-md-4">
                            <div style="float: right">
                                <label for="">Consultorios</label>
                            </div> 
                        </div>
                        
                        <div class="col-md-4" style="float: right">
                            <select name="consultorio_id" id="consultorio_select" class="form-control" id="">
                                @foreach($consultorios as $consultorio)
                                    <option value="{{ $consultorio->id }}">{{ $consultorio->nombre." - Ubicación: ".$consultorio->ubicacion}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                </div>

                <div class="card-body">

                    <div id="consultorio_info">

                    </div>

                </div>
            </div>    
        </div>

    </div>

</div>


    <!--Código JQuery para seleccionar el consultorio y se carguen las reservas-->
    <script>
            $('#consultorio_select').on('change', function(){
               //creamos la variable para traer el id del consultorio
                var consultorio_id = $('#consultorio_select').val()
                //alert(consultorio_id)
                var url = "{{ route ('admin.horarios.cargar_datos_consultorios', ':id') }}"
                url = url.replace(':id', consultorio_id)

                    //Si el consultorio existe habiltamos Ajax
                    if(consultorio_id){
                        $.ajax({
                        url: url,
                        type:'GET',
                        success: function(data){
                            $('#consultorio_info').html(data)
                            },
                            error: function(){
                                alert("Error al obtener los datos del consultorio")
                                }
                        });
                    }else{
                        $('#consultorio_info').html('')
                    }
            })
    </script>
    
@endsection