<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    protected $table = 'jobs';

    public function job_user()
	{
	    return $this->hasMany('App\Model\JobUser');
	}
	public function job_address()
    {
        return $this->hasOne('App\Model\JobAddress');
    }
}
