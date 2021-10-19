<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DocCorporativo extends Model
{
    //
    protected $table = 'tw_documentos_corporativos';

    public $timestamps= false;
    
    protected $primaryKey='id';

    protected $fillable = [
        'tw_corporativos_id', 'tw_documentos_id', 'S_ArchivoUrl'
    ];
}
