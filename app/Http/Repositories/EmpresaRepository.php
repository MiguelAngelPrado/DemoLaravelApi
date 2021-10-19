<?php
namespace App\Http\Repositories;

use App\Empresa;

class EmpresaRepository{

    protected $modelEmpresa;

    public function __construct()
    {
        $this->modelEmpresa = new Empresa();
    }

    public function listEmpresas(){
        return $this->modelEmpresa->all();
    }

    public function saveEmpresa($data){
        $empresa = new $this->modelEmpresa;
        $empresa->S_RazonSocial = $data['S_RazonSocial'];
        $empresa->S_RFC = $data['S_RFC'];
        $empresa->S_Pais = $data['S_Pais'];
        $empresa->S_Estado = $data['S_Estado'];
        $empresa->S_Municipio = $data['S_Municipio'];
        $empresa->S_ColoniaLocalidad = $data['S_ColoniaLocalidad'];
        $empresa->S_Domicilio = $data['S_Domicilio'];
        $empresa->S_CodigoPostal = $data['S_CodigoPostal'];
        $empresa->S_UsoCFDI = $data['S_UsoCFDI'];
        $empresa->S_UrlRFC = $data['S_UrlRFC'];
        $empresa->S_UrlActaConstitutiva = $data['S_UrlActaConstitutiva'];
        $empresa->Activo = $data['Activo'];
        $empresa->S_Comentarios = $data['S_Comentarios'];
        $empresa->tw_corporativos_id = $data['tw_corporativos_id'];
        $empresa->save();
        return $empresa->id;
    }

    public function updateEmpresa($data,$id){
        $empresa = $this->modelEmpresa::find($id);
        $empresa->S_RazonSocial = $data['S_RazonSocial'];
        $empresa->S_RFC = $data['S_RFC'];
        $empresa->S_Pais = $data['S_Pais'];
        $empresa->S_Estado = $data['S_Estado'];
        $empresa->S_Municipio = $data['S_Municipio'];
        $empresa->S_ColoniaLocalidad = $data['S_ColoniaLocalidad'];
        $empresa->S_Domicilio = $data['S_Domicilio'];
        $empresa->S_CodigoPostal = $data['S_CodigoPostal'];
        $empresa->S_UsoCFDI = $data['S_UsoCFDI'];
        $empresa->S_UrlRFC = $data['S_UrlRFC'];
        $empresa->S_UrlActaConstitutiva = $data['S_UrlActaConstitutiva'];
        $empresa->Activo = $data['Activo'];
        $empresa->S_Comentarios = $data['S_Comentarios'];
        $empresa->tw_corporativos_id = $data['tw_corporativos_id'];
        return $empresa->update();
    }

    public function verEmpresa($id){
        $empresa = $this->modelEmpresa::find($id);
        if($empresa != null)
            return $empresa;
        else 
            return null;
    }

    public function eliminarEmpresa($id){
        $empresa = $this->modelEmpresa::find($id);
        if($empresa != null)
            return $empresa->delete();
        else 
            return null;
    }
}
