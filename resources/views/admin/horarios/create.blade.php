@extends('layouts.admin')

@section('content')
    <div class="row" style="margin-left:40px">
        <h1>Registro de un nuevo horario</h1>
    </div>
    <hr>

    <div class="row">
        <div class="col-md-12">
            <div class="card card-outline card-primary">
                <div class="card-header">
                    <h3 class="card-title">Llene los datos</h3>
                </div>

                    <div class="card-body row">

                            <div class="col-md-3">
                                <form action="{{url('/admin/horarios/create')}}" method="post">
                                @csrf

                                <div class="row">

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="">Consultorios</label> <b>*</b>
                                            <select name="consultorio_id" id="consultorio_select" class="form-control" id="">
                                                <option value="">Seleccionar consultorio</option>
                                                @foreach($consultorios as $consultorio)
                                                    <option value="{{ $consultorio->id }}">{{ $consultorio->nombre." - Ubicación: ".$consultorio->ubicacion}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="">Doctores</label> <b>*</b>
                                            <select name="doctor_id" class="form-control" id="">
                                                @foreach($doctores as $doctor)
                                                    <option value="{{ $doctor->id }}">{{ $doctor->nombres." ".$doctor->apellido." - ".$doctor->especialidad }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>    
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="">Día</label> <b>*</b>
                                            <select name="dia" class="form-control" id="">
                                                <option value="LUNES">LUNES</option>
                                                <option value="MARTES">MARTES</option>
                                                <option value="MIERCOLES">MIÉRCOLES</option>
                                                <option value="JUEVES">JUEVES</option>
                                                <option value="VIERNES">VIERNES</option>
                                                <option value="SABADO">SABADO</option>
                                                <option value="DOMINGO">DOMINGO</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="">Hora de inicio</label> <b>*</b>
                                            <input type="time" value="{{old('hora_inicio')}}" name="hora_inicio" class="form-control" required>
                                            @error('hora_inicio')
                                                <small style="color:red">{{$message}}</small>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="">Hora final</label> <b>*</b>
                                            <input type="time" value="{{old('hora_fin')}}" name="hora_fin" class="form-control" required>
                                            @error('hora_fin')
                                                <small style="color:red">{{$message}}</small>
                                            @enderror
                                        </div>
                                    </div>

                                </div>

                                <hr>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <a href="{{url('admin/horarios')}}" class="btn btn-secondary">Cancelar</a>
                                            <button type="submit" class="btn btn-primary">Registrar horario</button>
                                        </div>
                                    </div>
                                </div>

                            </form>
                            </div>

                            <div class="col-md-9">
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