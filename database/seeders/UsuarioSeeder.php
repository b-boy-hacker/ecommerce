<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UsuarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        User::create([
            'name' => 'Milan',
            'email' => 'milan@gmail.com',
            'password' => bcrypt('12345678'),
            'usertype' => '1', 
            'rol' => 'Administrador'          
        ]);


        User::create([
            'name' => 'Aldo',
            'email' => 'aldo@gmail.com',
            'password' => bcrypt('12345678'),
            'usertype' => '1', 
            'rol' => 'Administrador'          
        ]);
        User::create([
            'name' => 'Ale',
            'email' => 'ale@gmail.com',
            'password' => bcrypt('12345678'),
            'usertype' => '1', 
            'rol' => 'Administrador'          
        ]);
        
        User::create([
            'name' => 'Nellsy Betancourt',
            'email' => 'profe@gmail.com',
            'password' => bcrypt('12345678'),
            'usertype' => '2', 
            'rol' => 'Profesor'          
        ]);
        User::create([
            'name' => 'Pamela Dorado',
            'email' => 'alumno@gmail.com',
            'password' => bcrypt('12345678'),
            'usertype' => '3', 
            'rol' => 'Alumno'          
        ]);
        
        User::create([
            'name' => 'Angel Dorado',
            'email' => 'padre@gmail.com',
            'password' => bcrypt('12345678'),
            'usertype' => '4', 
            'rol' => 'Padre'          
        ]);

    }
}
