<?php

namespace App\Repository\CompanyProfile;

use App\Http\Requests\CompanyProfile\CreateRequest;
use App\Models\CompanyProfile as CompanyProfileModel;
use Illuminate\Support\Collection;

class CompanyProfile {

    public CompanyProfileModel $model;

    public function __construct(){
        $this->model = new CompanyProfileModel();
    }

    public function create(CreateRequest $data, string $userId) : bool{
        $this->model->name_company = $data->companyName;
        $this->model->document_company = $data->companyDocument;
        $this->model->zipcode_company = $data->companyZipCode;
        $this->model->address_company = $data->companyAddress;
        $this->model->city_company = $data->companyCity; 
        $this->model->state_company = $data->companyState;
        $this->model->tel_company = $data->companyTel;
        $this->model->fk_id_user = $userId;

        return $this->model->save();
    }

    public function update(array $data, string $companyId) : bool{
        return $this->model->where('id_company', $companyId)->update($data);
    }

    public function getById(string $companyId) : Collection{
        return $this->model->where('id_company', $companyId)->get();
    }

    public function delete(string $companyId) : bool{
        return $this->model->where('id_company', $companyId)->delete();
    }
}