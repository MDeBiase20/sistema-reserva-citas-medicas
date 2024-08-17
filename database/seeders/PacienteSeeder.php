<?php

namespace Database\Seeders;

use App\Models\Paciente;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PacienteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //A estos 200 pacientes le defino un rol que va a ser el rol pacientes
        Paciente::factory()->count(200)->create()->each(function ($user){
            $user->assignRole('paciente');
        });
    }
}
