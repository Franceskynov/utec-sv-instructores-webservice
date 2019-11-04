<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use App\Utils\Constants;
use App\Utils\DataManipulation;
use Symfony\Component\HttpKernel\Exception\UnauthorizedHttpException;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that are not reported.
     *
     * @var array
     */
    protected $dontReport = [
        //
    ];

    /**
     * A list of the inputs that are never flashed for validation exceptions.
     *
     * @var array
     */
    protected $dontFlash = [
        'password',
        'password_confirmation',
    ];

    /**
     * Report or log an exception.
     *
     * @param  \Exception  $exception
     * @return void
     */
    public function report(Exception $exception)
    {
        parent::report($exception);
    }

    private static function setStatusCode(Exception $exception)
    {
        if ($exception instanceof UnauthorizedHttpException)
        {
            return 401;
        } else {
            return 409;
        }
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Exception  $exception
     * @return \Illuminate\Http\JsonResponse
     */
    public function render($request, Exception $exception)
    {
        return \Response::json([

             Constants::ERROR    => true,
             Constants::MESSAGE  => $exception->getMessage(),
             Constants::DATA     => [
                 'code' => $exception->getCode(),
                 'handler' => false,
            ]
        ], self::setStatusCode($exception));
    }
}
