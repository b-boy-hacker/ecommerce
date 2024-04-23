<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

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
        $this -> call(UsuarioSeeder::class);
        $this -> call(RolSeeder::class);
        $this -> call(ProfesorSeeder::class);
        $this -> call(CursoSeeder::class);
        $this -> call(AlumnoSeeder::class);
        $this -> call(CursoAlumnoSeeder::class);
        $this -> call(PadreSeeder::class);
        $this -> call(PadreHijoSeeder::class);
        $this -> call(MateriaSeeder::class);
        $this -> call(MateriaProfesorSeeder::class);
        $this -> call(CursoProfesorSeeder::class);


        

    }
}
