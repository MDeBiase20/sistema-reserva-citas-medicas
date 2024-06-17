<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Secretaria extends Model
{
    use HasFactory;

    public function user(){
        //belongsTo es para la relación de 1 a 1 entre la tabla users y la tabla secretarias
        return $this->belongsTo(User::class);
    }
}
