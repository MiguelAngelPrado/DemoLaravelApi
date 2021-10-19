<?php
namespace App\Http\Services;

use App\Libs\ServiceResponse;
use App\Exceptions\ResponseException;
use App\Http\Repositories\ContratoRepository;
use Illuminate\Support\Facades\Validator;

class ContratoService extends ServiceResponse {

    public $repositoryContrato;

    public function __construct()
    {
        $this->repositoryContrato = new ContratoRepository();
    }

    public function listContratos(){
        $datos = $this->repositoryContrato->listContratos();
        $this->responseSuccess($datos, 'Listado de Contratos');
    }

    public function guardarContrato($request,$id = null){
        $data = [];
        $data = $request->all();

        $datosValidar['D_FechaInicio'] = ['required'];
        $datosValidar['D_FechaFin'] = ['required'];
        $datosValidar['S_URLContrato'] = ['required'];
        if(!$id)
            $datosValidar['tw_corporativos_id'] = ['required'];

        $validator = Validator::make($data, $datosValidar);
        if ($validator->fails()) {
            $message = $validator->errors()->toArray();

            throw new ResponseException('Todos los campos son obligatorias*',$message);
        }

        if($id){
            $this->repositoryContrato->updateContrato($data,$id);
            $this->responseSuccess([], "Información del contrato se actualizo con éxito.");
        }else{
            $datos = $this->repositoryContrato->saveContrato($data);
            $this->responseSuccess(['idContrato'=>$datos], "Información del contrato se guardó con éxito.");
        }
    }

    public function verContrato($id){
        $datos = $this->repositoryContrato->verContrato($id);
        if($datos != null)
            $this->responseSuccess($datos, 'Información del contrato');
         else
            throw new ResponseException('Contacto no encontrado',[]);
    }

     public function eliminarContrato($id){
        $datos = $this->repositoryContrato->eliminarContrato($id);
        if($datos != null)
            $this->responseSuccess($datos, 'Registro eliminado');
        else
             throw new ResponseException('Id no encontrado',[]);
        
    }
 }