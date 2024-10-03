@extends('layouts.admin')

@section('content')
    <div class="row"style="margin-left:20px">
        <h1>Listado de pagos</h1>
    </div>

    <div class="row">
        <div class="col-sm-12">
                    <div class="card card-outline card-primary">
            <div class="card-header">
                <h3 class="card-title">Pagos registrados</h3>

                <div class="card-tools">
                    <a href="{{url('admin/pagos/create')}}" class="btn btn-primary btn-sm">
                        Registrar nuevo pago
                    </a>
                </div>

            </div>

            <div class="card-body">
            <table id="example1" class="table table-striped table-bordered table-hover table-sm">
                <thead>
                    <tr style="text-align:center">
                        <td>Nro</td>
                        <td>Paciente</td>
                        <td>Doctor</td>
                        <td>Fecha de pago</td>
                        <td>Monto</td>
                        <td>Descripción</td>
                        <td>Acciones</td>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $contador_pagos = 1;
                    ?>
                    @foreach($pagos as $pago)
                        <tr>
                            <td style="text-align:center">{{$contador_pagos++}}</td>
                            <td style="text-align:center">{{$pago->paciente->apellido." ".$pago->paciente->nombres}}</td>
                            <td style="text-align:center">{{$pago->doctor->apellido." ".$pago->doctor->nombres}}</td>
                            <td style="text-align:center">{{$pago->fecha_pago}}</td>
                            <td style="text-align:center">{{$pago->monto}}</td>
                            <td style="text-align:center">{{$pago->descripcion}}</td>
                            <td>
                                <div class="btn-group" role="group" aria-label="Basic example">
                                    <a href="{{url('admin/pagos/'.$pago->id)}}" type="button" class="btn btn-info btn-sm">
                                        <i class="bi bi-eye-fill"></i>
                                    </a>
                                    <a href="{{url('admin/pagos/pdf/'.$pago->id)}}" type="button" class="btn btn-warning btn-sm">
                                        <i class="bi bi-printer"></i>
                                    </a>
                                    <a href="{{url('admin/pagos/'.$pago->id.'/edit')}}" type="button" class="btn btn-success btn-sm">
                                        <i class="bi bi-pencil"></i>
                                    </a>
                                    <a href="{{url('admin/pagos/'.$pago->id.'/confirm-delete')}}" type="button" class="btn btn-danger btn-sm">
                                        <i class="bi bi-trash"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <hr>
            <h3>Total de montos pagados : $ {{ $total_monto }}</h3>
            <!--Script para DataTable--->
<script>
  $(function () {
        $("#example1").DataTable({
                                    "pageLength": 5,
                                    "language": {
                                        "emptyTable": "No hay información",
                                        "info": "Mostrando _START_ a _END_ de _TOTAL_ Pagos",
                                        "infoEmpty": "Mostrando 0 a 0 de 0 Pagos",
                                        "infoFiltered": "(Filtrado de _MAX_ total Pagos)",
                                        "infoPostFix": "",
                                        "thousands": ",",
                                        "lengthMenu": "Mostrar _MENU_ Pagos",
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
                                            text: '<button class="btn btn-info btn-block"><i class="bi bi-copy"></i> Copiar</button>',
                                            extend: 'copy',
                                        }, {
                                            text: '<button class="btn btn-danger btn-block"><i class="bi bi-filetype-pdf"></i> PDF</button>',
                                            extend: 'pdf'
                                        },{
                                            text: '<button class= "btn btn-warning btn-block"><i class="bi bi-filetype-csv"></i> CSV</button>',
                                            extend: 'csv'
                                        },{
                                            text: '<button class= "btn btn-success btn-block"><i class="bi bi-file-excel"></i> Excel</button>',
                                            extend: 'excel'
                                        },{
                                            text: '<button class= "btn btn-primary btn-block"> <i class="bi bi-printer-fill"></i> Imprimir</button>',
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