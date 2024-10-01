<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Spatie\Permission\Traits\HasRoles;
use Illuminate\Support\Facades\Validator;

class Paciente extends Model
{
    use HasFactory;
    use HasRoles;
    protected $guard_name = 'web';

    public function historial(){
        //La relación va a ser de uno a mucho
        return $this->hasMany(Historial::class);
    }
}
