<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use App\Models\Paciente;
use App\Models\Secretaria;
use App\Models\Doctor;
use App\Models\Consultorio;
use App\Models\Horario;
use App\Models\Configuracione;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        //Llamamos al seeder Roles
        $this->call([RoleSeeder::class,]);

        //creamos los usuarios con esos roles
       User::create([
            'name'=>'Administrador',
            'email'=>'admin@admin.com',
            'password'=> Hash::make('123456789'),
        ])->assignRole('admin');
        
        User::create([
            'name'=>'Secretaria',
            'email'=>'secretaria@admin.com',
            'password'=>Hash::make('12345678'),
        ])->assignRole('secretaria');

        Secretaria::create([
            'nombres'=>'María Eugenia',
            'apellido'=>'Marinochi',
            'dni'=>'37200147',
            'celular'=>'3425823678',
            'direccion'=>'Pasaje S/N 2014',
            'fecha_nacimiento'=>'20/08/1988',
            'user_id'=>'2',
        ]);

        User::create([
            'name'=>'Doctor1',
            'email'=>'doctor1@admin.com',
            'password'=>Hash::make('12345678'),
        ])->assignRole('doctor');

        Doctor::create([
            'nombres'=>'María Laura',
            'apellido'=>'Gonzalvez',
            'telefono'=>'3425823679',
            'matricula'=>'MT302514',
            'especialidad'=>'KINESIOLOGÍA',
            'user_id'=>'3',
        ]);


        User::create([
            'name'=>'Doctor2',
            'email'=>'doctor2@admin.com',
            'password'=>Hash::make('12345678'),
        ])->assignRole('doctor');

        Doctor::create([
            'nombres'=>'María Laura',
            'apellido'=>'Acevedo',
            'telefono'=>'3424201479',
            'matricula'=>'MT251007',
            'especialidad'=>'ODONTOLOGÍA',
            'user_id'=>'4',
        ]);

        User::create([
            'name'=>'Doctor3',
            'email'=>'doctor3@admin.com',
            'password'=>Hash::make('12345678'),
        ])->assignRole('doctor');

        Doctor::create([
            'nombres'=>'Eduardo Gabriel',
            'apellido'=>'Soraroi',
            'telefono'=>'3426328600',
            'matricula'=>'MT30058974',
            'especialidad'=>'PEDIATRÍA',
            'user_id'=>'5',
        ]);

        //Creo los consultorios para usarlo desde el seed
        Consultorio::create([
            'nombre'=>'KINESIOLOGÍA',
            'ubicacion'=>'1-A',
            'capacidad'=>'5',
            'telefono'=>'',
            'especialidad'=>'KINESIOLOGÍA',
            'estado'=>'ACTIVO',
        ]);

        Consultorio::create([
            'nombre'=>'ODONTOLOGÍA',
            'ubicacion'=>'1-C',
            'capacidad'=>'3',
            'telefono'=>'4697785',
            'especialidad'=>'ODONTOLOGÍA',
            'estado'=>'ACTIVO',
        ]);

        Consultorio::create([
            'nombre'=>'PEDIATRÍA',
            'ubicacion'=>'3-A',
            'capacidad'=>'8',
            'telefono'=>'4527725',
            'especialidad'=>'PEDIATRÍA',
            'estado'=>'ACTIVO',
        ]);
        

        User::create([
            'name'=>'Paciente1',
            'email'=>'paciente1@admin.com',
            'password'=>Hash::make('12345678'),
        ])->assignRole('paciente');

        User::create([
            'name'=>'Usuario1',
            'email'=>'usuario1@admin.com',
            'password'=>Hash::make('12345678'),
        ])->assignRole('usuario');
                
        
         //Llamamos al seeder Paciente
        $this->call([PacienteSeeder::class,]);

        //Creación de horarios
        Horario::create([
            'dia'=>'LUNES',
            'hora_inicio'=>'08:00:00',
            'hora_fin'=>'12:00:00',
            'doctor_id'=>'1',
            'consultorio_id'=>'1',
        ]);

        //Creación de la configuración
    Configuracione::create([
        'nombre'=>'Hospital Italiano',
        'direccion'=>'Av. Gral. Paz 2758',
        'telefono'=>'4697785',
        'correo'=>'hospitalitaliano@info.com.ar',
        'logo'=>'logos/Zxbrr8lugHzgGpGzvfBoZis51IrQSLvyuRJxb00g.jpg'
    ]);

    }

}
