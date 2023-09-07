<?php

namespace App\Http\Controllers\Budget;

use App\Business\Budget\Budget;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BudgetServiceController extends Controller{
    public function create(Request $request){
        return $this->business->create($request);
    }

    public function update(Request $request){
        return $this->business->update($request);
    }

    public function delete(Request $request){
        return $this->business->delete($request);
    }

    public function getById(Request $request){
        return (new Budget)->getById($request);
    }
}