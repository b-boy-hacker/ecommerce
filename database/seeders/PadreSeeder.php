<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Padre;

class PadreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Padre::create([
            'CI' => '400',
            'Nombre' => 'Angel',
            'ApellidoPaterno' => 'Dorado',
            'ApellidoMaterno' => 'Masay',
            'Sexo' => 'Masculino',
            'Telefono' => '75536745', 
            'Correo' => 'angel@gmail.com',  
            'Direccion' => 'Avenida Bush', 
            'FechaRegistro' => '2024-04-10',
            'FechaNacimiento' => '2024-04-09',           
            'Parentesco' => 'Padre',  
                
        ]);
        Padre::create([
            'CI' => '401',
            'Nombre' => 'Maritza',
            'ApellidoPaterno' => 'Roca',
            'ApellidoMaterno' => 'Limpias',
            'Sexo' => 'Femenino',
            'Telefono' => '75536745', 
            'Correo' => 'maritza@gmail.com',  
            'Direccion' => 'Avenida Bush', 
            'FechaRegistro' => '2024-04-10',
            'FechaNacimiento' => '2024-04-09',           
            'Parentesco' => 'Madre',  
 
        ]);
    }
}
