<?php

namespace App\Http\Controllers;

use App\Models\Secretaria;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class SecretariaController extends Controller
{

    public function index()
    {
        //retornar una vista cuando existen relación entre 2 tablas
        $secretarias = Secretaria::with('user')->get();
        return view('admin.secretarias.index', compact('secretarias'));
    }

    public function create()
    {
        return view('admin.secretarias.create');
    }

    public function store(Request $request)
    {
        //Consulta sql para registrar usuarios
        //$datos = request()->all();
        //return response()->json($datos);

        $request->validate([
            'nombres' => 'required',
            'apellido' => 'required',
            'dni' => 'required | unique:secretarias', //(unique:secretarias) es un campo único de la tabla secretarias
            'celular' => 'required',
            'fecha_nacimiento' => 'required',
            'direccion' => 'required',
            'email'=>'required | max:250 | unique:users',
            'password'=>'required | max:250 | confirmed',
        ]);

        $usuario = new User();
        $usuario->name = $request->nombres;
        $usuario->email = $request->email;
        $usuario->password = Hash::make($request['password']);

        $usuario->save();

        $secretaria = new Secretaria();
        $secretaria->user_id = $usuario->id;
        $secretaria->nombres = $request->nombres;
        $secretaria->apellido = $request->apellido;
        $secretaria->dni = $request->dni;
        $secretaria->celular = $request->celular;
        $secretaria->direccion = $request->direccion;
        $secretaria->fecha_nacimiento = $request->fecha_nacimiento;

        $secretaria->save();

        //Al usuario registrado el asignamos el rol de "secretaria"
        $usuario->assignRole('secretaria');

        //Para redireccionar al agregar a la base de datos
        return redirect()->route('admin.secretarias.index')
        ->with('mensaje', 'Se registró la secretaria de manera correcta')
        ->with('icono', 'success');
    }


    public function show($id)
    {
        //El findOrFail sirve para que busque y si hay algún error muestre una simple página de error
        $secretaria = Secretaria::with('user')->findOrFail($id);
        return view('admin.secretarias.show', compact('secretaria'));
    }

    public function edit($id)
    {
        //El findOrFail sirve para que busque y si hay algún error muestre una simple página de error
        $secretaria = Secretaria::with('user')->findOrFail($id);
        return view('admin.secretarias.edit', compact('secretaria'));
    }

    public function update(Request $request, $id)
    {
        $secretaria = Secretaria::find($id);
        $request->validate([
            'nombres' => 'required',
            'apellido' => 'required',
            'dni' => 'required', //(unique:secretarias) es un campo único de la tabla secretarias
            'celular' => 'required',
            'fecha_nacimiento' => 'required',
            'direccion' => 'required',
            'email'=>'required|max:250|unique:users,email,'. $secretaria->user->id,
            'password'=>'nullable | max:250 | confirmed',
        ]);

        $secretaria->nombres = $request->nombres;
        $secretaria->apellido = $request->apellido;
        $secretaria->dni = $request->dni;
        $secretaria->celular = $request->celular;
        $secretaria->direccion = $request->direccion;
        $secretaria->fecha_nacimiento = $request->fecha_nacimiento;

        $secretaria->save();

        $usuario = User::find($secretaria->user->id);
        
        $usuario->name = $request->nombres;
        $usuario->email = $request->email;

        //condición para preguntar si el campo de la contraseña está lleno y actualizar con la nueva contraseña
        if($request->filled('password')){
            $usuario->password = Hash::make($request['password']);
        }

        $usuario->save();

        return redirect()->route('admin.secretarias.index')
        ->with('mensaje', 'Se actualizó a la secretaria de manera correcta')
        ->with('icono', 'success');
    }

    public function confirmDelete($id){
        //El findOrFail sirve para que busque y si hay algún error muestre una simple página de error
        $secretaria = Secretaria::with('user')->findOrFail($id); //esto es cuando hay tablas relacionadas
        return view('admin.secretarias.delete', compact('secretaria'));
    }

    public function destroy($id)
    {
        //Buscamos toda la información de esta secretaria
        $secretaria = Secretaria::find($id);

        //Primero eliminamos el usuario asociado
        $user = $secretaria->user; //Traemos de "secretaria" el id del usuario y lo almacenamos en la variable
        $user->delete();

        //Eliminar a la secretaria
        $secretaria->delete();
        
        return redirect()->route('admin.secretarias.index')
        ->with('mensaje', 'Se eliminó de manera correcta la secretaria')
        ->with('icono', 'success');
    }
}
