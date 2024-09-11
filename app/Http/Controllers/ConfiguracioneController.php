<?php

namespace App\Http\Controllers;

use App\Models\Configuracione;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ConfiguracioneController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $configuraciones = Configuracione::all();
        return view('admin.configuraciones.index', compact('configuraciones'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.configuraciones.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //$datos = $request->all();
        //return response()->json($datos);
        $request->validate([
            'nombre'=>'required',
            'direccion'=>'required',
            'telefono'=>'required',
            'correo'=>'required',
            'logo'=>'required',
        ]);

        $configuracion = new Configuracione();

        $configuracion->nombre = $request->nombre;
        $configuracion->direccion = $request->direccion;
        $configuracion->telefono = $request->telefono;
        $configuracion->correo = $request->correo;
        $configuracion->logo = $request->file('logo')->store('logos', 'public');

        $configuracion->save();

        return redirect()->route('admin.configuraciones.index')
        ->with('mensaje', 'La configuración se registró de manera correcta')
        ->with('icono', 'success');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $configuracion = Configuracione::find($id);
        return view('admin.configuraciones.show', compact('configuracion'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $configuracion = Configuracione::findOrFail($id);
        return view('admin.configuraciones.edit', compact('configuracion'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        //$datos = $request->all();
        //return response()->json($datos);
        $request->validate([
            'nombre'=>'required',
            'direccion'=>'required',
            'telefono'=>'required',
            'correo'=>'required',
        ]);

        $configuracion = Configuracione::find($id);

        $configuracion->nombre = $request->nombre;
        $configuracion->direccion = $request->direccion;
        $configuracion->telefono = $request->telefono;
        $configuracion->correo = $request->correo;

        #El hasFile permite preguntar si del request (del campo logo que es donde se suben los archivos) existe un archivo
        if($request->hasFile('logo')){
            #eliminamos la imagen que ya existe
            Storage::delete(['public/'.$configuracion->logo]);
            #volvemos a subir la imagen nueva
            $configuracion->logo = $request->file('logo')->store('logos', 'public');
        }

        $configuracion->save();

        return redirect()->route('admin.configuraciones.index')
        ->with('mensaje','Se actualizó la configuración de manera correcta')
        ->with('icono','success');
        
    }

    public function confirmDelete($id){
        $configuracion = Configuracione::find($id);
        return view('admin.configuraciones.delete', compact('configuracion'));
    }

    public function destroy($id)
    {
        $configuracion = Configuracione::find($id);
        //Elimino la imagen
        Storage::delete('public/'. $configuracion->logo);

        //Elimino los datos
        Configuracione::destroy($id);

        return redirect()->route('admin.configuraciones.index')
        ->with('mensaje', 'Se eliminó el registro de manera correcta')
        ->with('icono', 'success');

    }
}
