<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Services\ContratoService;
use App\Exceptions\ResponseException;

class ContratoController extends Controller
{
    protected $serviceContrato;

    public function __construct()
    {
        $this->serviceContrato = new ContratoService();
    }

    public function index()
    {
        $this->serviceContrato->listContratos();
        return $this->serviceContrato->HTTPresponse();
    }


    public function store(Request $request)
    {
        try {
            $this->serviceContrato->guardarContrato($request);
            return $this->serviceContrato->HTTPresponse();
        } catch (ResponseException $e) {
            $this->serviceContrato->responseError401($e->getMessage(), $e->getData());
            return $this->serviceContrato->HTTPresponse();
        }
    }

    public function edit($id)
    {
         try {
            $this->serviceContrato->verContrato($id);
            return $this->serviceContrato->HTTPresponse();
        } catch (ResponseException $e) {
            $this->serviceContrato->responseError401($e->getMessage(), $e->getData());
            return $this->serviceContrato->HTTPresponse();
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $this->serviceContrato->guardarContrato($request,$id);
            return $this->serviceContrato->HTTPresponse();
        } catch (ResponseException $e) {
            $this->serviceContrato->responseError401($e->getMessage(), $e->getData());
            return $this->serviceContrato->HTTPresponse();
        }
    }

    public function destroy($id)
    {
         try {
            $this->serviceContrato->eliminarContrato($id);
            return $this->serviceContrato->HTTPresponse();
        } catch (ResponseException $e) {
            $this->serviceContrato->responseError401($e->getMessage(), $e->getData());
            return $this->serviceContrato->HTTPresponse();
        }
    }
}
