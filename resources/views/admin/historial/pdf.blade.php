<!doctype html>
<html lang="es">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Historiales clínicos</title>
  </head>
<body>
    <table border="0" style="font-size: 9pt">
        <tr>
            <td style="text-align: center">
                {{ $configuracion->nombre }} <br>
                {{ $configuracion->direccion }} <br>
                {{ $configuracion->telefono }} <br>
                {{ $configuracion->correo }} <br>
            </td>

            <td width="370px"></td>

            <td>
                <img src="{{public_path('storage/'.$configuracion->logo)}}" alt="logo" width="200px">
            </td>

        </tr>
    </table>

    <h2 style="text-align: center"><u>Historial clínico</u></h2>

    <br>

    <h3>Información del paciente</h3>
    <table>
        <tr>
            <td><b>Paciente:</b></td>
            <td>{{ $historial->paciente->apellido." ".$historial->paciente->nombres }}</td>
            
        </tr>

        <tr>
            <td><b>DNI:</b></td>
            <td>{{ $historial->paciente->dni }}</td>
        </tr>

        <tr>
            <td><b>Nro. Obra Social</b></td>
            <td>{{ $historial->paciente->nro_socio_obra_social }}</td>
        </tr>

        <tr>
            <td><b>Fecha de nacimiento:</b></td>
            <td>{{ $historial->paciente->fecha_nacimiento }}</td>
        </tr>
    </table>

    <hr>

    <h3>Información del Doctor</h3>
    <table>
        <tr>
            <td><b>Doctor:</b></td>
            <td>{{ $historial->doctor->apellido." ".$historial->doctor->nombres }}</td>
            
        </tr>

        <tr>
            <td><b>Matrícula:</b></td>
            <td>{{ $historial->doctor->matricula }}</td>
        </tr>

        <tr>
            <td><b>Especialidad:</b></td>
            <td>{{ $historial->doctor->especialidad }}</td>
        </tr>
    </table>

    <hr>

    <h3>Diagnóstico realizado</h3>
    <table>
        <tr>
            <td><b>Fecha:</b></td>
            <td>{{ $historial->fecha_visita}}</td>
            
        </tr>

        <tr>
            <td><b>Diagnóstico: </b></td>
            <td>{!! $historial->detalle !!}</td>
        </tr>

    </table>

</body>
</html>