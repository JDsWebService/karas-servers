<?php

namespace App\Exceptions;

use Exception;

class ServerException extends Exception
{
    protected $message = "Err: ServersException Generic";

    public function render($request)
    {
        return redirect()
            ->back()
            ->withInput($request->input())
            ->withErrors(['message' => $this->message]);
    }
}
