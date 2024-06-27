<?php

namespace App\Http\Controllers;

use App\Models\Consultorio;
use Illuminate\Http\Request;

class ConsultorioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $consultorios = Consultorio::all();
        return view('admin.consultorios.index', compact('consultorios'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.consultorios.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //Cadena Json para ver si los datos se envían
        // $datos = request()->all();
        // return response()->json($datos);

        $request->validate([
            'nombre'=>'required',
            'ubicacion'=>'required',
            'capacidad'=>'required',
            'especialidad'=>'required',
            'estado'=>'required',
        ]);

        //como en el modelo de consultorios tenemos como protected podemos registrar de la siguiente manera
        Consultorio::create($request->all());

        return redirect()->route('admin.consultorios.index')
        ->with('mensaje', 'Se registró el consultorio de manera correcta')
        ->with('icono', 'success');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $consultorio = Consultorio::findOrFail($id);
        return view('admin.consultorios.show', compact('consultorio'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $consultorio = Consultorio::findOrFail($id);
        return view('admin.consultorios.edit', compact('consultorio'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //Validamos los campos
        $request->validate([
            'nombre'=>'required',
            'ubicacion'=>'required',
            'capacidad'=>'required',
            'especialidad'=>'required',
            'estado'=>'required',
        ]);

        //Hacemos la búsqueda
        $consultorio = Consultorio::find($id);

        //Hacemos la actualización de los datos
        $consultorio->update($request->all());

        return redirect()->route('admin.consultorios.index')
        ->with('mensaje', 'Se actualizó de manera correcta el consultorio')
        ->with('icono', 'success');
    }

    public function confirmDelete($id){
        $consultorio = Consultorio::findOrFail($id);
        return view('admin.consultorios.delete', compact('consultorio'));
    }


    public function destroy($id)
    {
        $consultorio = Consultorio::find($id);
        $consultorio->delete();

        return redirect()->route('admin.consultorios.index')
        ->with('mensaje', 'Se eliminó de manera correcta el consultorio de la base de datos')
        ->with('icono', 'success');
    }
}
