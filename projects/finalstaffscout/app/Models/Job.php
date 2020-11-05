<?php

namespace App\models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    protected $primaryKey = 'jobs_id';


    public function contract_types()
    {

        return $this->belongsTo('App\models\ContractType');

    }

     public function experiences()
    {

        return $this->belongsTo('App\models\Experience');

    }

     public function education_levels()
    {

        return $this->belongsTo('App\models\EducationLevel');

    }
}
