<?php

namespace App\Http\Controllers;

use App\Models\Horario;
use App\Models\Doctor;
use App\Models\Consultorio;
use Illuminate\Http\Request;

class HorarioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $horarios = Horario::with('doctor', 'consultorio')->get();
        $consultorios = Consultorio::all();
        return view('admin.horarios.index', compact('horarios', 'consultorios'));
    }

    public function cargar_datos_consultorios($id){
        try {
            $horarios = Horario::with('doctor', 'consultorio')->where('consultorio_id', $id)->get();
            //print_r($horarios);
            return view('admin.horarios.cargar_datos_consultorios', compact('horarios'));
        } catch (\Exception $exception) {
            return response()->json(['mensaje' => 'Error']);
        }
    }


    public function create()
    {
        $doctores = Doctor::all();
        $consultorios = Consultorio::all();
        $horarios = Horario::with('doctor', 'consultorio')->get();
        return view('admin.horarios.create', compact('doctores', 'consultorios', 'horarios'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // $datos = request()->all();
        // return response()->json($datos);
        $request->validate([
            'dia'=>'required',
            'hora_inicio'=>'required',
            'hora_fin'=>'required | after:hora_inicio',
            'consultorio_id'=>'required | exists:consultorios,id', //valido que el consultorio exista
        ]);

        //Verificamos si el horario ya existe para ese día, rango horario y consultorio
        $hora_existente = Horario::where('dia', $request->dia)
            ->where('consultorio_id', $request->consultorio_id) //Filtrar por consultorio
            ->where(function ($query) use ($request){
                $query->where(function ($query) use ($request){
                    $query->where('hora_inicio', '>=', $request->hora_inicio)
                    ->where('hora_fin', '<', $request->hora_fin);
                })

                ->orWhere(function ($query) use ($request){
                    $query->where('hora_fin', '>', $request->hora_inicio)
                        ->where('hora_fin', '<=', $request->hora_fin);
                })

                ->orWhere(function($query) use ($request){
                    $query->where('hora_inicio', '<', $request->hora_inicio)
                        ->where('hora_fin', '>', $request->hora_fin);
                });
            })
            ->exists();
        if($hora_existente){
            return redirect()->back()
            ->withInput()
            ->with('mensaje', 'Ya existe un horario que se superpone con el horario ingresado')
            ->with('icono', 'error');
        }    

        Horario::create($request->all());

        return redirect()->route('admin.horarios.index')
        ->with('mensaje', 'Se registró el horario de manera correcta')
        ->with('icono', 'success');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $horario = Horario::find($id);
        return view('admin.horarios.show', compact('horario'));
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Horario $horario)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Horario $horario)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Horario $horario)
    {
        //
    }
}
