<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class JobAddress extends Model
{
    protected $table = 'jobaddress';
    protected $fillable = ['job_id','address','street_1','street_2','city','country','postal_code'];

    public function job()
    {
        return $this->belongsTo('App\Model\Job');
    }
}

