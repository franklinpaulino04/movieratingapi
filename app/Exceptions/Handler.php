<?php

namespace App\Exceptions;

use Cassandra\Exception\ValidationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Support\Facades\Redirect;

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
     * Register the exception handling callbacks for the application.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function render($request, \Throwable $exception)
    {
        $code       = $exception->getCode();
        $message    = $exception->getMessage();

        if ($code < 100 || $code >= 600)
        {
            $code = \Illuminate\Http\Response::HTTP_INTERNAL_SERVER_ERROR;
        }

        if ($exception instanceof ModelNotFoundException)
        {
            $message    = $exception->getMessage();
            $code       = \Illuminate\Http\Response::HTTP_NOT_FOUND;

            if (preg_match('@\\\\(\w+)\]@', $message, $matches))
            {
                $model      = $matches[1];
                $model      = preg_replace('/Table/i', '', $model);
                $message    = "{$model} not found.";
            }
        }

        if ($exception instanceof ValidationException)
        {
            $validator  = $exception->validator;
            $message    = $validator->errors()->first();
            $code       = \Illuminate\Http\Response::HTTP_UNPROCESSABLE_ENTITY;

            if (! $request->expectsJson() and ! $request->isXmlHttpRequest())
            {
                return Redirect::back()->withInput()->withErrors($message);
            }
        }

        if ($request->expectsJson() or $request->isXmlHttpRequest())
        {
            return response()->json([
                'success' => false,
                'message' => $message,
            ], $code);
        }

        return parent::render($request, $exception);
    }
}
