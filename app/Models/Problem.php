<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Problem extends Model
{ 
    protected $primaryKey = 'id_problem';
    protected $table = 'problem_registered';
    protected $timeStamps = false;
}