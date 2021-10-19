<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Usuarios;
use Faker\Generator as Faker;

$factory->define(Usuarios::class, function (Faker $faker) {
    return [
        //
        'username'=>$faker->name,
        'email'=>$faker->unique()->safeEmail,
        'S_Nombre'=>$faker->name,
        'S_Apellidos'=>$faker->name,
        'password'=>bcrypt('12345'),
        'S_FotoPerfilUrl'=>$faker->imageUrl(45),
        'S_Activo'=>'1',
        'verification_token'=>'',
        'verifed'=>''
    ];
});
