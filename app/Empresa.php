<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Empresa extends Model
{
    use SoftDeletes;

    protected $table = 'tw_empresas_corporativos';

    protected $primaryKey='id';

    protected $fillable = [
        'S_RazonSocial', 
        'S_RFC', 
        'S_Pais',
        'S_Estado',
        'S_Municipio',
        'S_ColoniaLocalidad',
        'S_Domicilio',
        'S_CodigoPostal',
        'S_UsoCFDI',
        'S_UrlRFC',
        'S_UrlActaConstitutiva',
        'Activo',
        'S_Comentarios',
        'tw_corporativos_id',
    ];

    protected $hidden = [
        'created_at', 'updated_at',
    ];
}
