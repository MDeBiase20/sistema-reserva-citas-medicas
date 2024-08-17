@extends('layouts.admin')

@section('content')
    <div class="row"style="margin-left:20px">
        <h1>Listado de reservas</h1>
    </div>

    <div class="row">
        <div class="col-sm-12">
                    <div class="card card-outline card-primary">
            <div class="card-header">
                <h3 class="card-title">Reservas registrados</h3>
            </div>

            <div class="card-body">
            <table id="example1" class="table table-striped table-bordered table-hover table-sm">
                <thead style="text-align:center">
                    <tr>
                        <td>Nro</td>
                        <td>Doctor</td>
                        <td>Especialidad</td>
                        <td>Fecha de Reserva</td>
                        <td>Hora de Reserva</td>
                        <td>Fecha y hora de registro</td>
                        <td>Acciones</td>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $contador_eventos = 1;
                    ?>
                    @foreach($eventos as $evento)
                        <tr>
                            <td style="text-align:center">{{$contador_eventos++}}</td>
                            <td style="text-align:center">{{$evento->doctor->nombres." ".$evento->doctor->apellido}}</td>
                            <td style="text-align:center">{{$evento->doctor->especialidad}}</td>
                            <td style="text-align:center">{{\Carbon\Carbon::parse($evento->start)->format('Y-m-d')}}</td>
                            <td style="text-align:center">{{\Carbon\Carbon::parse($evento->end)->format('H:i')}}</td>
                            <td style="text-align:center">{{$evento->created_at}}</td>
                            <td style="text-align:center">
                                <div class="btn-group" role="group" aria-label="Basic example">
                                    <form action="{{ url('/admin/eventos/destroy', $evento->id) }}" id="formulario{{ $evento->id }}" onclick="preguntar{{ $evento->id }} (event)" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger btn-sm" type="submit">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </form>
                                    <!--Función para el sweetAlert de eliminar el evento-->
                                        <script>
                                            function preguntar{{ $evento->id }} (evento) {
                                                event.preventDefault();
                                                Swal.fire({
                                                    title: "¿Estás seguro de eliminar este registro?",
                                                    text: "Si elimina esta reserva, otro usuario podrá usarlo para reserva su cita médica",
                                                    icon: "question",
                                                    showDenyButton: true,
                                                    showCancelButton: false,
                                                    confirmButtonText: "Eliminar",
                                                    denyButtonText: `Cancelar`
                                                        }).then((result) => {
                                                    /* Read more about isConfirmed, isDenied below */
                                                            if (result.isConfirmed) {
                                                                //En una variable form recupero el id del formulario para que se realice la eliminación
                                                                var form = $('#formulario{{ $evento->id }}')
                                                                form.submit()
                                                            } else if (result.isDenied) {
                                                                Swal.fire("Eliminación cancelada", "", "info");
                                                            }
                                                });
                                            }
                                        </script>
                                    <!--Función para el sweetAlert de eliminar el evento-->
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
                                        "info": "Mostrando _START_ a _END_ de _TOTAL_ Reservas",
                                        "infoEmpty": "Mostrando 0 a 0 de 0 Reservas",
                                        "infoFiltered": "(Filtrado de _MAX_ total Reservas)",
                                        "infoPostFix": "",
                                        "thousands": ",",
                                        "lengthMenu": "Mostrar _MENU_ Reservas",
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