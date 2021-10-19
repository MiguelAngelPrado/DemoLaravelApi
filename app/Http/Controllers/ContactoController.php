<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Services\ContactoService;
use App\Exceptions\ResponseException;

class ContactoController extends Controller
{
    protected $serviceEmpresa;

    public function __construct()
    {
        $this->serviceContacto = new ContactoService();
    }


    public function index()
    {
        $this->serviceContacto->listContactos();
        return $this->serviceContacto->HTTPresponse();
    }

    public function store(Request $request)
    {
        try {
            $this->serviceContacto->guardarContacto($request);
            return $this->serviceContacto->HTTPresponse();
        } catch (ResponseException $e) {
            $this->serviceContacto->responseError401($e->getMessage(), $e->getData());
            return $this->serviceContacto->HTTPresponse();
        }
    }


    public function edit($id)
    {
        try {
            $this->serviceContacto->verContacto($id);
            return $this->serviceContacto->HTTPresponse();
        } catch (ResponseException $e) {
            $this->serviceContacto->responseError401($e->getMessage(), $e->getData());
            return $this->serviceContacto->HTTPresponse();
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $this->serviceContacto->guardarContacto($request,$id);
            return $this->serviceContacto->HTTPresponse();
        } catch (ResponseException $e) {
            $this->serviceContacto->responseError401($e->getMessage(), $e->getData());
            return $this->serviceContacto->HTTPresponse();
        }
    }

    public function destroy($id)
    {
        try {
            $this->serviceContacto->eliminarContacto($id);
            return $this->serviceContacto->HTTPresponse();
        } catch (ResponseException $e) {
            $this->serviceContacto->responseError401($e->getMessage(), $e->getData());
            return $this->serviceContacto->HTTPresponse();
        }
    }
}
