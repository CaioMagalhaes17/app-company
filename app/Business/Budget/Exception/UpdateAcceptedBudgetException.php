<?php

namespace App\Business\Budget\Exception;

use Exception;

class UpdateAcceptedBudgetException extends Exception {
    public function __construct(){
        parent::__construct('Não é possível editar um Orçamento já escolhido pelo cliente!');
    }
}