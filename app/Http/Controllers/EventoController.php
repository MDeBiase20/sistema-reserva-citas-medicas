<?php

namespace App\Http\Controllers;

use App\Models\Evento;
use App\Models\Doctor;
use App\Models\Horario;
use App\Models\User;
use App\Models\Configuracione;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Barryvdh\DomPDF\PDF;


class EventoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //$datos = request()->all();

        //return response()->json($datos);


        $request->validate([

            'fecha_reserva'=>'required|date',

            'hora_reserva'=>'required|date_format:H:i',

        ]);


        $doctor = Doctor::find($request->doctor_id);

        $fecha_reserva = $request->fecha_reserva;

        $hora_reserva = $request->hora_reserva.':00';



        $dia = date('l',strtotime($fecha_reserva));

        $dia_de_reserva = $this->traducir_dia($dia);



        //valida si existe el horario del doctor

        $horarios = Horario::where('doctor_id',$doctor->id)

                    ->where('dia',$dia_de_reserva)

                    ->where('hora_inicio','<=',$hora_reserva)

                    ->where('hora_fin','>=',$hora_reserva)

                    ->exists();


        //Preguntamos si el horario no existe
        if(!$horarios){

            return redirect()->back()->with([

                'mensaje' => 'El doctor no esta disponible en ese horario.',

                'icono' => 'error',

                'hora_reserva'=> 'El doctor no esta disponible en ese horario.',

            ]);

        }

        $fecha_hora_reserva = $fecha_reserva." ".$hora_reserva;

        /// valida si existen eventos duplicado

        $eventos_duplicados = Evento::where('doctor_id',$doctor->id)

                            ->where('start', $fecha_hora_reserva)

                            ->exists();


        if($eventos_duplicados){

            return redirect()->back()->with([

                'mensaje' => 'Ya existe una reserva con el mismo doctor en esa fecha y hora.',

                'icono' => 'error',

                'hora_reserva'=> 'Ya existe una reserva con el mismo doctor en esa fecha y hora.',

            ]);

        }


        $evento = new Evento();

        $evento->title = $request->hora_reserva." ".$doctor->especialidad;

        $evento->start = $request->fecha_reserva." ".$hora_reserva;

        $evento->end = $request->fecha_reserva." ".$hora_reserva;

        $evento->color = '#e82216';

        $evento->user_id = Auth::user()->id;

        $evento->doctor_id  = $request->doctor_id;

        $evento->consultorio_id   = '1';

        $evento->save();



        return redirect()->route('admin.index')

            ->with('mensaje','Se registro la reserva de la cita medica la manera correcta')

            ->with('icono','success');

    }

    private function traducir_dia($dia){

        $dias=[

            'Monday' => 'LUNES',

            'Tuesday' => 'MARTES',

            'Wednesday' => 'MIERCOLES',

            'Thursday' => 'JUEVES',

            'Friday' => 'VIERNES',

            'Saturday' => 'SABADO',

            'Sunday' => 'DOMINGO',

        ];

        return $dias[$dia]??$dias;

    }


    /**
     * Display the specified resource.
     */
    public function show(Evento $evento)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Evento $evento)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Evento $evento)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Evento::destroy($id);
        return redirect()->route('admin.index')
        ->with('mensaje','Se eliminó de manera correcta la reserva')
        ->with('icono', 'success');
    }

    public function reportes(){
        return view('admin.reservas.reportes');
    }

    public function pdf(){
        #Consuta para traer el último registro de la configuración (datos de la clínica)
        $configuracion = Configuracione::latest()->first(); #esta consulta traé al último registro y a la vez el primero del último

        $eventos = Evento::all();

        $pdf = \PDF::loadView('admin.reservas.pdf', compact('configuracion', 'eventos'));

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

    public function pdf_fechas(Request $request){
        $configuracion = Configuracione::latest()->first();

        //Almaceno en unas variables los names de las fechas de inicio y de fin 
        $fecha_inicio = $request->input('fecha_inicio');
        $fecha_fin = $request->input('fecha_fin');

        $eventos = Evento::whereBetween('start', [$fecha_inicio, $fecha_fin])->get();

        $pdf = \PDF::loadView('admin.reservas.pdf_fechas', compact('configuracion', 'eventos', 'fecha_inicio', 'fecha_fin'));

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
