<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
use Illuminate\Http\Response;

class Handler extends ExceptionHandler
{
  public function render($request, Throwable $exception)
  {
    if ($exception instanceof NotFoundHttpException) {
      return response()->view('errors.404', [], Response::HTTP_NOT_FOUND);
    }

    return parent::render($request, $exception);
  }
}
