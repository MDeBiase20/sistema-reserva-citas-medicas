@extends('layouts.admin')

@section('content')
    <div class="row"style="margin-left:20px">
        <h1>Listado de historiales</h1>
    </div>

    <div class="row">
        <div class="col-sm-12">
                    <div class="card card-outline card-primary">
            <div class="card-header">
                <h3 class="card-title">Historiales registrados</h3>

                <div class="card-tools">
                    <a href="{{url('admin/historial/create')}}" class="btn btn-primary btn-sm">
                        Registrar nuevo historial
                    </a>
                </div>

            </div>

            <div class="card-body">
            <table id="example1" class="table table-striped table-bordered table-hover table-sm">
                <thead>
                    <tr style="text-align:center">
                        <td>Nro</td>
                        <td>Paciente</td>
                        <td>Fecha de la cita médica</td>
                        <td>Detalle</td>
                        <td>Acciones</td>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $contador_historial = 1;
                    ?>
                    @foreach($historiales as $historial)
                    <!--Este if hace que me imprima los historiales de las atenciones que hizo cierto doctor y también que muestre los historiales desde la cuenta del administrador-->
                        @if( Auth::user()->hasRole('admin') || $historial->doctor_id == Auth::user()->doctor->id)
                            <tr>
                                <td style="text-align:center">{{$contador_historial++}}</td>
                                <td style="text-align:center">{{$historial->paciente->apellido." ".$historial->paciente->nombres}}</td>
                                <td style="text-align:center">{{$historial->fecha_visita}}</td>
                                <td style="text-align:center">
                                    <!--Este fragmento de código lo que hace es limitar hasta 100 caracteres un texto largo-->
                                    {!!\Illuminate\Support\Str::limit($historial->detalle, 100, '...')!!}
                                </td>
                                <td style="text-align:center">
                                    <div class="btn-group" role="group" aria-label="Basic example">
                                        <a href="{{url('admin/historial/'.$historial->id)}}" type="button" class="btn btn-info btn-sm">
                                            <i class="bi bi-eye-fill"></i>
                                        </a>
                                        <a href="{{url('admin/historial/pdf/'.$historial->id)}}" type="button" class="btn btn-warning btn-sm">
                                            <i class="bi bi-filetype-pdf"></i>
                                        </a>
                                        <a href="{{url('admin/historial/'.$historial->id.'/edit')}}" type="button" class="btn btn-success btn-sm">
                                            <i class="bi bi-pencil"></i>
                                        </a>
                                        <a href="{{url('admin/historial/'.$historial->id.'/confirm-delete')}}" type="button" class="btn btn-danger btn-sm">
                                            <i class="bi bi-trash"></i>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @endif
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
                                        "info": "Mostrando _START_ a _END_ de _TOTAL_ historiales",
                                        "infoEmpty": "Mostrando 0 a 0 de 0 historiales",
                                        "infoFiltered": "(Filtrado de _MAX_ total historiales)",
                                        "infoPostFix": "",
                                        "thousands": ",",
                                        "lengthMenu": "Mostrar _MENU_ historiales",
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

    </div>
</div>
@endsection