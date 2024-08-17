<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Evento extends Model
{
    use HasFactory;

    //Relación entre las tablas usuario, doctor y consultorio con la tabla eventos-

    //Un evento puede tener un usuario
    public function user(){
        return $this->belongsTo(User::class);
    }

    //Un evento puede tener un doctor
    public function doctor(){
        return $this->belongsTo(Doctor::class);
    }

    //Un evento puede tener un consultorio
    public function consultorio(){
        return $this->belongsTo(consultorio::class);
    }
}
