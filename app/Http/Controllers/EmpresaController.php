<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Services\EmpresaService;
use App\Exceptions\ResponseException;

class EmpresaController extends Controller
{
    protected $serviceEmpresa;
    
     public function __construct()
    {
        $this->serviceEmpresa = new EmpresaService();
    }

    public function index()
    {
        $this->serviceEmpresa->listEmpresas();
        return $this->serviceEmpresa->HTTPresponse();
    }

    public function store(Request $request)
    {
        try {
            $this->serviceEmpresa->guardarEmpresa($request);
            return $this->serviceEmpresa->HTTPresponse();
        } catch (ResponseException $e) {
            $this->serviceEmpresa->responseError401($e->getMessage(), $e->getData());
            return $this->serviceEmpresa->HTTPresponse();
        }
    }

    public function edit($id)
    {
        try {
            $this->serviceEmpresa->verEmpresa($id);
            return $this->serviceEmpresa->HTTPresponse();
        } catch (ResponseException $e) {
            $this->serviceEmpresa->responseError401($e->getMessage(), $e->getData());
            return $this->serviceEmpresa->HTTPresponse();
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $this->serviceEmpresa->guardarEmpresa($request,$id);
            return $this->serviceEmpresa->HTTPresponse();
        } catch (ResponseException $e) {
            $this->serviceEmpresa->responseError401($e->getMessage(), $e->getData());
            return $this->serviceEmpresa->HTTPresponse();
        }
    }

    public function destroy($id)
    {
        try {
            $this->serviceEmpresa->eliminarEmpresa($id);
            return $this->serviceEmpresa->HTTPresponse();
        } catch (ResponseException $e) {
            $this->serviceEmpresa->responseError401($e->getMessage(), $e->getData());
            return $this->serviceEmpresa->HTTPresponse();
        }
    }
}
