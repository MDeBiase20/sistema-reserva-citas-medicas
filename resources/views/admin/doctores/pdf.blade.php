<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
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
                <img src="{{ url('storage/'.$configuracion->logo) }}" alt="logo" width="300px">
            </td>

        </tr>
    </table>
    <h2 style="text-align: center"><u>Listado de doctores</u></h2>

    <table class="table table-bordered table-striped">
        <thead>
            <tr style="background-color: #e7e7e7">
                <th>Nro</th>
                <th>Nombres y apellido</th>
                <th>Teléfono</th>
                <th>Matrícula</th>
                <th>Especialidad</th>
            </tr>
        </thead>

        <tbody>
            <?php $contador = 1; ?>
            @foreach($doctores as $doctor)
                <tr>
                    <td>{{ $contador++ }}</td>
                    <td>{{ $doctor->apellido. " ".$doctor->nombres }}</td>
                    <td>{{ $doctor->telefono }}</td>
                    <td>{{ $doctor->matricula }}</td>
                    <td>{{ $doctor->especialidad }}</td>
                </tr>
            @endforeach
        </tbody>

    </table>

</body>
</html>