@extends('layouts.admin')

@section('content')
    <div class="row"style="margin-left:20px">
        <h1>Listado de configuraciones</h1>
    </div>

    <div class="row">
        <div class="col-sm-12">
                    <div class="card card-outline card-primary">
            <div class="card-header">
                <h3 class="card-title">Configuraciones registrados</h3>

                <div class="card-tools">
                    <a href="{{url('admin/configuraciones/create')}}" class="btn btn-primary btn-sm">
                        Registrar nueva configuración
                    </a>
                </div>

            </div>

            <div class="card-body">
            <table id="example1" class="table table-striped table-bordered table-hover table-sm">
                <thead>
                    <tr>
                        <td>Nro</td>
                        <td>Hospital/Clínica</td>
                        <td>Dirección</td>
                        <td>Teléfono</td>
                        <td>Correo</td>
                        <td>Logo</td>
                        <td>Acciones</td>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $contador_configuraciones = 1;
                    ?>
                    @foreach($configuraciones as $configuracion)
                        <tr>
                            <td style="text-align:center">{{$contador_configuraciones++}}</td>
                            <td style="text-align:center">{{$configuracion->nombre}}</td>
                            <td style="text-align:center">{{$configuracion->direccion}}</td>
                            <td style="text-align:center">{{$configuracion->telefono}}</td>
                            <td style="text-align:center">{{$configuracion->correo}}</td>
                            <td>
                                <!--Para que me muestre la imagen que está almacenada primero tengo que colocar el comando
                                php artisan storage:link para que la carpeta "storage" sea pública y pueda mostrar la imagen-->
                                <img src="{{ url('storage/'.$configuracion->logo) }}" alt="logo" width="100px">
                            </td>
                            <td style="text-align:center">
                                <div class="btn-group" role="group" aria-label="Basic example">
                                    <a href="{{url('admin/configuraciones/'.$configuracion->id)}}" type="button" class="btn btn-info btn-sm">
                                        <i class="bi bi-eye-fill"></i>
                                    </a>
                                    <a href="{{url('admin/configuraciones/'.$configuracion->id.'/edit')}}" type="button" class="btn btn-success btn-sm">
                                        <i class="bi bi-pencil"></i>
                                    </a>
                                    <a href="{{url('admin/configuraciones/'.$configuracion->id.'/confirm-delete')}}" type="button" class="btn btn-danger btn-sm">
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
                                        "info": "Mostrando _START_ a _END_ de _TOTAL_ Configuraciones",
                                        "infoEmpty": "Mostrando 0 a 0 de 0 Configuraciones",
                                        "infoFiltered": "(Filtrado de _MAX_ total Configuraciones)",
                                        "infoPostFix": "",
                                        "thousands": ",",
                                        "lengthMenu": "Mostrar _MENU_ Configuraciones",
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