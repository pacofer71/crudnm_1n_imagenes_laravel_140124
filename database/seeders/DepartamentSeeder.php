<?php

namespace Database\Seeders;

use App\Models\Departament;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DepartamentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $departamentos = [
            'Software' => '#f44336',
            'Hardware' => '#9c27b0',
            'Administración' => '#3f51b5',
            'RRHH' => '#00bcd4',
            'I+D' => '#4caf50'
        ];
        foreach($departamentos as $nombre=>$color){
            Departament::create(compact('nombre', 'color'));
        }
    }
}
