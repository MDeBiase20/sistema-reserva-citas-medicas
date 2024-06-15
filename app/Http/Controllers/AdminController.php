<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(){
        //para contar la cántidad de usuarios que hay en la base de datos
        $total_usuarios= User::count();
        return view('admin.index',compact('total_usuarios'));
    }
}
