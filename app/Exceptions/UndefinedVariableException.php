<?php

namespace App\Exceptions;

use Exception;

class UndefinedVariableException extends Exception
{
    //
   /**
     * Report or log an exception.
     *
     * @return void
     */
    public function report()
    {
        \Log::debug('Undefined Variable');
    }
}
