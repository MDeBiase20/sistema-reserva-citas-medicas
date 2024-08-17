@extends('layouts.admin')

@section('content')
    <div class="row" style="margin-left:20px">
        <!--Del usuario autenticado me traiga el nombre
        El método "pluck" lo que hace es obtener todos los registros pero únicamente
        con los valores del campo "name" que se encuentra en la tabla roles-->
        <h1><b>Bienvenido:</b> {{Auth::user()->email}} / <b>Rol:</b> {{ Auth::user()->roles->pluck('name')->first()}}</h1>
    </div>

    <!-- Para mostrar en el panel principal la información que tiene cada usuario según su rol
    usamos la palabra reservada de Laravel can('la ruta que tiene acceso ese usuario')-->
        
    <div class="row">
        @can('admin.usuarios.index')
            <div class="col-lg-3 col-6">

                <div class="small-box bg-info">
                <div class="inner">
                <h3>{{$total_usuarios}}</h3>
                <p>Usuarios</p>
                </div>
                <div class="icon">
                <i class="ion fas bi bi-file-person"></i>
                </div>
                <a href="{{url('admin/usuarios')}}" class="small-box-footer">Más información<i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
        @endcan
            
            @can('admin.secretarias.index')
                <div class="col-lg-3 col-6">

                    <div class="small-box bg-primary">
                    <div class="inner">
                    <h3>{{$total_secretarias}}</h3>
                    <p>Secretarias</p>
                    </div>
                    <div class="icon">
                    <i class="ion fas bi bi-person-circle"></i>
                    </div>
                    <a href="{{url('admin/secretarias')}}" class="small-box-footer">Más información<i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
            @endcan
            
            @can('admin.pacientes.index')
                <div class="col-lg-3 col-6">

                    <div class="small-box bg-success">
                    <div class="inner">
                    <h3>{{$total_pacientes}}</h3>
                    <p>Pacientes</p>
                    </div>
                    <div class="icon">
                        <i class="ion fas bi bi-person-wheelchair"></i>
                    </div>
                    <a href="{{url('admin/pacientes')}}" class="small-box-footer">Más información<i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
            @endcan    
            
            @can('admin.consultorios.index')
                <div class="col-lg-3 col-6">

                    <div class="small-box bg-warning">
                    <div class="inner">
                    <h3>{{$total_consultorios}}</h3>
                    <p>Consultorios</p>
                    </div>
                    <div class="icon">
                        <i class="ion fas bi bi-hospital"></i>
                    </div>
                    <a href="{{url('admin/consultorios')}}" class="small-box-footer">Más información<i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
            @endcan    
            
            @can('admin.doctores.index')
                <div class="col-lg-3 col-6">

                    <div class="small-box bg-danger">
                    <div class="inner">
                    <h3>{{$total_doctores}}</h3>
                    <p>Doctores</p>
                    </div>
                    <div class="icon">
                        <i class="ion fas bi bi-heart-pulse"></i>
                    </div>
                    <a href="{{url('admin/doctores')}}" class="small-box-footer">Más información<i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
            @endcan    
            
            @can('admin.horarios.index')
                <div class="col-lg-3 col-6">

                    <div class="small-box bg-secondary">
                    <div class="inner">
                    <h3>{{$total_horarios}}</h3>
                    <p>Horarios</p>
                    </div>
                    <div class="icon">
                        <i class="ion fas bi bi-calendar2-week"></i>
                    </div>
                    <a href="{{url('admin/horarios')}}" class="small-box-footer">Más información<i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
            @endcan    
    </div>

    @can('cargar_datos_consultorios')
        <div class="row">
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
                                    <option value="">Seleccione un consultorio...</option>
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

        <!--Segundo calendario-->
        <div class="row">
            <!-- Calendario -->
            <div class="col-sm-12">
                <div class="card card-outline card-warning">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-4">
                                <h3 class="card-title">Calendario de reserva de citas medicas</h3>
                            </div>
                            <div class="col-md-4">
                                <div style="float: right">
                                    <label for="">Doctores</label>
                                </div> 
                            </div>
                            
                            <div class="col-md-4" style="float: right">
                                <select name="doctor_id" id="doctor_select" class="form-control" id="">
                                    <option value="">Seleccione su doctor...</option>
                                    @foreach($doctores as $doctor)
                                        <option value="{{ $doctor->id }}">{{ $doctor->nombres." ".$doctor->apellido." - ".$doctor->especialidad}}</option>
                                    @endforeach
                                </select>
                            </div>

                        </div>

                    </div>

                    <div class="card-body">
                        
                        <div class="row">
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                                Registrar cita médica
                            </button>

                            <a style="margin-left: 5px" href="{{ url('/admin/ver_reservas', Auth::user()->id) }}" class="btn btn-success"> <i class="bi bi-calendar-week"></i> Ver historial de citas médicas</a>

                            <!-- Modal -->
                            <form action="{{ url('/admin/eventos/create') }}" method="post">
                                @csrf
                                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Reserva de cita médica</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label for="">Doctor</label>
                                                            <select name="doctor_id" class="form-control" id="">
                                                                @foreach($doctores as $doctor)
                                                                    <option value="{{ $doctor->id }}">
                                                                        {{ $doctor->nombres." ".$doctor->apellido." - ".
                                                                            $doctor->especialidad }}
                                                                    </option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                    </div>
        
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label for="">Fecha de reserva</label>
                                                                <input type="date" class="form-control" value="<?php echo date("Y-m-d"); ?>" name="fecha_reserva" id="fecha_reserva">
                                                                @error('fecha_reserva')
                                                                    <small style="color:red">{{$message}}</small>
                                                                @enderror
                                                                <!--Script para validar que la fecha de reserva no sea anterior a la fecha actual-->
                                                                <script>

                                                                    document.addEventListener('DOMContentLoaded',function (){
            
                                                                        const fechaReservaInput=document.getElementById('fecha_reserva');

                                                                        //Escuchar el evento de cambio en el campo de fecha reserva
            
                                                                        fechaReservaInput.addEventListener('change',function (){
            
                                                                            let selectedDate=this.value;//Obtener la Fecha seleccionada
            
                                                                            //Obtener la fecha actual en formato ISO (yyyy-mm-dd)
            
                                                                            let today=new Date().toISOString().slice(0,10);
            
                                                                            //Verificar si la fecha seleccionada es anterior a la fecha actual
            
                                                                            if (selectedDate < today){
            
                                                                                //Si es así, establecer la fecha seleccionada en null
            
                                                                                this.value=null;
            
                                                                                alert ('No se puede reservar en una fecha pasada.')
            
                                                                            }
            
                                                                        })
            
                                                                    })
            
                                                                </script>
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label for="">Hora de reserva</label>
                                                                <input type="time" class="form-control" name="hora_reserva" id="hora_reserva">
                                                                @error('hora_reserva')
                                                                    <small style="color:red">{{$message}}</small>
                                                                @enderror

                                                                @if( ($message = Session::get('hora_reserva')))
                                                                    <script>
                                                                        document.addEventListener('DOMContentLoaded', function(){
                                                                            $('#exampleModal').modal('show')
                                                                        })
                                                                    </script>
                                                                    <small style="color:red">{{$message}}</small>
                                                                @endif    

                                                                <!--Script para validar que la hora de reserva sea entre las 08:00 hasta las 20:00-->
                                                                <script>

                                                                    document.addEventListener('DOMContentLoaded', function (){
            
                                                                        const horaReservaInput = document.getElementById('hora_reserva')
            
                                                                        horaReservaInput.addEventListener('change',function (){
            
                                                                            let seletedTime = this.value;
            
                                                                            if(seletedTime){
            
                                                                                seletedTime = seletedTime.split(':')
            
                                                                                seletedTime = seletedTime[0]+ ':00'
            
                                                                                this.value = seletedTime
            
                                                                            }
            
                                                                            if(seletedTime<'08:00' || seletedTime>'20:00'){
            
                                                                                this.value = null;
            
                                                                                alert('Por favor ingrese un horario entre las 08:00 de la mañana y 20:00 de la noche')
            
                                                                            }
            
                                                                        })
            
                                                                    })
            
                                                                </script>
                                                        </div>
                                                    </div>
        
                                                </div>
                                            </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                            <button type="submit" class="btn btn-primary">Registrar</button>
                                        </div>
                                    </div>
                                    </div>
                                </div>
                            </form>
                        </div>

                        <div id='calendar'></div>
                    </div>
                    
                </div>    
            </div>
            
        </div>
    @endcan

    <!---Validación para que me muestre las reserva de los doctores cuando el usuario 
    ingresado es un doctor-->
    <!--Si la autenticación está chequada y el usuario tiene relación con el modelo doctor-->
    @if(Auth::check() && Auth::user()->doctor)
        <div class="row">
            <!-- Calendario -->
            <div class="col-md-12">
                <div class="card card-outline card-primary">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-md-4">
                                <h3 class="card-title">Calendario de reservas</h3>
                            </div>
                        </div>
        
                    </div>
        
                    <div class="card-body">
                        <table id="example1" class="table table-striped table-bordered table-hover table-sm">
                            
                            <thead>
                                <tr>
                                    <td>Nro</td>
                                    <td>Usuario</td>
                                    <td>Fecha de reserva</td>
                                    <td>Hora de reserva</td>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $contador_eventos = 1;
                                ?>
                                @foreach($eventos as $evento)
                                    <!--Si la autenticación del usuario como doctor es igual al id del doctor de ese evento -->
                                    @if(Auth::user()->doctor->id == $evento->doctor_id)
                                        <tr>
                                        <td style="text-align:center">{{$contador_eventos++}}</td>
                                        <td style="text-align:center">{{$evento->user->name}}</td>
                                        <td style="text-align:center">{{\Carbon\Carbon::parse($evento->start)->format('Y-m-d')}}</td>
                                        <td style="text-align:center">{{\Carbon\Carbon::parse($evento->end)->format('H:i')}}</td>
                                    </tr>
                                    @endif
                                    
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>    
            </div>
        </div>
    @endif

    <!--Código JQuery para seleccionar el consultorio y se carguen las reservas-->
    <script>
        $('#consultorio_select').on('change', function(){
           //creamos la variable para traer el id del consultorio
            var consultorio_id = $('#consultorio_select').val()
            //alert(consultorio_id)
            var url = "{{ route ('cargar_datos_consultorios', ':id') }}"
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

    <!--Script FullCalendar-->

    <!--Código Ajax para seleccionar el doctor y se carguen las reservas-->
    <script>
        $('#doctor_select').on('change', function(){
           //creamos la variable para traer el id del consultorio
            var doctor_id = $('#doctor_select').val()
            //alert(doctor_id)

            //Script FullCalendar
            var calendarEl = document.getElementById('calendar');
            var calendar = new FullCalendar.Calendar(calendarEl, {
            initialView: 'dayGridMonth',
            locale: 'es',
            events: [],   
        });

    //Script FullCalendar

            var url = "{{ route ('cargar_reserva_doctores', ':id') }}"
            url = url.replace(':id', doctor_id)

                //Si el consultorio existe habiltamos Ajax
                if(doctor_id){
                    $.ajax({
                    url: url,
                    type:'GET',
                    dataType:'json',
                    success: function(data){
                            calendar.addEventSource(data);
                        },
                        error: function(){
                            alert("Error al obtener los datos del consultorio")
                            }
                    });
                }else{
                    $('#doctor_info').html('')
                }
                calendar.render();
        })
</script>

<!--Script para DataTable--->
<script>
    $(function () {
        $("#example1").DataTable({
            "pageLength": 5,
                "language": {
                        "emptyTable": "No hay información",
                        "info": "Mostrando _START_ a _END_ de _TOTAL_ Consultorios",
                        "infoEmpty": "Mostrando 0 a 0 de 0 Consultorios",
                        "infoFiltered": "(Filtrado de _MAX_ total Consultorios)",
                        "infoPostFix": "",
                        "thousands": ",",
                        "lengthMenu": "Mostrar _MENU_ Consultorios",
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

@endsection