<?php

namespace App\Model\Pages;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    //
    protected $table = 'pages';

    public function page_details()
    {
        return $this->hasMany('App\Model\Pages\PageDetails');
    }

}
