<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UsuarioController extends Controller
{
    public function index(){
        //Consulta sql para traer los datos de los usuarios
        $usuarios = User::all();
        return view('admin.usuarios.index', compact('usuarios'));
    }

    public function create(){
        return view('admin.usuarios.create');
    }

    public function store(Request $request){
        //Consulta sql para registrar usuarios
        //$datos = request()->all();
        //return response()->json($datos);

        $request->validate([
            'name'=>'required | max:250',
            'email'=>'required | max:250 | unique:users',
            'password'=>'required | max:250 | confirmed',
        ]);

        $usuario = new User();
        $usuario->name = $request->name;
        $usuario->email = $request->email;
        $usuario->password = Hash::make($request['password']);
        $usuario->save();

        //Para redireccionar a la ruta luego de que se agregó el registro a la base de datos
        return redirect()->route('admin.usuarios.index')
        ->with('mensaje', 'Se registró el usuario de la manera correcta')
        ->with('icono', 'success');
    }

    public function show($id){
        //Consulta sql para traer los datos de los usuarios según su id
        $usuario = User::findorFail($id);
        return view('admin.usuarios.show', compact('usuario'));
    }

    public function edit($id){
        //Consulta sql para traer los datos de los usuarios según su id
        $usuario = User::findorFail($id);
        return view('admin.usuarios.edit', compact('usuario'));
    }

    public function update(Request $request, $id){
        $usuario = User::find($id);

        $request->validate([
            'name'=>'required|max:250',
            'email'=>'required|max:250|unique:users,email,'.$usuario->id,
            'password'=>'nullable|max:250|confirmed',
        ]);
        $usuario->name = $request->name;
        $usuario->email = $request->email;

        //condición para preguntar si el campo de la contraseña está lleno y actualizar con la nueva contraseña
        if($request->filled('password')){
            $usuario->password = Hash::make($request['password']);
        }

        $usuario->save();
         //Para redireccionar a la ruta luego de que se agregó el registro a la base de datos
        return redirect()->route('admin.usuarios.index')
        ->with('mensaje', 'Se actualizó el usuario de la manera correcta')
        ->with('icono', 'success');
    }

    public function confirmDelete($id){
        //Consulta sql para traer los datos de los usuarios según su id
        $usuario = User::findorFail($id);
        return view('admin.usuarios.delete', compact('usuario'));
    }

    public function destroy($id){
        User::destroy($id);
        //Para redireccionar a la ruta luego de que se agregó el registro a la base de datos
        return redirect()->route('admin.usuarios.index')
        ->with('mensaje', 'Se eliminó el usuario de la manera correcta')
        ->with('icono', 'success');
    }
}
