<?php

namespace App\Exceptions;

use Exception;

class BattleMetricsException extends Exception
{
    protected $message = "Err: BMExcept Generic";

    public function render($request)
	{
	    return redirect()
	    			->back()
	    			->withInput($request->input())
	    			->withErrors(['message' => $this->message]);
	}
}
