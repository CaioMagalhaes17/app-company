<?php

namespace App\Exceptions;

use Exception;

class CompanyPermissionException extends Exception {
    public function __construct()
    {
        parent::__construct('Você não tem permissão para executar essa ação');
    }
}