<?php

namespace App\Http\Controllers;

use App\Models\Paciente;
use Illuminate\Http\Request;

class PacienteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pacientes = Paciente::orderBy('id','desc')->get();
        return view('admin.pacientes.index', compact('pacientes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.pacientes.create');
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
            'dni'=>'required|unique:pacientes',
            'nro_socio_obra_social'=>'required|unique:pacientes',
            'fecha_nacimiento'=>'required',
            'genero'=>'required',
            'celular'=>'required',
            'email'=>'required|unique:pacientes|max:250',
            'direccion'=>'required',
            'grupo_sanguineo'=>'required',
            'alergias'=>'required',
            'contacto_emergencia'=>'required',
        ]);

        $paciente = new Paciente();
        $paciente->nombres = $request->nombres;
        $paciente->apellido = $request->apellido;
        $paciente->dni = $request->dni;
        $paciente->nro_socio_obra_social = $request->nro_socio_obra_social;
        $paciente->fecha_nacimiento = $request->fecha_nacimiento;
        $paciente->genero = $request->genero;
        $paciente->celular = $request->celular;
        $paciente->email = $request->email;
        $paciente->direccion = $request->direccion;
        $paciente->grupo_sanguineo = $request->grupo_sanguineo;
        $paciente->alergias = $request->alergias;
        $paciente->contacto_emergencia = $request->contacto_emergencia;
        $paciente->observaciones = $request->observaciones;

        $paciente->save();
        return redirect()->route('admin.pacientes.index')
        ->with('mensaje', 'Se registró el paciente de manera correcta')
        ->with('icono', 'success');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $paciente = Paciente::findOrFail($id);
        return view('admin.pacientes.show', compact('paciente'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $paciente = Paciente::findOrFail($id);
        return view('admin.pacientes.edit', compact('paciente'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $paciente = Paciente::find($id);
        $request->validate([
            'nombres'=>'required',
            'apellido'=>'required',
            'dni'=>'required|unique:pacientes,dni,' .$paciente->id,
            'nro_socio_obra_social'=>'required|unique:pacientes,nro_socio_obra_social,' .$paciente->id,
            'fecha_nacimiento'=>'required',
            'genero'=>'required',
            'celular'=>'required',
            'email'=>'required|max:250|unique:pacientes,email,' .$paciente->id,
            'direccion'=>'required',
            'grupo_sanguineo'=>'required',
            'alergias'=>'required',
            'contacto_emergencia'=>'required',
        ]);

        $paciente->nombres = $request->nombres;
        $paciente->apellido = $request->apellido;
        $paciente->dni = $request->dni;
        $paciente->nro_socio_obra_social = $request->nro_socio_obra_social;
        $paciente->fecha_nacimiento = $request->fecha_nacimiento;
        $paciente->genero = $request->genero;
        $paciente->celular = $request->celular;
        $paciente->email = $request->email;
        $paciente->direccion = $request->direccion;
        $paciente->grupo_sanguineo = $request->grupo_sanguineo;
        $paciente->alergias = $request->alergias;
        $paciente->contacto_emergencia = $request->contacto_emergencia;
        $paciente->observaciones = $request->observaciones;

        $paciente->save();

        return redirect()->route('admin.pacientes.index')
        ->with('mensaje', 'Se actualizó el paciente de manera correcta')
        ->with('icono', 'success');
    }

    public function confirmDelete($id){
        $paciente = Paciente::findorFail($id);
        return view('admin.pacientes.delete', compact('paciente'));
    }

    public function destroy($id)
    {
        Paciente::destroy($id);
        return redirect()->route('admin.pacientes.index')
        ->with('mensaje', 'Se eliminó el paciente de manera correcta')
        ->with('icono', 'success');
    }
}
