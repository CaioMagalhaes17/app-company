<?php

namespace App\Business\Budget;

use App\Business\Business;
use App\Repository\Budget\Budget as BudgetRepository;
use Illuminate\Support\Facades\Auth;

class Budget {
    public function hasPermission(string $idBudget){
        $budget = $this->getById($idBudget);
        if ($budget->fk_id_company == Auth::user()->id){
            return true;
        }
        throw new CompanyPermissionException('Você não tem permissão para executar essa ação.');
    }
    
    public function getById(string $idBudget){
        return (new BudgetRepository)->getById($idBudget);
    }
}