<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(DepartamentSeeder::class);
        $this->call(RoleSeeder::class);

        Storage::deleteDirectory('images/perfil');
        Storage::makeDirectory('images/perfil');

        $this->call(UserSeeder::class);
    }
}
