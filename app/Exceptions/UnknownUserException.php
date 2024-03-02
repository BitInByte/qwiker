<?php

namespace App\Exceptions;

use Exception;
use Symfony\Component\HttpFoundation\Response;

class UnknownUserException extends Exception
{
    // public $status = Response::HTTP_NOT_FOUND;
    //
    // public $redirectTo = '/author';
    public function status() {
        return Response::HTTP_NOT_FOUND;
    }
}
