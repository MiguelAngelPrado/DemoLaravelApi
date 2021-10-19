<?php
namespace App\Http\Services;

use App\Libs\ServiceResponse;
use App\Exceptions\ResponseException;
use App\Http\Repositories\CorporativoRepository;
use Illuminate\Support\Facades\Validator;

class CorporativoService extends ServiceResponse {

	public $repositoryCorporativo;

	public function __construct()
    {
        $this->repositoryCorporativo = new CorporativoRepository();
    }

    public function listCorporativos(){
    	$datos = $this->repositoryCorporativo->listCorporativos();
        $this->responseSuccess($datos, 'Listado de Corporativos');
    }

    public function guardarCorporativo($request,$id = null){
    	$data = [];
        $data = $request->all();

        $datosValidar['S_NombreCorto'] = ['required'];
        $datosValidar['S_NombreCompleto'] = ['required'];
        $datosValidar['S_logoURL'] = ['required'];
        $datosValidar['S_DBUsuario'] = ['required'];
        $datosValidar['S_DBPasword'] = ['required'];
        $datosValidar['S_DBName'] = ['required'];
        $datosValidar['S_SystemUrl'] = ['required'];
        $datosValidar['S_Activo'] = ['required'];
        $datosValidar['D_FechaIncorporacion'] = ['required'];
        $datosValidar['tw_usuarios_id'] = ['required'];

        $validator = Validator::make($data, $datosValidar);
        if ($validator->fails()) {
            $message = $validator->errors()->toArray();

            throw new ResponseException('Todos los campos son obligatorias*',$message);
        }

        if($id){
            $datosCor = $this->repositoryCorporativo->updateCorporativo($data,$id);
            $this->responseSuccess([], "Información del corporativo se actualizo con éxito.");
        }else{
            $datosCor = $this->repositoryCorporativo->saveCorporativo($data);
            $this->responseSuccess(['idCorporativo'=>$datosCor], "Información del corporativo se guardó con éxito.");
        }
    }

    public function verCorporativo($id){
        $datos = $this->repositoryCorporativo->verCorporativo($id);
        $this->responseSuccess($datos, 'Información del Corporativo');
    }

    public function verCorporativoDetalle($id){
        $datos = $this->repositoryCorporativo->verCorporativoDetalle($id);
        $this->responseSuccess($datos, 'Información del Corporativo');
    }

 }