<?php

namespace App\Business\Problem\Exception;

use Exception;

class EmptyAvaliableProblemsException extends Exception {
    public function __construct(){
        parent::__construct('Não foi encontrado nenhum problema disponível');
    }
}