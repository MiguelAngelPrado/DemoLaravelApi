<?php
namespace App\Http\Services;

use App\Libs\ServiceResponse;
use App\Exceptions\ResponseException;
use App\Http\Repositories\EmpresaRepository;
use Illuminate\Support\Facades\Validator;

class EmpresaService extends ServiceResponse {

    public $repositoryEmpresa;

    public function __construct()
    {
        $this->repositoryEmpresa = new EmpresaRepository();
    }

    public function listEmpresas(){
        $datos = $this->repositoryEmpresa->listEmpresas();
        $this->responseSuccess($datos, 'Listado de Empresas');
    }

    public function guardarEmpresa($request,$id = null){
        $data = [];
        $data = $request->all();

        $datosValidar['S_RazonSocial'] = ['required'];
        $datosValidar['S_RFC'] = ['required'];
        $datosValidar['S_Pais'] = ['required'];
        $datosValidar['S_Estado'] = ['required'];
        $datosValidar['S_Municipio'] = ['required'];
        $datosValidar['S_ColoniaLocalidad'] = ['required'];
        $datosValidar['S_Domicilio'] = ['required'];
        $datosValidar['S_CodigoPostal'] = ['required'];
        $datosValidar['S_UsoCFDI'] = ['required'];
        $datosValidar['S_UrlRFC'] = ['required'];
        $datosValidar['S_UrlActaConstitutiva'] = ['required'];
        $datosValidar['Activo'] = ['required'];
        $datosValidar['S_Comentarios'] = ['required'];
        $datosValidar['tw_corporativos_id'] = ['required'];

        $validator = Validator::make($data, $datosValidar);
        if ($validator->fails()) {
            $message = $validator->errors()->toArray();

            throw new ResponseException('Todos los campos son obligatorias*',$message);
        }

        if($id){
            $datosCor = $this->repositoryEmpresa->updateEmpresa($data,$id);
            $this->responseSuccess([], "Información de la emperesa se actualizo con éxito.");
        }else{
            $datosCor = $this->repositoryEmpresa->saveEmpresa($data);
            $this->responseSuccess(['idEmpresa'=>$datosCor], "Información de la empresa se guardó con éxito.");
        }
    }

    public function verEmpresa($id){
        $datos = $this->repositoryEmpresa->verEmpresa($id);
        if($datos != null)
            $this->responseSuccess($datos, 'Información de la empresa');
         else
            throw new ResponseException('Empresa no encontrada',[]);
    }

     public function eliminarEmpresa($id){
        $datos = $this->repositoryEmpresa->eliminarEmpresa($id);
        if($datos != null)
            $this->responseSuccess($datos, 'Registro eliminado');
        else
             throw new ResponseException('Id no encontrado',[]);
        
    }
 }