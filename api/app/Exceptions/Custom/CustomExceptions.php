<?php

namespace App\Exceptions\Custom;

class CustomExceptions
{
    /**
    * Throw database exception.
    */
    static public function throwDataBaseError(\Exception $exception): void
    {
        (new \App\Models\Logs())->createLogFromException($exception);
        throw new \Exception(json_encode(['data' => ['database' => 'Błąd składni SQL']]), 406);
    }

    /**
    * Throw forbidden exception.
    */
    static public function throwForbiddenError(): void
    {
        throw new \Exception(json_encode(['data' => ['request' => 'forbidden']]), 403);
    }

}