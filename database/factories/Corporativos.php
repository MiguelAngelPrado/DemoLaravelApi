<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Corporativo;
use Faker\Generator as Faker;

$factory->define(Corporativo::class, function (Faker $faker) {
    return [
        //
        'S_NombreCorto'=>$faker->name,
        'S_NombreCompleto'=>$faker->name,
        'S_logoURL'=>$faker->image,
        'S_DBName'=>$faker->name,
        'S_DBUsuario'=>$faker->name,
        'S_DBPasword'=>'$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
        'S_Activo'=>'1',
        'S_SystemUrl'=>$faker->url,
        'D_FechaIncorporacion'=>$faker->date,
        'tw_usuarios_id'=>$faker->randomElement([1,2,3,4,5,6,7,8,9,10])
    ];
});
