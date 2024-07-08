
<table style="text-align: center" class="table table-striped table-hover table-sm table-bordered">
    <thead>
        <tr>
            <th>Día</th>
            <th>Lunes</th>
            <th>Martes</th>
            <th>Miércoles</th>
            <th>Jueves</th>
            <th>Viernes</th>
            <th>Sábado</th>
            <th>Domingo</th>
        </tr>
    </thead>

        <tbody>
            @php
                //Almacenamos las horas en un array para después mostrarlas en la tabla de abajo
                $horas = ['08:00:00 - 09:00:00', '09:00:00 - 10:00:00', '10:00:00 - 11:00:00', '11:00:00 - 12:00:00', '12:00:00 - 13:00:00', '13:00:00 - 14:00:00', '14:00:00 - 15:00:00','15:00:00 - 16:00:00', '16:00:00 - 17:00:00', '17:00:00 - 18:00:00', '18:00:00 - 19:00:00', '19:00:00 - 20:00:00'];

                //Almacenamos los días de la semana en un array
                $diaSemana = ['LUNES', 'MARTES', 'MIERCOLES', 'JUEVES', 'VIERNES', 'SABADO', 'DOMINGO'];
            @endphp

            <!--Recorro el array $horas en un foreach para después mostrarlos dentro de una etiqueta <td>-->
            @foreach($horas as $hora)
                @php
                /*
                Creao una lista "list()" para unir la hora de inicio con la hora final y mediante un "explode()"
                que me permite buscar caracteres pueda encontrar los intervalos de las horas.
                Las variables $hora_inicio y $hora_fin son donde se van a almacenar las horas de incio y fin
                que se encuentran almacenadas en la BD.
                */
                    list($hora_inicio, $hora_fin) = explode(' - ', $hora);
                @endphp
                <tr>
                    <td>{{ $hora }}</td>
                        @foreach($diaSemana as $dia)
                            @php
                                $nombre_doctor = '';
                                //Recorremos en un foreach los horarios que se encuentran en la base de datos.
                                foreach ($horarios as $horario) {
                                    /*
                                    Hacemos la condición para preguntar y hacer el intervalo
                                    para mostrar la respuesta. Uso el strtoupper por que los días de la semana
                                    están en mayúscula.
                                    */
                                    if (strtoupper($horario->dia) == $dia &&
                                        $hora_inicio >= $horario->hora_inicio &&
                                        $hora_fin <= $horario->hora_fin) {
                                        
                                            $nombre_doctor = $horario->doctor->nombres." ".$horario->doctor->apellido;
                                            
                                            /*
                                            El break lo que hace es que de un salto para que temrine, salga y vaya
                                            recorriendo el foreach. 
                                            */
                                            break;
                                    }
                                }
                            @endphp
                        <td>
                            {{ $nombre_doctor }}
                        </td>

                        @endforeach
                </tr>
            @endforeach

        </tbody>

</table>