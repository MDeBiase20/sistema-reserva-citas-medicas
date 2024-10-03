<?php

namespace App\Http\Controllers;

use App\Models\Pago;
use App\Models\Paciente;
use App\Models\Doctor;
use App\Models\Configuracione;
use Illuminate\Http\Request;
use Endroid\QrCode\QrCode;
use Endroid\QrCode\Writer\PngWriter;


class PagoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pagos = Pago::all();
        //consulta para sacar el total de los montos pagados
        $total_monto = Pago::sum('monto');
        return view('admin.pagos.index', compact('pagos', 'total_monto'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $pacientes = Paciente::orderBy('apellido', 'asc')->get();
        $doctores = Doctor::orderBy('apellido', 'asc')->get();
        return view('admin.pagos.create', compact('pacientes', 'doctores'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // $datos = request()->all();
        // return response()->json($datos);

        $request->validate([
            'monto'=>'required',
            'fecha_pago'=>'required',
            'descripcion'=>'required',
        ]);

        $pagos = new Pago();

        $pagos->monto = $request->monto;
        $pagos->fecha_pago = $request->fecha_pago;
        $pagos->descripcion = $request->descripcion;
        $pagos->paciente_id = $request->paciente_id;
        $pagos->doctor_id = $request->doctor_id;

        $pagos->save();

        return redirect()->route('admin.pagos.index')
        ->with('mensaje', 'Pago registrados correctamente')
        ->with('icono', 'success');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $pago = Pago::find($id);
        return view('admin.pagos.show', compact('pago'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $pagos = Pago::find($id);
        $pacientes = Paciente::orderBy('apellido', 'asc')->get();
        $doctores = Doctor::orderBy('apellido', 'asc')->get();
        return view('admin.pagos.edit', compact('pagos', 'pacientes', 'doctores'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // $datos = request()->all();
        // return response()->json($datos);
        $pago = Pago::find($id);
        $request->validate([
            'monto'=>'required',
            'fecha_pago'=>'required',
            'descripcion'=>'required',
        ]);

        $pago->monto = $request->monto;
        $pago->fecha_pago = $request->fecha_pago;
        $pago->descripcion = $request->descripcion;
        $pago->paciente_id = $request->paciente_id;
        $pago->doctor_id = $request->doctor_id;

        $pago->save();

        return redirect()->route('admin.pagos.index')
        ->with('mensaje', 'Se actualizó el pago de manera correcta')
        ->with('icono', 'success');
    }

    public function confirmDelete($id){
        
        $pago = Pago::find($id);
        return view('admin.pagos.delete', compact('pago'));
    }

    public function destroy($id)
    {
        Pago::destroy($id);

        return redirect()->route('admin.pagos.index')
        ->with('mensaje', 'Se eliminó el pago de manera correcta')
        ->with('icono', 'success');
    }

    public function pdf($id){
        #Consuta para traer el último registro de la configuración (datos de la clínica)
        $configuracion = Configuracione::latest()->first(); #esta consulta traé al último registro y a la vez el primero del último

        $pago = Pago::find($id);

        //Información que va a tener el código QR
        $data = "Código de seguridad del comprobante de pago del paciente "
        .$pago->paciente->apellido." ".$pago->paciente->nombres.
        " en fecha ".$pago->fecha_pago.
        "con el monto de". $pago->monto;

        //Generamos el código QR
        $qrCode = new QrCode($data);
        $writer = new PngWriter();
        $resultado = $writer->write($qrCode);
        $qrCodeBase64 = base64_encode($resultado->getString());


        $pdf = \PDF::loadView('admin.pagos.pdf', compact('configuracion', 'pago', 'qrCodeBase64'));

            //Código para mostrar un pie de página con la fecha, la cántidad de páginas que tiene el reporte y el usuario que lo generó
            // $pdf->output();
            // $dompdf = $pdf->getDomPDF();
            // $canvas = $dompdf->getCanvas();

            // // Agregar el texto al pie de página
            // $canvas->page_text(20, 800, "Impreso por: ".Auth::user()->email, null, 10, array(0,0,0));
            // $canvas->page_text(270, 800, "Página {PAGE_NUM} de {PAGE_COUNT}", null, 10, array(0,0,0));
            // $canvas->page_text(450, 800, "Fecha: ". \Carbon\Carbon::now()->format('d/m/Y'). " ".\Carbon\Carbon::now()->format('h:i:s'), null, 10, array(0,0,0));
            
            // Generar y mostrar el PDF
            return $pdf->stream();
    }

}
