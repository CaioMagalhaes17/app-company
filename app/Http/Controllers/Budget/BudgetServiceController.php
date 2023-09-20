<?php

namespace App\Http\Controllers\Budget;

use App\Business\Budget\Budget;
use App\Business\Budget\Exception\BudgetNotFoundException;
use App\Business\Budget\Exception\UpdateAcceptedBudgetException;
use App\Exceptions\CompanyPermissionException;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response as ResponseHttpCode;
use Illuminate\Support\Facades\Response;

class BudgetServiceController extends Controller{
    public function create(Request $request){
        return $this->business->create($request);
    }

    public function update(Request $request){
        try {
            return Response::json(
                $this->business->update($request),
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

    public function delete(Request $request){
        try {
            return $this->business->delete($request);
        } catch (CompanyPermissionException $e){
            abort(ResponseHttpCode::HTTP_UNAUTHORIZED, $e->getMessage());
        } catch(BudgetNotFoundException $e){ 
            abort(ResponseHttpCode::HTTP_NOT_FOUND, $e->getMessage());
        }
    }

    public function getById(string $idProblem){
        try {
            return Response::json(
                $this->business->getById($idProblem),
                ResponseHttpCode::HTTP_OK
            );
        } catch(BudgetNotFoundException $e){ 
            abort(ResponseHttpCode::HTTP_NOT_FOUND, $e->getMessage());
        }
    }
}