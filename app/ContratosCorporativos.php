<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ContratosCorporativos extends Model
{
    //
    protected $table = 'tw_contratos_corporativos';
    protected $primaryKey='id';

    protected $fillable = [
        'D_FechaInicio', 'D_FechaFin', 'S_URLContrato',
    ];

    protected $hidden = [
        'created_at', 'updated_at',
    ];
}
