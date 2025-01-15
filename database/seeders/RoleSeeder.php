<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles = [
            'guest' => '#f44336',
            'admin' => '#9c27b0',
            'superAdmin' => '#3f51b5',
            'editor' => '#00bcd4',
            'normal' => '#4caf50'
        ];
        foreach($roles as $nombre=>$color){
            Role::create(compact('nombre', 'color'));
        }
    }
}
