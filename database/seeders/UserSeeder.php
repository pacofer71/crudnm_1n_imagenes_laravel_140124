<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $usuarios=User::factory(30)->create();
        foreach($usuarios as $user){
            $user->roles()->attach($this->getRandomRolesArray());
        }
    }
    private function getRandomRolesarray(): array{
        $rolesArray=Role::pluck('id')->toArray();
        shuffle($rolesArray);
        return array_slice($rolesArray, 0, random_int(1,count($rolesArray)-1));
    }
}
