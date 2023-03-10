<?php

namespace App\Exceptions;
use Throwable;

use Illuminate\Http\Response;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Validation\ValidationException;

class Handler extends ExceptionHandler
{
    /**
     * A list of the exception types that should not be reported.
     *
     * @var array
     */
    protected $dontReport = [
        \Illuminate\Auth\AuthenticationException::class,
        \Illuminate\Auth\Access\AuthorizationException::class,
        \Symfony\Component\HttpKernel\Exception\HttpException::class,
        \Illuminate\Database\Eloquent\ModelNotFoundException::class,
        \Illuminate\Session\TokenMismatchException::class,
        \Illuminate\Validation\ValidationException::class,
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
     * @param  \Throwable  $exception
     * @return void
     *
     * @throws \Throwable
     */
    public function report(Throwable $exception)
    {
        parent::report($exception);
    }

    /**
     * Render an exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Throwable  $exception
     * @return \Symfony\Component\HttpFoundation\Response
     *
     * @throws \Throwable
     */
    public function render($request, Throwable $exception)
    {

        if (strpos($request->url(), '/api/') !== false) {
            // Log::debug('API Request Exception - '.$request->url().' - '.$exception->getMessage().(! empty($request->all()) ? ' - '.json_encode($request->except(['password'])) : ''));

            if ($exception instanceof AuthorizationException) {
                return $this->setStatusCode(Response::HTTP_FORBIDDEN)->respondWithError($exception->getMessage());
            }

            if ($exception instanceof MethodNotAllowedHttpException) {
                return $this->setStatusCode(Response::HTTP_METHOD_NOT_ALLOWED)->respondWithError('Please check HTTP Request Method. - MethodNotAllowedHttpException');
            }

            if ($exception instanceof NotFoundHttpException) {
                return $this->setStatusCode(Response::HTTP_NOT_FOUND)->respondWithError('Please check your URL to make sure request is formatted properly. - NotFoundHttpException');
            }

            if ($exception instanceof GeneralException) {
                return $this->setStatusCode(Response::HTTP_INTERNAL_SERVER_ERROR)->respondWithError($exception->getMessage());
            }

            if ($exception instanceof ModelNotFoundException) {
                return $this->setStatusCode(Response::HTTP_NOT_FOUND)->respondWithError('Item could not be found. Please check identifier.');
            }

            if ($exception instanceof AuthenticationException) {
                return $this->setStatusCode(Response::HTTP_UNAUTHORIZED)->respondWithError('Unauthenticated.');
            }

            if ($exception instanceof ValidationException) {
                Log::debug('API Validation Exception - '.json_encode($exception->validator->messages()));

                return $this->setStatusCode(422)->respondWithError($exception->validator->messages());
            }

            /*
            * Redirect if token mismatch error
            * Usually because user stayed on the same screen too long and their session expired
            */
            if ($exception instanceof UnauthorizedHttpException) {
                switch (get_class($exception->getPrevious())) {
                    case self::class:
                        return $this->setStatusCode($exception->getStatusCode())->respondWithError('Token has not been provided.');
                }
            }
        }
        return parent::render($request, $exception);
    }

    /**
     * get the status code.
     *
     * @return statuscode
     */
    public function getStatusCode()
    {
        return $this->statusCode;
    }

    /**
     * set the status code.
     *
     * @param [type] $statusCode [description]
     *
     * @return statuscode
     */
    public function setStatusCode($statusCode)
    {
        $this->statusCode = $statusCode;

        return $this;
    }

    /**
     * respond with error.
     *
     * @param $message
     *
     * @return \Illuminate\Http\JsonResponse
     */
    protected function respondWithError($message)
    {
        return $this->respond([
            'error' => [
                'message' => $message,
                'status_code' => $this->getStatusCode(),
            ],
        ]);
    }

    /**
     * Respond.
     *
     * @param array $data
     * @param array $headers
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function respond($data, $headers = [])
    {
        return response()->json($data, $this->getStatusCode(), $headers);
    }
    
    // protected function unauthenticated($request, AuthenticationException $exception)
    // {
    //     if ($request->expectsJson()) {
    //         return response()->json(['error' => 'Unauthenticated.'], 401);
    //     }

    //     return redirect()->guest(route('auth.login'));
    // }
}
