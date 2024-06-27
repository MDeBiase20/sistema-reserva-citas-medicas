<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    use HasFactory;

    protected $fillable = ['nombres', 'apellido', 'telefono', 'matricula','especialidad', 'user_id'];

    public function consultorio()
    {
        return $this->belongsTo(Consultorio::class);
    }

    public function comments()
    {
        return $this->hasMany(Horario::class);
    }
}
