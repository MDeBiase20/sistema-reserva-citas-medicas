<!doctype html>
<html lang="es">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Comprobante de pago</title>
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

            <td width="430px"></td>

            <td>
                <img src="{{public_path('storage/'.$configuracion->logo)}}" alt="logo" width="150px">
            </td>

        </tr>
    </table>

    <h2 style="text-align: center"><u>COMPROBANTE DE PAGO - ORIGINAL</u></h2>


    <table border="0"  >
        <tr>
            <td width="120px"><b>Sr(es): </b></td>
            <td>{{ $pago->paciente->apellido." ".$pago->paciente->nombres }}</td>
            <td width="150px" rowspan="4"></td>
            <td rowspan="4">
                <div>
                    <img src="data:image/png;base64,{{ $qrCodeBase64 }}" alt="logoQr" width="150px">
                </div>
            </td>
        </tr>

        <tr>
            <td><b>Fecha: </b></td>
            <td>{{ $pago->fecha_pago }}</td>
        </tr>

        <tr>
            <td><b>Consultorio: </b></td>
            <td>{{ $pago->doctor->especialidad }}</td>
        </tr>

        <tr>
            <td><b>Monto: </b></td>
            <td>{{ $pago->monto }}</td>
        </tr>

    </table>
    <br><br><br>
    <!---Tabla para las firmas--->
    <table border="0" style="font-size: 9pt">
        <tr>
            <td width="220px">
                <p style="text-align: center">
                    ------------------------------------------ <br>
                    <b style="text-align: center">Secretaria</b> <br>
                    {{ Auth::user()->secretarias->apellido." ".Auth::user()->secretarias->nombres }}
                </p>
            </td>
            <td width="220px"></td>
            <td width="220px">
                <p style="text-align: center">
                    ------------------------------------------ <br>
                    <b style="text-align: center">Paciente</b> <br>
                </p>
            </td>
        </tr>
    </table>

    <p>--------------------------------------------------------------------------------------------------------------------------------</p>

    <table border="0" style="font-size: 9pt">
        <tr>
            <td style="text-align: center">
                {{ $configuracion->nombre }} <br>
                {{ $configuracion->direccion }} <br>
                {{ $configuracion->telefono }} <br>
                {{ $configuracion->correo }} <br>
            </td>

            <td width="430px"></td>

            <td>
                <img src="{{public_path('storage/'.$configuracion->logo)}}" alt="logo" width="150px">
            </td>

        </tr>
    </table>

    <h2 style="text-align: center"><u>COMPROBANTE DE PAGO - DUPLICADO</u></h2>


    <table border="0"  >
        <tr>
            <td width="120px"><b>Sr(es): </b></td>
            <td>{{ $pago->paciente->apellido." ".$pago->paciente->nombres }}</td>
            <td width="150px" rowspan="4"></td>
            <td rowspan="4">
                <div>
                    <img src="data:image/png;base64,{{ $qrCodeBase64 }}" alt="logoQr" width="150px">
                </div>
            </td>
        </tr>

        <tr>
            <td><b>Fecha: </b></td>
            <td>{{ $pago->fecha_pago }}</td>
        </tr>

        <tr>
            <td><b>Consultorio: </b></td>
            <td>{{ $pago->doctor->especialidad }}</td>
        </tr>

        <tr>
            <td><b>Monto: </b></td>
            <td>{{ $pago->monto }}</td>
        </tr>

    </table>
    <br><br><br>
    <!---Tabla para las firmas--->
    <table border="0" style="font-size: 9pt">
        <tr>
            <td width="220px">
                <p style="text-align: center">
                    ------------------------------------------ <br>
                    <b style="text-align: center">Secretaria</b> <br>
                    {{ Auth::user()->secretarias->apellido." ".Auth::user()->secretarias->nombres }}
                </p>
            </td>
            <td width="220px"></td>
            <td width="220px">
                <p style="text-align: center">
                    ------------------------------------------ <br>
                    <b style="text-align: center">Paciente</b> <br>
                </p>
            </td>
        </tr>
    </table>

</body>
</html>