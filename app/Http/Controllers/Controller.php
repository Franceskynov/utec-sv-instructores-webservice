<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Utils\Constants;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected $status;
    /**
     * @var array
     */
    protected $response = [
        'error'   => null,
        'message' => null,
        'data'    => null
    ];

    /**
     * @var array
     */
    protected $notFoundResponse = [
        Constants::ERROR    => true,
        Constants::MESSAGE  => Constants::MESSAGE_NOT_FOUND,
        Constants::DATA     => []
    ];

    /**
     * @var array
     */
    protected $previouslyDeleted = [
        Constants::ERROR    => true,
        Constants::MESSAGE  => Constants::MESSAGE_PREVIOUSLY_DELETED,
        Constants::DATA     => []
    ];

    /**
     * @var array
     */
    protected $successDeletion = [
        Constants::ERROR    => false,
        Constants::MESSAGE  => Constants::MESSAGE_SUCCESS_DELETION,
        Constants::DATA     => []
    ];

    /**
     * @var array
     */
    protected $invalidCreation = [
        Constants::ERROR    => true,
        Constants::MESSAGE  => Constants::MESSAGE_INVALID_CREATION . '; ' . Constants::MESSAGE_INVALID_CHECKING,
        Constants::DATA     => []
    ];

    /**
     * @var array
     */
    protected $invalidTrainingAsignation = [
        Constants::ERROR    => true,
        Constants::MESSAGE  => Constants::MESSAGE_INVALID_TRAINGIN_ASIGNATION,
        Constants::DATA     => []
    ];

    /**
     * @var array
     */
    protected $simpleInvalodCreation = [
        Constants::ERROR    => true,
        Constants::MESSAGE  => Constants::MESSAGE_INVALID_CREATION,
        Constants::DATA     => []
    ];

    /**
     * @var array
     */
    protected $invalidUserDelete = [
        Constants::ERROR    => true,
        Constants::MESSAGE  => Constants::MESSAGE_INVALID_DELETE_USER_ADM,
        Constants::DATA     => []
    ];

    /**
     * @var array
     */
    protected $successCreation = [
        Constants::ERROR    => false,
        Constants::MESSAGE  => Constants::MESSAGE_SUCCESS_CREATION,
        Constants::DATA     => []
    ];

    /**
     * @var array
     */
    protected $successChanged = [
        Constants::ERROR    => false,
        Constants::MESSAGE  => Constants::MESSAGE_SUCCESS_CHANGED_CREDENTIALS,
        Constants::DATA     => []
    ];

    /**
     * @var array
     */
    protected $successActivatedUser = [
        Constants::ERROR    => false,
        Constants::MESSAGE  => Constants::MESSAGE_SUCCESS_ACTIVATED_USER,
        Constants::DATA     => []
    ];

    /**
     * @var array
     */
    protected $invalidChanged = [
        Constants::ERROR    => true,
        Constants::MESSAGE  => Constants::MESSAGE_INVALID_CHANGED_CREDENTIALS,
        Constants::DATA     => []
    ];

    /**
     * @var array
     */
    protected $invalidUserActivate = [
        Constants::ERROR    => true,
        Constants::MESSAGE  => Constants::MESSAGE_INVALID_ACTIVATED_USER_ACTIVATED,
        Constants::DATA     => []
    ];

    /**
     * @var array
     */
    protected $invalidActivatedUser = [
        Constants::ERROR    => true,
        Constants::MESSAGE  => Constants::MESSAGE_INVALID_ACTIVATED_USER,
        Constants::DATA     => []
    ];

    /**
     * @var array
     */
    protected $invalidResponse = [
        Constants::ERROR    => true,
        Constants::MESSAGE  => Constants::MESSAGE_INVALID_RESPONSE,
        Constants::DATA     => []
    ];

    /**
     * @var array
     */
    protected $invalidEmailResponse = [
        Constants::ERROR    => true,
        Constants::MESSAGE  => Constants::MESSAGE_INVALID_EMAIL_RESPONSE,
        Constants::DATA     => []
    ];

    /**
     * @var array
     */
    protected $invalidUpdate = [
        Constants::ERROR    => true,
        Constants::MESSAGE  => Constants::MESSAGE_INVALID_UPDATE,
        Constants::DATA     => []
    ];

    /**
     * @var array
     */
    protected $validUpdate = [
        Constants::ERROR    => false,
        Constants::MESSAGE  => Constants::MESSAGE_SUCCESS_UPDATE,
        Constants::DATA     => []
    ];

    /**
     * @var array
     */
    protected $invalidChecking = [
        Constants::ERROR    => true,
        Constants::MESSAGE  => Constants::MESSAGE_INVALID_CHECKING,
        Constants::DATA     => []
    ];

    /**
     * @var array
     */
    protected $invalidCarnet = [
        Constants::ERROR    => true,
        Constants::MESSAGE  => Constants::MESSAGE_INVALID_CARNET,
        Constants::DATA     => null
    ];

    /**
     * @param $data
     * @param $message
     * @param $error
     * @return array
     */
    protected function loginResponse($data, $message, $error)
    {
        return [
            Constants::ERROR    => $error,
            Constants::MESSAGE  => $message,
            Constants::DATA     => $data
        ];
    }

    protected function soapResponse($data)
    {
        return [
            Constants::ERROR    => false,
            Constants::MESSAGE  => Constants::MESSAGE_SUCCESS,
            Constants::DATA     =>  json_decode($data)
        ];
    }

    /**
     * @param $data
     * @return array
     */
    protected function successResponse($data)
    {
        return [
            Constants::ERROR    => false,
            Constants::MESSAGE  => Constants::MESSAGE_SUCCESS,
            Constants::DATA     => $data
        ];
    }

    protected function invalidCreationResponse($data)
    {
        return [
            Constants::ERROR    => true,
            Constants::MESSAGE  => Constants::MESSAGE_INVALID_CREATION,
            Constants::DATA     => $data
        ];
    }

}
