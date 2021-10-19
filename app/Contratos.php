<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Corporativo;

class Contratos extends Model
{
    //
    protected $table = 'tw_contratos_corporativos';

    public $timestamps= false;

    protected $primaryKey='id';

    protected $fillable = [
        'D_FechaInicio', 'D_FechaFin', 'S_URLContrato', 'tw_corporativos_id',
    ];

    public function corporativos()
    {
        return $this->hasMany(Corporativo::class, 'id','tw_corporativos_id');
    }
}
