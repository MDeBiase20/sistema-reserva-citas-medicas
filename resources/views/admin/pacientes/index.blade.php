@extends('layouts.admin')

@section('content')
    <div class="row"style="margin-left:20px">
        <h1>Listado de pacientes</h1>
    </div>

    <div class="row">
        <div class="col-sm-12">
                    <div class="card card-outline card-primary">
            <div class="card-header">
                <h3 class="card-title">Pacientes registrados</h3>

                <div class="card-tools">
                    <a href="{{url('admin/pacientes/create')}}" class="btn btn-primary btn-sm">
                        Registrar nuevo paciente
                    </a>
                </div>

            </div>

            <div class="card-body">
            <table id="example1" class="table table-striped table-bordered table-hover table-sm">
                <thead>
                    <tr>
                        <td>Nro</td>
                        <td>Nombre y apellido</td>
                        <td>Dni</td>
                        <td>Nro_Socio_Obra_Social</td>
                        <td>Fecha de nacimiento</td>
                        <td>Género</td>
                        <td>Celular</td>
                        <td>Dirección</td>
                        <td>Acciones</td>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $contador_pacientes = 1;
                    ?>
                    @foreach($pacientes as $paciente)
                        <tr>
                            <td style="text-align:center">{{$contador_pacientes++}}</td>
                            <td style="text-align:center">{{$paciente->nombres}} {{$paciente->apellido}}</td>
                            <td style="text-align:center">{{$paciente->dni}}</td>
                            <td style="text-align:center">{{$paciente->nro_socio_obra_social}}</td>
                            <td style="text-align:center">{{$paciente->fecha_nacimiento}}</td>
                            <td style="text-align:center">{{$paciente->genero}}</td>
                            <td style="text-align:center">{{$paciente->celular}}</td>
                            <td style="text-align:center">{{$paciente->direccion}}</td>
                            <td>
                                <div class="btn-group" role="group" aria-label="Basic example">
                                    <a href="{{url('admin/pacientes/'.$paciente->id)}}" type="button" class="btn btn-info btn-sm">
                                        <i class="bi bi-eye-fill"></i>
                                    </a>
                                    <a href="{{url('admin/pacientes/'.$paciente->id.'/edit')}}" type="button" class="btn btn-success btn-sm">
                                        <i class="bi bi-pencil"></i>
                                    </a>
                                    <a href="{{url('admin/pacientes/'.$paciente->id.'/confirm-delete')}}" type="button" class="btn btn-danger btn-sm">
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
                                        "info": "Mostrando _START_ a _END_ de _TOTAL_ Pacientes",
                                        "infoEmpty": "Mostrando 0 a 0 de 0 Pacientes",
                                        "infoFiltered": "(Filtrado de _MAX_ total Pacientes)",
                                        "infoPostFix": "",
                                        "thousands": ",",
                                        "lengthMenu": "Mostrar _MENU_ Pacientes",
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