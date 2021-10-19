<?php
namespace App\Http\Repositories;

use App\Corporativo;
use App\Empresa;
use App\Contactos;
use App\Contratos;
use App\Documentos;
use App\DocCorporativo;

class CorporativoRepository{

	protected $modelCorporativo;

	public function __construct()
    {
        $this->modelCorporativo = new Corporativo();
    }

    public function listCorporativos(){
    	return $this->modelCorporativo->all();
    }

    public function saveCorporativo($data){
        $corporativo = new $this->modelCorporativo;
        $corporativo->S_NombreCorto = $data['S_NombreCorto'];
        $corporativo->S_NombreCompleto = $data['S_NombreCompleto'];
        $corporativo->S_logoURL = $data['S_logoURL'];
        $corporativo->S_DBName = $data['S_DBName'];
        $corporativo->S_DBUsuario = $data['S_DBUsuario'];
        $corporativo->S_DBPasword = $data['S_DBPasword'];
        $corporativo->S_SystemUrl = $data['S_SystemUrl'];
        $corporativo->S_Activo = $data['S_Activo'];
        $corporativo->D_FechaIncorporacion = $data['D_FechaIncorporacion'];
        $corporativo->tw_usuarios_id = $data['tw_usuarios_id'];
        $corporativo->save();
        return $corporativo->id;
    }

    public function updateCorporativo($data,$id){
        $corporativo = $this->modelCorporativo::find($id);
        $corporativo->S_NombreCorto = $data['S_NombreCorto'];
        $corporativo->S_NombreCompleto = $data['S_NombreCompleto'];
        $corporativo->S_logoURL = $data['S_logoURL'];
        $corporativo->S_DBName = $data['S_DBName'];
        $corporativo->S_DBUsuario = $data['S_DBUsuario'];
        $corporativo->S_DBPasword = $data['S_DBPasword'];
        $corporativo->S_SystemUrl = $data['S_SystemUrl'];
        $corporativo->S_Activo = $data['S_Activo'];
        $corporativo->D_FechaIncorporacion = $data['D_FechaIncorporacion'];
        $corporativo->tw_usuarios_id = $data['tw_usuarios_id'];
        return $corporativo->update();
    }

    public function verCorporativo($id){
        $corporativo = $this->modelCorporativo::find($id);
        return $corporativo;
    }

    public function verCorporativoDetalle($id){
        $corporativo = $this->modelCorporativo::find($id);

        $empCorpo = Empresa::where('tw_corporativos_id','=',$id)->first();
        $corporativo['tw_empresas_corporativos'] = $empCorpo;

        $contacto = Contactos::where('tw_corporativos_id','=',$id)->get();
        $corporativo['tw_contactos_corporativos'] = $contacto;

        $conntrato = Contratos::where('tw_corporativos_id','=',$id)->get();
        $corporativo['tw_contratos_corporativos'] = $conntrato;

        $documento = DocCorporativo::where('tw_corporativos_id','=',$id)->get();

        foreach($documento as $key => $item){
            $doc = Documentos::where('id','=',$item->tw_documentos_id)->first();

            $datos['S_Nombre'] = $doc->S_Nombre;
            $datos['N_Obligatorio']=$doc->N_Obligatorio;
            $datos['S_Descripcion']=$doc->S_Descripcion;
            $datos['S_Nombre']=$doc->S_Nombre;
            $datos['tw_corporativos_id']=$item->tw_corporativos_id;
            $datos['S_ArchivoUrl']=$item->S_ArchivoUrl;
            $datosDoc[$key] = $datos;
        }
       $corporativo['tw_documentos'] = $datosDoc;

        return $corporativo;
    }
}
