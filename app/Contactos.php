<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contactos extends Model
{
    //
    protected $table = 'tw_contactos_corporativos';

    public $timestamps= false;

    protected $primaryKey='id';

    protected $fillable = [
        'S_Nombre', 
        'S_Puesto', 
        'S_Comentarios',
        'N_TelefonoFijo',
        'N_TelefonoMovil',
        'Email',
        'tw_corporativos_id'
    ];

    
}
