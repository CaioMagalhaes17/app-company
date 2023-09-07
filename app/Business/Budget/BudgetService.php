<?php

namespace App\Business\Budget;

use App\Business\Business;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BudgetService extends Budget {

    use Business;

    public function create(Request $request){
        $data = $request->only('id_problem', 'value_budget');
        return $this->repository->create($data, Auth::user()->id);
    }

    public function update(Request $request){
        $data = $request->only('id_budget', 'value_budget');
        $this->hasPermission($data['id_budget']);
        $budget = $this->getById($data['id_budget']);
        if ($budget->accepted_budget == 'F'){
            return $this->repository->update($data, Auth::user()->id);
        }
        throw new BudgetAcceptedException('Não é possível editar um Orçamento já escolhido pelo cliente.');
    }

    public function delete(Request $request){
        $request->only('id_budget');
        $this->hasPermission($request->id_budget);
        return $this->repository->delete($request->id_budget);
    }
}