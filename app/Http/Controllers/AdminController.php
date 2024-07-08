<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Secretaria;
use App\Models\Paciente;
use App\Models\Consultorio;
use App\Models\Doctor;
use App\Models\Horario;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(){
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
        'total_horarios'));
    }
}
