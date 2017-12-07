<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Foundation\Validation\ValidationException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;

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
     * This is a great spot to send exceptions to Sentry, Bugsnag, etc.
     *
     * @param  \Exception  $exception
     * @return void
     */
    public function report(Exception $exception)
    {
        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Exception  $exception
     * @return \Illuminate\Http\Response
     */
    public function render($request, Exception $e)
    {

        // AJAX space
        if($request->ajax()){

            // Model missing errors handler
            if($e instanceof ModelNotFoundException){
                return view('message.error', [
                    'errors' => 'The requested ' . $e->getModel() . ' has not been found',
                ]);
            }

            // Validation errors handler
            else if($e instanceof ValidationException){
                return view('message.error', [
                    'errors' => $e->validator->errors()->all(),
                ]);
            }

            // Unexpected errors handler
            else if($e instanceof Exception){
         
                 return parent::render($request, $e);
            }

        }
		return parent::render($request, $e);


    }
}
