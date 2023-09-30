<?php

namespace App\Business\Budget;

use App\Business\Budget\Exception\UpdateAcceptedBudgetException;
use App\Business\Business;
use App\Business\Problem\ProblemService;
use App\Exceptions\CompanyPermissionException;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;

class BudgetService {

    use Business;

    public function create(Request $request) : bool{
        $data = $request->only('id_problem', 'value_budget');
        if ((new ProblemService)->getById($data['id_problem'])){
            return $this->repository->create($data, Auth::user()->id);
        }
    }

    public function update(Request $request, string $idBudget) : bool{
        $data = $request->only('value_budget');
        $this->hasPermission($idBudget);
        $budget = $this->getById($idBudget);
        if ($budget[0]->accepted_budget == 'F'){
            return $this->repository->update($data, $idBudget);
        }
        throw new UpdateAcceptedBudgetException();
    }

    public function delete(string $idBudget) : bool{
        $this->hasPermission($idBudget);
        return $this->repository->delete($idBudget);
    }

    public function hasPermission(string $idBudget) : bool{
        $budget = $this->getById($idBudget);
        if ($budget[0]->fk_id_company == Auth::user()->id){
            return true;
        }
        throw new CompanyPermissionException();
    }
    
    public function getById(string $idBudget) : Collection {
        return $this->repository->getById($idBudget);
    }

    public function getAll() : Collection {
        return $this->repository->getAll(Auth::user()->id);
    }
}