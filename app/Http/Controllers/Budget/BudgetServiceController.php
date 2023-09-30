<?php

namespace App\Http\Controllers\Budget;

use App\Business\Budget\Budget;
use App\Business\Budget\Exception\BudgetNotFoundException;
use App\Business\Budget\Exception\EmptyBudgetsException;
use App\Business\Budget\Exception\UpdateAcceptedBudgetException;
use App\Business\Problem\Exception\ProblemNotFoundException;
use App\Exceptions\CompanyPermissionException;
use App\Http\Controllers\Controller;
use App\Http\Resources\Budget\BudgetIndexResource;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response as ResponseHttpCode;
use Illuminate\Support\Facades\Response;

class BudgetServiceController extends Controller{

    public function create(Request $request) : JsonResponse {
        try {
            return Response::json(
                $this->business->create($request),
                ResponseHttpCode::HTTP_CREATED
            );
        } catch (ProblemNotFoundException $e){
            abort(ResponseHttpCode::HTTP_NOT_FOUND, $e->getMessage());
        }
    }

    public function update(Request $request, string $idBudget) : JsonResponse {
        try {
            return Response::json(
                $this->business->update($request, $idBudget),
                ResponseHttpCode::HTTP_OK
            );
        } catch(BudgetNotFoundException $e){ 
            abort(ResponseHttpCode::HTTP_NOT_FOUND, $e->getMessage());
        } catch (UpdateAcceptedBudgetException $e){
            abort(ResponseHttpCode::HTTP_CONFLICT, $e->getMessage());
        } catch (CompanyPermissionException $e){
            abort(ResponseHttpCode::HTTP_UNAUTHORIZED, $e->getMessage());
        }
    }

    public function delete(string $idBudget) : JsonResponse {
        try {
            return $this->business->delete($idBudget);
        } catch (CompanyPermissionException $e){
            abort(ResponseHttpCode::HTTP_UNAUTHORIZED, $e->getMessage());
        } catch(BudgetNotFoundException $e){ 
            abort(ResponseHttpCode::HTTP_NOT_FOUND, $e->getMessage());
        }
    }

    public function getById(string $idProblem) : JsonResponse{
        try {
            return Response::json(
                new BudgetIndexResource($this->business->getById($idProblem)),
                ResponseHttpCode::HTTP_OK
            );
        } catch(BudgetNotFoundException $e){ 
            abort(ResponseHttpCode::HTTP_NOT_FOUND, $e->getMessage());
        }
    }

    public function getAll() : JsonResponse{
        try {
            return Response::json(
                new BudgetIndexResource($this->business->getAll()),
                ResponseHttpCode::HTTP_OK
            );
        } catch(EmptyBudgetsException $e){ 
            abort(ResponseHttpCode::HTTP_NOT_FOUND, $e->getMessage());
        }
    }
}