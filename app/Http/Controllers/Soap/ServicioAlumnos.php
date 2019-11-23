<?php

   /*
   |--------------------------------------------------------------------------
   | Copyright (C) (2019) (Franceskynov) (franceskynov@gmail.com)
   |--------------------------------------------------------------------------
   |
   */
namespace App\Http\Controllers\Soap;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Utils\CarnetUtils;
use App\Utils\Constants;
use App\Utils\HttpUtils;

class ServicioAlumnos extends Controller
{

    /**
     * @throws \SoapFault
     *
     */
    public function index()
    {

        $client = new \SoapClient(Constants::ENDPOINT, Constants::PARAMS);

        return dd($client->__getFunctions());
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     * @throws \SoapFault
     */
    public function pensum(Request $request)
    {
        if (HttpUtils::checkClient($request)) {
            if ($res = CarnetUtils::check($request))
            {
                $carnet = CarnetUtils::getCarnet($request);
                $client = new \SoapClient(Constants::ENDPOINT, Constants::PARAMS);
                $pensum = $client->Pensum([Constants::CARNET => $carnet])->PensumResult;
                $this->response = $this->soapResponse($pensum);

            } else {

                $this->response = $this->invalidCarnet;
            }
        } else {
            $this->response = $this->invalidCarnet;
        }

        return \Response::json($this->response);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     * @throws \SoapFault
     */
    public function notas(Request $request)
    {
        if (HttpUtils::checkClient($request)) {
            if ($res = CarnetUtils::check($request))
            {
                $carnet = CarnetUtils::getCarnet($request);
                $client = new \SoapClient(Constants::ENDPOINT, Constants::PARAMS);
                $notas  = $client->Notas([Constants::CARNET => $carnet])->NotasResult;
                $this->response = $this->soapResponse($notas);

            } else {

                $this->response = $this->invalidCarnet;
            }
        } else {
            $this->response = $this->invalidCarnet;
        }


        return \Response::json($this->response);
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     * @throws \SoapFault
     */
    public function expediente(Request $request)
    {
        if (HttpUtils::checkClient($request)) {
            if ($res = CarnetUtils::check($request))
            {
                $carnet = CarnetUtils::getCarnet($request);
                $client = new \SoapClient(Constants::ENDPOINT, Constants::PARAMS);
                $notas  = $client->Expediente([Constants::CARNET => $carnet])->ExpedienteResult;
                $this->response = $this->soapResponse($notas);

            } else {

                $this->response = $this->invalidCarnet;
            }
        } else {
            $this->response = $this->invalidCarnet;
        }

        return \Response::json($this->response);
    }
}
