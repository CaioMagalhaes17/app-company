<?php

namespace App\Business\Budget;

use App\Business\Budget\Exception\UpdateAcceptedBudgetException;
use App\Business\Business;
use App\Exceptions\CompanyPermissionException;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;

class BudgetService {

    use Business;

    public function create(Request $request){
        $data = $request->only('id_problem', 'value_budget');
        return $this->repository->create($data, Auth::user()->id);
    }

    public function update(Request $request){
        $data = $request->only('id_budget', 'value_budget');
        $this->hasPermission($data['id_budget']);
        $budget = $this->getById(423);
        if ($budget[0]->accepted_budget == 'F'){
            return $this->repository->update($data, Auth::user()->id);
        }
        throw new UpdateAcceptedBudgetException();
    }

    public function delete(Request $request){
        $request->only('id_budget');
        $this->hasPermission($request->id_budget);
        return $this->repository->delete($request->id_budget);
    }

    public function hasPermission(string $idBudget){
        $budget = $this->getById($idBudget);
        if ($budget[0]->fk_id_company == Auth::user()->id){
            return true;
        }
        throw new CompanyPermissionException();
    }
    
    public function getById(string $idBudget) : Collection {
        return $this->repository->getById($idBudget);
    }
}