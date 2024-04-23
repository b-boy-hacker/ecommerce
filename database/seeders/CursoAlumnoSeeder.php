<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\CursoAlumno;

class CursoAlumnoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        CursoAlumno::create([         
            'curso_id' => '1' ,
            'alumno_id' => '1' ,
            'profesor_id' => '1' ,  
        ]);
        CursoAlumno::create([         
            'curso_id' => '2' ,
            'alumno_id' => '2' ,
            'profesor_id' => '2' ,  
        ]);  
    }
}
