<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Consultorio extends Model
{
    use HasFactory;

    protected $fillable = ['nombre', 'ubicacion', 'capacidad', 'telefono', 'especialidad', 'estado'];

    public function doctores(){

        return $this->hasMany(Doctor::class);

    }

        public function comments(){
        
            return $this->hasMany(Horario::class);
        }
    }

