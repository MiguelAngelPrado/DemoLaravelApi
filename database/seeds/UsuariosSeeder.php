<?php

use Illuminate\Database\Seeder;
use App\Usuarios;

class UsuariosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        factory(Usuarios::class)->times(10)->create();
    }
}
