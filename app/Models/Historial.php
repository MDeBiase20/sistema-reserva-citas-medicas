<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Historial extends Model
{
    use HasFactory;

    //Relación con la tabla pacientes
    public function paciente(){
        //usamos el belongTo para hacer el historial clínico de ese paciente en particular
        return $this->belongsTo(Paciente::class);
    }

    public function doctor(){
        return $this->belongsTo(Doctor::class);
    }
}
