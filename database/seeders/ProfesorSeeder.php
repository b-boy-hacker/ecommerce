<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Profesor;

class ProfesorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Profesor::create([
            'CI' => '200',
            'Nombre' => 'Nellsy',
            'ApellidoPaterno' => 'Betancourt',
            'ApellidoMaterno' => 'Perez',
            'Sexo' => 'Femenino',
            'Telefono' => '75522090', 
            'Correo' => 'gino@gmail.com',  
            'Direccion' => 'Avenida Bush', 
            'FechaNacimiento' => '2024-04-09',           
            'FechaRegistro' => '2024-04-10',                
        ]);
        Profesor::create([
            'CI' => '201',
            'Nombre' => 'Obed',
            'ApellidoPaterno' => 'Veizaga',
            'ApellidoMaterno' => 'Gonzales',
            'Sexo' => 'Masculino',
            'Telefono' => '75522090', 
            'Correo' => 'veizaga@gmail.com',  
            'Direccion' => 'Avenida Bush', 
            'FechaNacimiento' => '2024-04-09',           
            'FechaRegistro' => '2024-04-10',                
        ]);

        
    }
}
