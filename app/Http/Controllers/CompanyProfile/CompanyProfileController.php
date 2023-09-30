<?php

namespace App\Http\Controllers\CompanyProfile;

use App\Http\Controllers\Controller;
use App\Http\Requests\CompanyProfile\CreateRequest;
use App\Http\Requests\CompanyProfile\UpdateRequest;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Response as ResponseHttpCode;
use Illuminate\Support\Facades\Response;
use Illuminate\Http\Request;

class CompanyProfileController extends Controller {
    
    public function create(CreateRequest $request){
        try {
            return Response::json (
                $this->business->create($request),
                ResponseHttpCode::HTTP_CREATED
            );
        } catch (EmptyAvaliableProblemsException $e) {
            abort(ResponseHttpCode::HTTP_NO_CONTENT, $e->getMessage());
        }
    }

    public function update(UpdateRequest $request, string $companyId){
        try {
            return Response::json (
                $this->business->update($request, $companyId),
                ResponseHttpCode::HTTP_OK
            );
        } catch (EmptyAvaliableProblemsException $e) {
            abort(ResponseHttpCode::HTTP_NO_CONTENT, $e->getMessage());
        }
    }

    public function index(){
        try {
            return Response::json (
                $this->business->index(),
                ResponseHttpCode::HTTP_OK
            );
        } catch (EmptyAvaliableProblemsException $e) {
            abort(ResponseHttpCode::HTTP_NO_CONTENT, $e->getMessage());
        }
    }

    public function getById(string $companyId){
        try {
            return Response::json (
                $this->business->getById($companyId),
                ResponseHttpCode::HTTP_OK
            );
        } catch (EmptyAvaliableProblemsException $e) {
            abort(ResponseHttpCode::HTTP_NO_CONTENT, $e->getMessage());
        }
    }

    public function delete(string $companyId){
        try {
            return Response::json (
                $this->business->delete($companyId),
                ResponseHttpCode::HTTP_OK
            );
        } catch (EmptyAvaliableProblemsException $e) {
            abort(ResponseHttpCode::HTTP_NO_CONTENT, $e->getMessage());
        }
    }
}