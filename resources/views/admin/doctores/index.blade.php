@extends('layouts.admin')

@section('content')
    <div class="row"style="margin-left:20px">
        <h1>Listado de doctores</h1>
    </div>

    <div class="row">
        <div class="col-sm-12">
                    <div class="card card-outline card-primary">
            <div class="card-header">
                <h3 class="card-title">Doctores registrados</h3>

                <div class="card-tools">
                    <a href="{{url('admin/doctores/create')}}" class="btn btn-primary btn-sm">
                        Registrar nuevo doctor
                    </a>
                </div>

            </div>

            <div class="card-body">
            <table id="example1" class="table table-striped table-bordered table-hover table-sm">
                <thead>
                    <tr>
                        <td style="text-align:center">Nro</td>
                        <td style="text-align:center">Nombres y Apellido</td>
                        <td style="text-align:center">Teléfono</td>
                        <td style="text-align:center">Matrícula</td>
                        <td style="text-align:center">Especialidad</td>
                        <td style="text-align:center">email</td>
                        <td style="text-align:center">Acciones</td>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $contador_doctores = 1;
                    ?>
                    @foreach($doctores as $doctor)
                        <tr>
                            <td style="text-align:center">{{$contador_doctores++}}</td>
                            <td style="text-align:center">{{$doctor->nombres ." ".$doctor->apellido}}</td>
                            <td style="text-align:center">{{$doctor->telefono}}</td>
                            <td style="text-align:center">{{$doctor->matricula}}</td>
                            <td style="text-align:center">{{$doctor->especialidad}}</td>
                            <td style="text-align:center">{{$doctor->user->email}}</td>
                            <td style="text-align:center">
                                <div class="btn-group" role="group" aria-label="Basic example">
                                    <a href="{{url('admin/doctores/'.$doctor->id)}}" type="button" class="btn btn-info btn-sm">
                                        <i class="bi bi-eye-fill"></i>
                                    </a>
                                    <a href="{{url('admin/doctores/'.$doctor->id.'/edit')}}" type="button" class="btn btn-success btn-sm">
                                        <i class="bi bi-pencil"></i>
                                    </a>
                                    <a href="{{url('admin/doctores/'.$doctor->id.'/confirm-delete')}}" type="button" class="btn btn-danger btn-sm">
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
                                        "info": "Mostrando _START_ a _END_ de _TOTAL_ Doctores",
                                        "infoEmpty": "Mostrando 0 a 0 de 0 Doctores",
                                        "infoFiltered": "(Filtrado de _MAX_ total Doctores)",
                                        "infoPostFix": "",
                                        "thousands": ",",
                                        "lengthMenu": "Mostrar _MENU_ Doctores",
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