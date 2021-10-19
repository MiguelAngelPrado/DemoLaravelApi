<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Contactos;
use App\Contratos;

class Corporativo extends Model
{
    //
    protected $table = 'tw_corporativos';
    
    protected $primaryKey='id';

    protected $fillable = [
        'S_NombreCorto', 
        'S_NombreCompleto', 
        'S_logoURL',
        'S_DBName',
        'S_DBUsuario',
        'S_DBPasword',
        'S_SystemUrl',
        'S_Activo',
        'D_FechaIncorporacion',
        'tw_usuarios_id',
    ];

    protected $hidden = [
        'created_at', 'updated_at',
    ];

    public function contactos()
    {
        return $this->hasMany(Profession::class, 'tw_corporativos_id');
    }

    public function contratos()
    {
        return $this->hasMany(Contratos::class, 'tw_corporativos_id');
    }
}
