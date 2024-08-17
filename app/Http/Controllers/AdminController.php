<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Secretaria;
use App\Models\Paciente;
use App\Models\Consultorio;
use App\Models\Doctor;
use App\Models\Horario;
use App\Models\Evento;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(){
        //Realizamos una consulta para que muestre todos los consultorios dentro de la vista de usuarios
        $consultorios = Consultorio::all();
        $doctores = Doctor::all();

        //Realizo una consulta para traer todos los eventos
        $eventos = Evento::all();

        //para contar la cántidad de usuarios que hay en la base de datos
        $total_usuarios= User::count();
        $total_secretarias = Secretaria::count();
        $total_pacientes = Paciente::count();
        $total_consultorios = Consultorio::count();
        $total_doctores = Doctor::count();
        $total_horarios = Horario::count();

        return view('admin.index',compact('total_usuarios',
        'total_secretarias',
        'total_pacientes',
        'total_consultorios',
        'total_doctores',
        'total_horarios',
        'consultorios',
        'doctores',
        'eventos'));
    }

    public function ver_reservas($id){
        $eventos = Evento::where('user_id', $id)->get();
        return view('admin.ver_reservas', compact('eventos'));
    }
}
