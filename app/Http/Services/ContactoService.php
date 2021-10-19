<?php
namespace App\Http\Services;

use App\Libs\ServiceResponse;
use App\Exceptions\ResponseException;
use App\Http\Repositories\ContactoRepository;
use Illuminate\Support\Facades\Validator;

class ContactoService extends ServiceResponse {

    public $repositoryContacto;

    public function __construct()
    {
        $this->repositoryContacto = new ContactoRepository();
    }

    public function listContactos(){
        $datos = $this->repositoryContacto->listContactos();
        $this->responseSuccess($datos, 'Listado de Contactos');
    }

    public function guardarContacto($request,$id = null){
        $data = [];
        $data = $request->all();

        $datosValidar['S_Nombre'] = ['required'];
        $datosValidar['S_Puesto'] = ['required'];
        $datosValidar['S_Comentarios'] = ['required'];
        $datosValidar['N_TelefonoFijo'] = ['required'];
        $datosValidar['N_TelefonoMovil'] = ['required'];
        $datosValidar['Email'] = ['required'];

        if(!$id)
            $datosValidar['tw_corporativos_id'] = ['required'];

        $validator = Validator::make($data, $datosValidar);
        if ($validator->fails()) {
            $message = $validator->errors()->toArray();

            throw new ResponseException('Todos los campos son obligatorias*',$message);
        }

        if($id){
            $datosCor = $this->repositoryContacto->updateContacto($data,$id);
            $this->responseSuccess([], "Información del contacto se actualizo con éxito.");
        }else{
            $datosCor = $this->repositoryContacto->saveContacto($data);
            $this->responseSuccess(['idEmpresa'=>$datosCor], "Información del contacto se guardó con éxito.");
        }
    }

    public function verContacto($id){
        $datos = $this->repositoryContacto->verContacto($id);
        if($datos != null)
            $this->responseSuccess($datos, 'Información del contacto');
         else
            throw new ResponseException('Contacto no encontrado',[]);
    }

    public function eliminarContacto($id){
        $datos = $this->repositoryContacto->eliminarContacto($id);
        if($datos != null)
            $this->responseSuccess($datos, 'Registro eliminado');
        else
             throw new ResponseException('Id no encontrado',[]);
        
    }
 }