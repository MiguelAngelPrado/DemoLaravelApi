<?php
namespace App\Http\Repositories;

use App\Documentos;
use App\DocCorporativo;

class DocumentoRepository{

    protected $modelDocumento;
    protected $modelDocCorporativo;

    public function __construct()
    {
        $this->modelDocumento = new Documentos();
        $this->modelDocCorporativo = new DocCorporativo();
    }

    public function listDocumentos(){
        $datos = $this->modelDocumento->all();
        return $datos;
    }

    public function saveDocumento($data){
        $documento = new $this->modelDocumento;
        $documento->S_Nombre = $data['S_Nombre'];
        $documento->N_Obligatorio = $data['N_Obligatorio'];
        $documento->S_Descripcion = $data['S_Descripcion'];
        $documento->save();

        $docCorportivo = new $this->modelDocCorporativo;
        $docCorportivo->tw_corporativos_id = $data['tw_corporativos_id'];
        $docCorportivo->tw_documentos_id = $documento->id;
        $docCorportivo->S_ArchivoUrl = $data['S_ArchivoUrl'];
        $docCorportivo->save();

        return $documento->id;
    }

    public function updateDocumento($data,$id){
        $documento = $this->modelDocumento::find($id);
        $documento->S_Nombre = $data['S_Nombre'];
        $documento->N_Obligatorio = $data['N_Obligatorio'];
        $documento->S_Descripcion = $data['S_Descripcion'];
        $documento->update();

        $docCorportivo = $this->modelDocCorporativo::where([
            ['tw_corporativos_id',"=",$data['tw_corporativos_id']],
            ['tw_documentos_id',"=",$id]
        ])->first();
        $docCorportivo->S_ArchivoUrl = $data['S_ArchivoUrl'];

        return $docCorportivo->update();
    }

    public function verDocumento($id){
        $dato = $this->modelDocumento::find($id);

        $docCorportivo = $this->modelDocCorporativo::where([
            ['tw_documentos_id',"=",$id]
        ])->first();
        $dato['documentos_corportivo'] = $docCorportivo;

        if($dato != null)
            return $dato;
        else 
            return null;
    }

    public function eliminarDocumento($id){
        $this->modelDocCorporativo::where([
            ['tw_documentos_id',"=",$id]
        ])->delete();

        $dato = $this->modelDocumento::find($id);

        if($dato != null)
            return $dato->delete();
        else 
            return null;
    }
}
