<?php

namespace App\Http\Controllers;

use App\Models\Historial;
use App\Models\Paciente;
use App\Models\Configuracione;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HistorialController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //Consulta de los historiales con las relaciones que tiene con pacientes y doctores
        $historiales = Historial::with('paciente', 'doctor')->get();
        return view('admin.historial.index', compact('historiales'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $pacientes = Paciente::orderBy('apellido', 'asc')->get();
        return view('admin.historial.create', compact('pacientes'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // $datos = request()->all();
        // return response()->json($datos);
        //Validación de los datos
        $request->validate([
            'detalle'=>'required',
            'fecha_visita'=>'required',
            'paciente_id'=>'required'
        ]);

        $historial = new Historial();

        $historial->detalle = $request->detalle;
        $historial->fecha_visita = $request->fecha_visita;
        $historial->paciente_id = $request->paciente_id;

        //traemos el id del doctor de forma interna
        $historial->doctor_id = Auth::user()->doctor->id;

        $historial->save();

        return redirect()->route('admin.historial.index')
        ->with('mensaje', 'Se registró el historial clínico de manera exitosa')
        ->with('icono', 'success');
    }


    public function show($id)
    {
        $historial = Historial::find($id);
        return view('admin.historial.show', compact('historial'));
    }


    public function edit($id)
    {
        $historial = Historial::find($id);
        $pacientes = Paciente::orderBy('apellido', 'asc')->get();
        return view('admin.historial.edit', compact('historial', 'pacientes'));
    }


    public function update(Request $request, $id)
    {
        // $datos = request()->all();
        // return response()->json($datos);

        $historial = Historial::find($id);

        $historial->detalle = $request->detalle;
        $historial->fecha_visita = $request->fecha_visita;
        $historial->paciente_id = $request->paciente_id;

        $historial->save();

        return redirect()->route('admin.historial.index')
        ->with('mensaje', 'Se actualizó el registro de manera correcta')
        ->with('icono', 'success');
    }

    public function confirmDelete($id){

        $historial = Historial::find($id);
        
        return view('admin.historial.delete', compact('historial'));
    }

    public function destroy($id)
    {
        $historial = Historial::find($id);
        $historial->delete();

        return redirect()->route('admin.historial.index')
        ->with('mensaje', 'Se eliminó el historial clínico de la base de datos de manera correcta')
        ->with('icono', 'success');
    }

    public function pdf($id){
        #Consuta para traer el último registro de la configuración (datos de la clínica)
        $configuracion = Configuracione::latest()->first(); #esta consulta traé al último registro y a la vez el primero del último

        $historial = Historial::find($id);

        $pdf = \PDF::loadView('admin.historial.pdf', compact('configuracion', 'historial'));

            //Código para mostrar un pie de página con la fecha, la cántidad de páginas que tiene el reporte y el usuario que lo generó
            $pdf->output();
            $dompdf = $pdf->getDomPDF();
            $canvas = $dompdf->getCanvas();

            // Agregar el texto al pie de página
            $canvas->page_text(20, 800, "Impreso por: ".Auth::user()->email, null, 10, array(0,0,0));
            $canvas->page_text(270, 800, "Página {PAGE_NUM} de {PAGE_COUNT}", null, 10, array(0,0,0));
            $canvas->page_text(450, 800, "Fecha: ". \Carbon\Carbon::now()->format('d/m/Y'). " ".\Carbon\Carbon::now()->format('h:i:s'), null, 10, array(0,0,0));

            // Generar y mostrar el PDF
            return $pdf->stream();
    }

    public function buscar_paciente(Request $request){

        $dni = $request->dni;
        $paciente = Paciente::where('dni', $dni)->first();

        return view('admin.historial.buscar_paciente', compact('paciente'));
    }

    public function imprimir_historial($id){

        #Consuta para traer el último registro de la configuración (datos de la clínica)
        $configuracion = Configuracione::latest()->first(); #esta consulta traé al último registro y a la vez el primero del último

        $paciente = Paciente::find($id);

        $historiales = Historial::where('paciente_id', $id)->get();

        $pdf = \PDF::loadView('admin.historial.imprimir_historial', compact('configuracion', 'historiales', 'paciente'));

            //Código para mostrar un pie de página con la fecha, la cántidad de páginas que tiene el reporte y el usuario que lo generó
            $pdf->output();
            $dompdf = $pdf->getDomPDF();
            $canvas = $dompdf->getCanvas();

            // Agregar el texto al pie de página
            $canvas->page_text(20, 800, "Impreso por: ".Auth::user()->email, null, 10, array(0,0,0));
            $canvas->page_text(270, 800, "Página {PAGE_NUM} de {PAGE_COUNT}", null, 10, array(0,0,0));
            $canvas->page_text(450, 800, "Fecha: ". \Carbon\Carbon::now()->format('d/m/Y'). " ".\Carbon\Carbon::now()->format('h:i:s'), null, 10, array(0,0,0));
            
            // Generar y mostrar el PDF
            return $pdf->stream();
    }
}
