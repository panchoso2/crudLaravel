<?php

use Illuminate\Database\Seeder;

class UsuarioSeeder extends Seeder
{
   
    public function run()
    {   
        // generate 100 entries with random data
        // 3 images were provided as example
        $faker = \Faker\Factory::create();

        for($i = 0; $i <= 100; $i++):
            DB::table('usuarios')->insert([
                'Rut' => $faker->unique()->randomNumber,
                'Nombre' => $faker->firstName,
                'Apellido' => $faker->lastName,
                'Email' => $faker->email,
                'FechaNacimiento' => $faker->date,
                'Password' => Hash::make($faker->password),
                'Avatar' => $faker->randomElement(['imagen1.jpg','imagen2.jpg','imagen3.jpg']),
            ]);
            endfor;
    }
}
