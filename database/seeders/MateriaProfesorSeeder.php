<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\MateriaProfesor;

class MateriaProfesorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        MateriaProfesor::create([         
            'profesor_id' => '1',
            'materia_id' => '1' 
        ]);
        MateriaProfesor::create([         
            'profesor_id' => '2',
            'materia_id' => '2' 
        ]);
    }
}
