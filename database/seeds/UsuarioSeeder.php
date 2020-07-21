<?php

use Illuminate\Database\Seeder;

class UsuarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        $faker = \Faker\Factory::create();

        for($i = 0; $i <= 100; $i++):
            DB::table('usuarios')->insert([
                'Rut' => $faker->unique()->randomNumber,
                'Nombre' => $faker->firstName,
                'Apellido' => $faker->lastName,
                'Email' => $faker->email,
                'Fecha de nacimiento' => $faker->date,
                'Password' => Hash::make($faker->password),
            ]);
            endfor;
        
    }
}
