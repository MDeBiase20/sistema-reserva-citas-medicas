@extends('layouts.admin')

@section('content')
    <div class="row"style="margin-left:20px">
        <h1>Listado de secretarias</h1>
    </div>

    <div class="row">
        <div class="col-md-12">
                    <div class="card card-outline card-primary" style="text-align:center">
            <div class="card-header">
                <h3 class="card-title">Secretarias registrados</h3>

                <div class="card-tools">
                    <a href="{{url('admin/secretarias/create')}}" class="btn btn-primary btn-sm">
                        Registrar nueva secretaria
                    </a>
                </div>

            </div>

            <div class="card-body">
            <table id="example1" class="table table-striped table-bordered table-hover table-sm">
                <thead>
                    <tr>
                        <td>Nro</td>
                        <td>Nombre</td>
                        <td>Apellido</td>
                        <td>Dni</td>
                        <td>Celular</td>
                        <td>Fecha de nacimiento</td>
                        <td>Dirección</td>
                        <td>Email</td>
                        <td>Acciones</td>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $contador_secretarias = 1;
                    ?>
                    @foreach($secretarias as $secretaria)
                        <tr>
                            <td>{{$contador_secretarias++}}</td>
                            <td>{{$secretaria->nombres}}</td>
                            <td>{{$secretaria->apellido}}</td>
                            <td>{{$secretaria->dni}}</td>
                            <td>{{$secretaria->celular}}</td>
                            <td>{{$secretaria->fecha_nacimiento}}</td>
                            <td>{{$secretaria->direccion}}</td>
                            <!-- Se hace de esta manera por la relación que existe entre la tabla secretaria y user-->
                            <td>{{$secretaria->user->email}}</td>
                            <td>
                                <div class="btn-group" role="group" aria-label="Basic example">
                                    <a href="{{url('admin/secretarias/'.$secretaria->id)}}" type="button" class="btn btn-info btn-sm">
                                        <i class="bi bi-eye-fill"></i>
                                    </a>
                                    <a href="{{url('admin/secretarias/'.$secretaria->id.'/edit')}}" type="button" class="btn btn-success btn-sm">
                                        <i class="bi bi-pencil"></i>
                                    </a>
                                    <a href="{{url('admin/secretarias/'.$secretaria->id.'/confirm-delete')}}" type="button" class="btn btn-danger btn-sm">
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
                                    "pageLength": 10,
                                    "language": {
                                        "emptyTable": "No hay información",
                                        "info": "Mostrando _START_ a _END_ de _TOTAL_ Secretarias",
                                        "infoEmpty": "Mostrando 0 a 0 de 0 Secretarias",
                                        "infoFiltered": "(Filtrado de _MAX_ total Secretarias)",
                                        "infoPostFix": "",
                                        "thousands": ",",
                                        "lengthMenu": "Mostrar _MENU_ Secretarias",
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