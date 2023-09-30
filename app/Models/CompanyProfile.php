<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CompanyProfile extends Model
{
    protected $fillable = ['name_company', 'document_company', 'zipcode_company', 'address_company', 'city_company', 'state_company', 'tel_company', 'fk_id_user']; 
    protected $primaryKey = 'id_company';
    protected $table = 'company_profiles';
}