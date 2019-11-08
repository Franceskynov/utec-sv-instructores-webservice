<?php

namespace App\Http\Controllers\Api;

use App\Utils\CustomValidators;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Instructor;
use App\Asignacion;
use App\Historial;
use App\Setting;
class EvaluationController extends Controller
{
    public $settings;
    public function __construct()
    {
        $this->settings = Setting::find(1);
        if (env('JWT_LOGIN'))
        {
            $this->middleware('jwt.auth');
        }
    }


    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function checkSelfAppraisal(Request $request)
    {
        $instructorId  =  $request->input('instructorId');
        $asignacionName =  $request->input('asignacionName');
        if ($row = Instructor::find($instructorId))
        {
            $asignacion = Asignacion::where('instructor_id', $row->id)
                ->where('nombre', $asignacionName)
                ->first();

            $this->response = $this->successResponse($asignacion);

        } else {

            $this->response = $this->invalidResponse;
        }

        return \Response::json($this->response);
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function evaluateSelfAppraisal(Request $request)
    {


        $validator = CustomValidators::requestValidator($request, CustomValidators::$evaluateRules);

        if ($validator->fails())
        {
            $this->response = $this->invalidCreation;

        } else {

            $instructorId  =  $request->instructorId;
            $asignacionName =  $request->asignacionName;
            $score = $request->score;
            if ($row = Instructor::find($instructorId))
            {
                $historialId = $row->historial->where('nombre', $asignacionName)->first()->id;
                $historial = Historial::find($historialId);
                $historial->update([
                    'autoevaluacion' => $score,
                    'is_autoevaluado' => true,
                    'nota' => $historial->nota + ($score * $this->settings->autoevaluacion_percentage)
                ]);
                $this->response = $this->successCreation;
            } else {
                $this->response = $this->invalidChanged;
            }
        }

        return \Response::json($this->response);
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function evaluateHumanResources(Request $request)
    {
        $validator = CustomValidators::requestValidator($request, CustomValidators::$evaluateRHRules);

        if ($validator->fails())
        {
            $this->response = $this->invalidCreation;

        } else {
            $historialId  =  $request->historialId;
            $score = $request->score;
            if ($row = Historial::find($historialId))
            {
                $row->update([
                    'evaluacion_rrhh' => $score,
                    'is_rrhh_evaluado' => true,
                    'nota' => $row->nota + ($score * $this->settings->evaluacion_rrhh_percentage)
                ]);
                $this->response = $this->successCreation;
            } else {
                $this->response = $this->invalidChanged;
            }
        }

        return \Response::json($this->response);
    }
}
