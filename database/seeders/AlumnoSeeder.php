<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Alumno;

class AlumnoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Alumno::create([
            'CI' => '300',
            'Nombre' => 'Pamela',        
            'ApellidoPaterno' => 'Dorado',
            'ApellidoMaterno' => 'Dorbigny',
            'Sexo' => 'Femenino',
            'Correo' => 'pamela@gmail.com',  
            'Direccion' => 'Avenida Bush', 
            'FechaNacimiento' => '2024-04-09',           
            'FechaRegistro' => '2024-04-10',                
        ]);
        Alumno::create([
            'CI' => '301',
            'Nombre' => 'Wesley',
            'ApellidoPaterno' => 'Quiterio',
            'ApellidoMaterno' => 'Dorbigny',
            'Sexo' => 'Masculino',
            'Correo' => 'weley@gmail.com',  
            'Direccion' => 'Avenida Bush', 
            'FechaNacimiento' => '2024-04-09',           
            'FechaRegistro' => '2024-04-10',                
        ]);
    }
}
