<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    //
    protected $guarded = ['id'];

    public function occupation() {
        return $this->belongsTo('App\Models\Occupation');
    }

    public function empTypes() {
        return $this->belongsToMany('App\Models\EmploymentType', 'job_employment_type');
    }

    public function features() {
        return $this->belongsToMany('App\Models\Feature', 'job_feature');
    }

    public function company() {
        return $this->belongsTo('App\Models\Job');
    }

}
