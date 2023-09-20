<?php

namespace App\Repository\Problem;

use App\Business\Problem\Exception\EmptyAvaliableProblemsException;
use App\Models\Problem as ProblemModel;

class ProblemService {

    private ProblemModel $model;

    public function __construct(){
        $this->model = new ProblemModel;
    }


    public function getAvaliableProblems(){
        $problems = $this->model->where('finished_problem', '=', 'F')->get();
        if (!$problems->isEmpty()){
            return $problems;
        }
        throw new EmptyAvaliableProblemsException();
    }
}