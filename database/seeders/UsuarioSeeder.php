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
            'ci' => '100',
            'name' => 'Sergio David',    
            'email' => 'adm@gmail.com',
            'password' => bcrypt('12345678'),
            'usertype' => '1', 
            'rol' => 'Administrador'          
        ]);
        
        User::create([
            'ci' => '200',
            'name' => 'Nellsy',            
            'email' => 'nellsy@gmail.com',
            'password' => bcrypt('12345678'),
            'usertype' => '2', 
            'rol' => 'Profesor'

        ]);
        User::create([
            'ci' => '300',
            'name' => 'Pamela',
            'email' => 'pamela@gmail.com',
            'password' => bcrypt('12345678'),
            'usertype' => '3', 
            'rol' => 'Alumno'          
        ]);
        
        User::create([
            'ci' => '400',
            'name' => 'Angel',          
            'email' => 'angel@gmail.com',
            'password' => bcrypt('12345678'),
            'usertype' => '4', 
            'rol' => 'Padre'          
        ]);

    }
}
