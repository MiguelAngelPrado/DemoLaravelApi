<?php

use Illuminate\Database\Seeder;
//use Database\Seeders\CorporativosSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         $this->call([
            UsuariosSeeder::class,
            CorporativosSeeder::class
        ]);
    }
}
