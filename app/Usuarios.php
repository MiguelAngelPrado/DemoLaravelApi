<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Usuarios extends Model
{
    //
    protected $table = 'tw_usuarios';

    protected $primaryKey='id';

    protected $fillable = [
        'username', 
        'email', 
        'S_Nombre',
        'S_Apellidos',
        'S_FotoPerfilUrl',
        'S_Activo',
        'password',
        'verification_token',
        'verifed',
    ];

    protected $hidden = [
        'created_at', 'updated_at',
    ];
}
