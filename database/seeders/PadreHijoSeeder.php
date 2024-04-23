<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\PadreHijo;

class PadreHijoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        PadreHijo::create([         
            'padre_id' => '1',
            'hijo_id' => '1' 
        ]);
        PadreHijo::create([         
            'padre_id' => '2',
            'hijo_id' => '2' 
        ]);
    }
}
