<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Documentos extends Model
{
    //
    protected $table = 'tw_documentos';

    public $timestamps= false;
    
    protected $primaryKey='id';

    protected $fillable = [
        'S_Nombre', 'N_Obligatorio', 'S_Descripcion',
    ];

}
