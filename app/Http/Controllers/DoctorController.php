<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

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
}
