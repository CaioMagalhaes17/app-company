<?php

namespace App\Http\Controllers\Problem;

use App\Business\Problem\Exception\EmptyAvaliableProblemsException;
use App\Http\Controllers\Controller;
use App\Http\Resources\Problem\ProblemIndexResource;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response as ResponseHttpCode;
use Illuminate\Support\Facades\Response;
use Illuminate\Http\Request;

class ProblemServiceController extends Controller {

    public function getAvaliableProblems() : JsonResponse{
        try {
            return Response::json (
                new ProblemIndexResource($this->business->getAvaliableProblems()),
                ResponseHttpCode::HTTP_OK
            );
        } catch (EmptyAvaliableProblemsException $e) {
            abort(ResponseHttpCode::HTTP_NO_CONTENT, $e->getMessage());
        } catch (EmptyAvaliableProblemsException $e) {
            abort(ResponseHttpCode::HTTP_NO_CONTENT, $e->getMessage());
        }
    }
}