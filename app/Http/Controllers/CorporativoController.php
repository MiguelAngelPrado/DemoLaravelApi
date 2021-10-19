<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Services\CorporativoService;
use App\Exceptions\ResponseException;

class CorporativoController extends Controller
{
    protected $serviceCorporativo;

    public function __construct()
    {
        $this->serviceCorporativo = new CorporativoService();
    }

    public function corporativo($id){
        try {
            $this->serviceCorporativo->verCorporativoDetalle($id);
            return $this->serviceCorporativo->HTTPresponse();
        } catch (ResponseException $e) {
            $this->serviceCorporativo->responseError401($e->getMessage(), $e->getData());
            return $this->serviceCorporativo->HTTPresponse();
        }
    }

    public function index()
    {
        $this->serviceCorporativo->listCorporativos();
        return $this->serviceCorporativo->HTTPresponse();
    }

    public function store(Request $request)
    {
        try {
            $this->serviceCorporativo->guardarCorporativo($request);
            return $this->serviceCorporativo->HTTPresponse();
        } catch (ResponseException $e) {
            $this->serviceCorporativo->responseError401($e->getMessage(), $e->getData());
            return $this->serviceCorporativo->HTTPresponse();
        }
    }


    public function edit($id)
    {
        try {
            $this->serviceCorporativo->verCorporativo($id);
            return $this->serviceCorporativo->HTTPresponse();
        } catch (ResponseException $e) {
            $this->serviceCorporativo->responseError401($e->getMessage(), $e->getData());
            return $this->serviceCorporativo->HTTPresponse();
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $this->serviceCorporativo->guardarCorporativo($request, $id);
            return $this->serviceCorporativo->HTTPresponse();
        } catch (ResponseException $e) {
            $this->serviceCorporativo->responseError401($e->getMessage(), $e->getData());
            return $this->serviceCorporativo->HTTPresponse();
        }
    }

    public function destroy($id)
    {

    }
}
