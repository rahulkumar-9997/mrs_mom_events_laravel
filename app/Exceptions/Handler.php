<?php

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Throwable;
use Illuminate\Support\Facades\Log;

class Handler extends ExceptionHandler 
{
    
	
    public function render($request, Throwable $exception)
    {
        Log::info('error page log display: ' . $exception->getMessage() . ' | URL: ' . $request->fullUrl());
        if ($this->isHttpException($exception)) {
            if ($exception->getStatusCode() == 404) {
                return response()->view('errors.404', [], 404);
            }
            if ($exception->getStatusCode() == 505) {
                return response()->view('errors.505', [], 505);
            }
        }
    
        return parent::render($request, $exception);
    }

        
}