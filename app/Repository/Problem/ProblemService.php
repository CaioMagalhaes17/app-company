<?php

namespace App\Repository\Problem;

use App\Business\Problem\Exception\EmptyAvaliableProblemsException;
use App\Business\Problem\Exception\ProblemNotFoundException;
use App\Models\Problem as ProblemModel;
use Illuminate\Support\Collection;

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

    public function getById(string $problemId) : Collection{
        $problem = $this->model->where('id_problem', $problemId)->get();
        if (!$problem->isEmpty()){
            return $problem;
        }
        throw new ProblemNotFoundException();
    }
}