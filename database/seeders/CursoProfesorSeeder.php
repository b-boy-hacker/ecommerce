<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\CursoProfesor;

class CursoProfesorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        CursoProfesor::create([         
            'curso_id' => '1' ,
            'profesor_id' => '1' ,        
        ]); 
        CursoProfesor::create([         
            'curso_id' => '2' ,
            'profesor_id' => '2' ,        
        ]);
    }
}
