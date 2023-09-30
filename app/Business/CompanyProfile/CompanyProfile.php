<?php

namespace App\Business\CompanyProfile;

use App\Business\Business;
use App\Http\Requests\CompanyProfile\CreateRequest;
use App\Http\Requests\CompanyProfile\UpdateRequest;
use App\Models\CompanyProfile as CompanyProfileModel;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;

class CompanyProfile {

    use Business;

    public function create(CreateRequest $request) : bool{
        if ($request->hasFile('imgProfile')){
            //logica de upload
        }
        $request->only('companyName', 'companyDocument', 'companyZipCode', 'companyState', 'companyCity', 'companyAddress', 'companyTel');
        return $this->repository->create($request, Auth::user()->id);
    }

    public function update(UpdateRequest $request, string $companyId) : bool{
        $request->only('companyName', 'companyDocument', 'companyZipCode', 'companyState', 'companyCity', 'companyAddress', 'companyTel');
        $data['name_company'] = $request->companyName;
        $data['document_company'] = $request->companyDocument;
        $data['zipcode_company'] = $request->companyZipCode;
        $data['state_company'] = $request->companyState;
        $data['city_company'] = $request->companyCity;
        $data['address_company'] = $request->companyAddress;
        $data['tel_company'] = $request->companyTel;

        foreach ($data as $key => $value){
            if (empty($value)){
                unset($data[$key]);
            }
        }
        
        return $this->repository->update($data, $companyId);
    }

    public function index() : CompanyProfileModel{
        return Auth::user()->companyProfile;
    }

    public function getById(string $companyId) : Collection {
        return $this->repository->getById($companyId);
    }

    public function delete(string $companyId) : bool {
        return $this->repository->delete($companyId);
    }
}