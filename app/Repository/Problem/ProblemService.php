<?php

namespace App\Repository\Problem;

use App\Models\Problem as ProblemModel;

class ProblemService {

    private ProblemModel $model;

    public function __construct(){
        $this->model = new ProblemModel;
    }
    public function getAvaliableProblems(){
        return $this->model->where('finished_problem', '=', 'F')->get();
    }
}