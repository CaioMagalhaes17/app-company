<?php

namespace App\Http\Controllers\Problem;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProblemServiceController extends Controller {

    public function getAvaliableProblems() {
        return $this->business->getAvaliableProblems();
    }
}