<?php

namespace App\Business\Budget\Exception;

use Exception;

class BudgetNotFoundException extends Exception {
    public function __construct(){
        parent::__construct('Não foi encontrado um orçamento com esse ID');
    }
}