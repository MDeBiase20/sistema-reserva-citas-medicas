<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;

class Doctor extends Model
{
    use HasFactory;

    protected $fillable = ['nombres', 'apellido', 'telefono', 'matricula','especialidad', 'user_id'];

    public function consultorio()
    {
        return $this->belongsTo(Consultorio::class);
    }

    public function horarios()
    {
        return $this->hasMany(Horario::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    //Un evento tiene varios doctores
    public function evento(){
        return $this->hasMany(Evento::class);
    }

    public function historial(){
        //Un doctor va a tener muchos historiales clínicos
        return $this->hasMany(Historial::class);
    }

    public function pagos()
    {
        return $this->hasMany(Pago::class);
    }
}
