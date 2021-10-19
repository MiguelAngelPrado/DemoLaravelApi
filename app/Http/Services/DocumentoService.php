<?php
namespace App\Http\Services;

use App\Libs\ServiceResponse;
use App\Exceptions\ResponseException;
use App\Http\Repositories\DocumentoRepository;
use Illuminate\Support\Facades\Validator;

class DocumentoService extends ServiceResponse {

    public $repositoryDocumento;

    public function __construct()
    {
        $this->repositoryDocumento = new DocumentoRepository();
    }

    public function listDocumentos(){
        $datos = $this->repositoryDocumento->listDocumentos();
        $this->responseSuccess($datos, 'Listado de Documentos');
    }

    public function guardarDocumento($request,$id = null){
        $data = [];
        $data = $request->all();

        $datosValidar['S_Nombre'] = ['required'];
        $datosValidar['N_Obligatorio'] = ['required'];
        $datosValidar['S_Descripcion'] = ['required'];
        $datosValidar['tw_corporativos_id'] = ['required'];
        $datosValidar['S_ArchivoUrl'] = ['required'];

        $validator = Validator::make($data, $datosValidar);
        if ($validator->fails()) {
            $message = $validator->errors()->toArray();

            throw new ResponseException('Todos los campos son obligatorias*',$message);
        }

        if($id){
            $datos = $this->repositoryDocumento->updateDocumento($data,$id);
            $this->responseSuccess([], "Información del documento se actualizo con éxito.");
        }else{
            $datos = $this->repositoryDocumento->saveDocumento($data);
            $this->responseSuccess(['idDocumento'=>$datos], "Información del documento se guardó con éxito.");
        }
    }

    public function verDocumento($id){
        $datos = $this->repositoryDocumento->verDocumento($id);
        if($datos != null)
            $this->responseSuccess($datos, 'Información del documento');
         else
            throw new ResponseException('Documento no encontrada',[]);
    }

     public function eliminarDocumento($id){
        $datos = $this->repositoryDocumento->eliminarDocumento($id);
        if($datos != null)
            $this->responseSuccess($datos, 'Registro eliminado');
        else
             throw new ResponseException('Id no encontrado',[]);
        
    }
 }