<?php

namespace App\Repository\Budget;

use Illuminate\Http\Request;

class BudgetService extends Budget{
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