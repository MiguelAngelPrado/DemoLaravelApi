<?php
namespace App\Http\Repositories;

use App\Contratos;

class ContratoRepository{

    protected $modelContrato;

    public function __construct()
    {
        $this->modelContrato = new Contratos();
    }

    public function listContratos(){
        return $this->modelContrato->all();
    }

    public function saveContrato($data){
        $contrato = new $this->modelContrato;
        $contrato->D_FechaInicio = $data['D_FechaInicio'];
        $contrato->D_FechaFin = $data['D_FechaFin'];
        $contrato->S_URLContrato = $data['S_URLContrato'];
        $contrato->tw_corporativos_id = $data['tw_corporativos_id'];
        $contrato->save();
        return $contrato->id;
    }

    public function updateContrato($data,$id){
        $contrato = $this->modelContrato::find($id);
        $contrato->D_FechaInicio = $data['D_FechaInicio'];
        $contrato->D_FechaFin = $data['D_FechaFin'];
        $contrato->S_URLContrato = $data['S_URLContrato'];
        return $contrato->update();
    }

    public function verContrato($id){
        $contrato = $this->modelContrato::find($id);
        if($contrato != null)
            return $contrato;
        else 
            return null;
    }

    public function eliminarContrato($id){
        $contrato = $this->modelContrato::find($id);
        if($contrato != null)
            return $contrato->delete();
        else 
            return null;
    }
}
