<?php

namespace App\Repository\Budget;

use App\Models\Budget as BudgetModel;

class Budget {
    public BudgetModel $model;

    public function __construct(){
        $this->model = new BudgetModel();
    }

    public function getById(string $idBudget){ 
        return $this->model->findOrFail($idBudget);
    }
}