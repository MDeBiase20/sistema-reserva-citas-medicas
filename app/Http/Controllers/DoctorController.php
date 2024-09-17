<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\User;
use App\Models\Configuracione;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

use Barryvdh\DomPDF\PDF;

class DoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //se hace de esta manera por la relación que hay entre la tabla doctores y usuario
        $doctores = Doctor::with('user')->orderBy('id', 'desc')->get();
        return view('admin.doctores.index', compact('doctores'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.doctores.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // $datos = request()->all();
        // return response()->json($datos);
        $request->validate([
            'nombres'=>'required',
            'apellido'=>'required',
            'telefono'=>'required',
            'matricula'=>'required',
            'especialidad'=>'required',
            'email'=>'required | max:250 | unique:users',
            'password'=>'required | max:250 | confirmed',
        ]);

        $usuario = new User();
        $usuario->name = $request->nombres;
        $usuario->email = $request->email;
        $usuario->password = Hash::make($request['password']);

        $usuario->save();

        $doctor = new Doctor();
        $doctor->user_id = $usuario->id;
        $doctor->nombres = $request->nombres;
        $doctor->apellido = $request->apellido;
        $doctor->telefono = $request->telefono;
        $doctor->matricula = $request->matricula;
        $doctor->especialidad = $request->especialidad;

        $doctor->save();

        //Asignamos el rol "doctor" a los doctores registrados
        $usuario->assignRole('doctor');

        return redirect()->route('admin.doctores.index')
        ->with('mensaje', 'Se registró el doctor de manera correcta')
        ->with('icono', 'success');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $doctor = Doctor::findOrFail($id);
        return view('admin.doctores.show', compact('doctor'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $doctor = Doctor::with('user')->findOrFail($id);
        return view('admin.doctores.edit', compact('doctor'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $doctor = Doctor::find($id);
        $request->validate([
            'nombres'=>'required',
            'apellido'=>'required',
            'telefono'=>'required',
            'matricula'=>'required',
            'especialidad'=>'required',
            'email'=>'required | max:250 | unique:users,email,'.$doctor->user->id,
            'password'=>'nullable | max:250 | confirmed',
        ]);

        $doctor->nombres = $request->nombres;
        $doctor->apellido = $request->apellido;
        $doctor->telefono = $request->telefono;
        $doctor->matricula = $request->matricula;
        $doctor->especialidad = $request->especialidad;

        $doctor->save();

        $usuario = User::find($doctor->user->id);
        $usuario->email = $request->email;

        //Condición para saber si el campo password se ha tocado
        if($request->filled('password')){
            $usuario->password = Hash::make($request['password']);
        }

        $usuario->save();

        return redirect()->route('admin.doctores.index')
        ->with('mensaje', 'Se actualizó el doctor de manera correcta')
        ->with('icono', 'success');
    }

    public function confirmDelete($id){
        $doctor = Doctor::with('user')->findOrFail($id);
        return view('admin.doctores.delete', compact('doctor'));
    }

    public function destroy($id)
    {
        //Buscamos el doctor
        $doctor = Doctor::find($id);

        //Primero eliminamos al usuario asociado
        $user = $doctor->user;
        $user->delete();

        //Después eliminamos al doctor
        $doctor->delete();

        return redirect()->route('admin.doctores.index')
        ->with('mensaje', 'Se eliminó el doctor de la base de datos de manera correcta')
        ->with('icono', 'success');
    }

    public function reportes(){
        return view('admin.doctores.reportes');
    }

    public function pdf(){
        #Consuta para traer el último registro de la configuración (datos de la clínica)
        $configuracion = Configuracione::latest()->first(); #esta consulta traé al último registro y a la vez el primero del último

        $doctores = Doctor::all();

        $pdf = \PDF::loadView('admin.doctores.pdf', compact('configuracion', 'doctores'));

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
