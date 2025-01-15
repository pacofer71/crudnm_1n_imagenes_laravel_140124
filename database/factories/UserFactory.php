<?php

namespace Database\Factories;

use App\Models\Departament;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
       public function definition(): array
    {
        fake()->addProvider(new \Mmo\Faker\PicsumProvider(fake()));
        $nombre=fake()->unique->username();
        return [
            'name' => $nombre, 
            'email' => $nombre."@".fake()->freeEmailDomain(),
            'departament_id'=>Departament::all()->random()->id,
            'imagen'=>'images/perfil/'.fake()->picsum('public/storage/images/perfil/', 640, 480, false),
        ];
    }

   
    
}
