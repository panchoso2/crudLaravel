<?php

use Illuminate\Database\Seeder;

class UsuarioSeeder extends Seeder
{
   
    public function run()
    {
        // generar 100 entradas con datos aleatorios en la BD
        $faker = \Faker\Factory::create();

        for($i = 0; $i <= 100; $i++):
            DB::table('usuarios')->insert([
                'Rut' => $faker->unique()->randomNumber,
                'Nombre' => $faker->firstName,
                'Apellido' => $faker->lastName,
                'Email' => $faker->email,
                'FechaNacimiento' => $faker->date,
                'Password' => Hash::make($faker->password),
            ]);
            endfor;
    }
}
