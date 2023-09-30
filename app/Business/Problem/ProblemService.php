<?php

namespace App\Business\Problem;

use App\Business\Business;
use Illuminate\Http\Request;

class ProblemService {
    use Business;

    public function getAvaliableProblems() {
        return $this->repository->getAvaliableProblems();
    }

    public function getById(string $problemId){
        return $this->repository->getById($problemId);
    }
}