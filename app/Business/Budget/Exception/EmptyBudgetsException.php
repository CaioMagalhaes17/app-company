<?php

namespace App\Business\Budget\Exception;

use Exception;

class EmptyBudgetsException extends Exception {
    public function __construct(){
        parent::__construct('Não foi encontrado nenhum orçamento');
    }
}