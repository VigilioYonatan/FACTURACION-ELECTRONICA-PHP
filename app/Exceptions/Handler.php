<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Symfony\Component\HttpFoundation\Exception\BadRequestException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * The list of the inputs that are never flashed to the session on validation exceptions.
     *
     * @var array<int, string>
     */
    protected $dontFlash = [
        'current_password',
        'password',
        'password_confirmation',
    ];

    /**
     * Register the exception handling callbacks for the application.
     */
    public function register(): void
    {
        $this->reportable(function (Throwable $e) {
            //
        });
    }

    public function render($request, Throwable $exception)
    {
        $message = $exception->getMessage();

        if ($exception instanceof BadRequestException) {
            // get body
            if (strpos($message, ":")) {
                $body = explode(":", $message);
                $message = $body[0];
                $body = (string) end($body);
                return response()->json(['success' => false, "message" => $message, "body" => $body], 400);
            }
            return response()->json(['success' => false, "message" => $message], 400);
        }
        if ($exception instanceof NotFoundHttpException) {
            return response()->json(['success' => false, "message" => $message], 404);

        }
        // return response()->json(["success" => false, "message" => $message], );
        // Default handling for other exceptions
        return parent::render($request, $exception);
    }
}