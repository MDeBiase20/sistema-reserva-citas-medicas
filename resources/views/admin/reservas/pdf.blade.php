<!doctype html>
<html lang="es">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Listado de todas las reservas de citas médicas</title>
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

            <td width="330px"></td>

            <td>
                <img src="{{public_path('storage/'. " ".$configuracion->logo)}}" alt="logo" width="300px">
            </td>

        </tr>
    </table>

    <h2 style="text-align: center"><u>Listado de todas las reservas de citas médicas</u></h2>

    <table class="table table-striped">
        <thead style="text-align: center">
            <tr style="background-color: #e7e7e7">
                <th>Nro</th>
                <th>Doctor</th>
                <th>Especialidad</th>
                <th>Fecha de reserva</th>
                <th>Hora de reserva</th>
            </tr>
        </thead>

        <tbody>
            <?php $contador = 1; ?>
            @foreach($eventos as $evento)
                <tr>
                    <td style="text-align: center">{{ $contador++ }}</td>
                    <td style="text-align: center">{{ $evento->doctor->nombres." ".$evento->doctor->apellido}}</td>
                    <td style="text-align: center">{{ $evento->doctor->especialidad }}</td>
                    <td style="text-align: center">{{ \Carbon\Carbon::parse($evento->start)->format('Y-m-d') }}</td>
                    <td style="text-align: center">{{ \Carbon\Carbon::parse($evento->start)->format('H:i:s') }}</td>
                </tr>
            @endforeach
        </tbody>

    </table>

  </body>
</html>