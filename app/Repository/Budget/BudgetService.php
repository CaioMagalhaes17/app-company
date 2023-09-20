<?php

namespace App\Repository\Budget;

use App\Business\Budget\Exception\BudgetNotFoundException;
use Illuminate\Http\Request;
use App\Models\Budget as BudgetModel;

class BudgetService {

    public BudgetModel $model;

    public function __construct(){
        $this->model = new BudgetModel();
    }

    public function getById(string $idBudget){ 

        $problem = $this->model->where('id_budget', $idBudget)->get();
        if (!$problem->isEmpty()){
            return $problem;
        }
        throw new BudgetNotFoundException();
    }
    public function create(array $data, string $idUser){
        $this->model->fk_id_problem = $data['id_problem'];
        $this->model->value_budget = $data['value_budget'];
        $this->model->fk_id_company = $idUser;
        $this->model->accepted_budget = 'F';
        $this->model->save();
    }

    public function update(array $data){
        return $this->model->where('id_budget', $data['id_budget'])->update($data);
    }

    public function delete(string $idBudget){
        return $this->model->where('id_budget', $idBudget)->delete();
    }
}