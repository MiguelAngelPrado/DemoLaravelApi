<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Services\DocumentoService;
use App\Exceptions\ResponseException;


class DocumentosController extends Controller
{
    protected $serviceDocumento;

    public function __construct()
    {
        $this->serviceDocumento = new DocumentoService();
    }

    public function index()
    {
        $this->serviceDocumento->listDocumentos();
        return $this->serviceDocumento->HTTPresponse();
    }

    public function store(Request $request)
    {
        try {
            $this->serviceDocumento->guardarDocumento($request);
            return $this->serviceDocumento->HTTPresponse();
        } catch (ResponseException $e) {
            $this->serviceDocumento->responseError401($e->getMessage(), $e->getData());
            return $this->serviceDocumento->HTTPresponse();
        }
    }

    public function edit($id)
    {
        try {
            $this->serviceDocumento->verDocumento($id);
            return $this->serviceDocumento->HTTPresponse();
        } catch (ResponseException $e) {
            $this->serviceDocumento->responseError401($e->getMessage(), $e->getData());
            return $this->serviceDocumento->HTTPresponse();
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $this->serviceDocumento->guardarDocumento($request,$id);
            return $this->serviceDocumento->HTTPresponse();
        } catch (ResponseException $e) {
            $this->serviceDocumento->responseError401($e->getMessage(), $e->getData());
            return $this->serviceDocumento->HTTPresponse();
        }
    }

    public function destroy($id)
    {
        try {
            $this->serviceDocumento->eliminarDocumento($id);
            return $this->serviceDocumento->HTTPresponse();
        } catch (ResponseException $e) {
            $this->serviceDocumento->responseError401($e->getMessage(), $e->getData());
            return $this->serviceDocumento->HTTPresponse();
        }
    }
}
