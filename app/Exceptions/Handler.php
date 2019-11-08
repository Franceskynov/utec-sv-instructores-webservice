<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use App\Utils\Constants;
use App\Utils\DataManipulation;
use Symfony\Component\HttpKernel\Exception\UnauthorizedHttpException;
use Illuminate\Database\Eloquent\RelationNotFoundException;
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
        } else if ($exception instanceof RelationNotFoundException ) {
            return 500;
        } else {
            return 409;
        }
    }

    private static function stage(Exception $exception)
    {
        if (env('APP_DEBUG') == 'true')
        {
            return [
                Constants::ERROR    => true,
                Constants::MESSAGE  => $exception->getMessage(),
                Constants::DATA     => [
                    'code' => $exception->getCode(),
                    'handler' => false,
                    'class' => get_class($exception)
                ]
            ];

        } else {
            return [
                Constants::ERROR    => true,
                Constants::MESSAGE  => DataManipulation::truncate($exception->getMessage()),
                Constants::DATA     => [
                    'code' => $exception->getCode(),
                ]
            ];
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
        return \Response::json(self::stage($exception), self::setStatusCode($exception));
    }
}
