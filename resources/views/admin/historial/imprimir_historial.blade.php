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
            <td>{{ $paciente->apellido." ".$paciente->nombres }}</td>
            
        </tr>

        <tr>
            <td><b>DNI:</b></td>
            <td>{{ $paciente->dni }}</td>
        </tr>

        <tr>
            <td><b>Nro. Obra Social</b></td>
            <td>{{ $paciente->nro_socio_obra_social }}</td>
        </tr>

        <tr>
            <td><b>Fecha de nacimiento:</b></td>
            <td>{{ $paciente->fecha_nacimiento }}</td>
        </tr>
    </table>

    <hr>
    @foreach($historiales as $historial)
    
        <table>
            <h3>Diagnósticos realizados</h3>
            <tr>
                <td><b>Fecha: </b></td>
                <td>{{ $historial->fecha_visita }}</td>
            </tr>

            <tr>
                <td><b>Detalle: </b></td>
                <td>{!! $historial->detalle !!}</td>
            </tr>
        
        </table>
        <hr>   
    @endforeach

</body>
</html>