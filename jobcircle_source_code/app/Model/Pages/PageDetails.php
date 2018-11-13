<?php

namespace App\Model\Pages;

use Illuminate\Database\Eloquent\Model;

class PageDetails extends Model
{
    //
    protected $table = 'pageDetails';

    public function page()
    {
        return  $this->belongsTo('App\Model\Pages\Page');
    }
}
