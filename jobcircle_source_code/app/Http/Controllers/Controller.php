<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Model\Pages\PageDetails;
use App\Model\Pages\Page;
use View;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

  	public function __construct()
	{
	    $contact = Page::where('slug','contact')->first();
        // checkif contact  is empty or not if empty then set null value
        if(!empty($contact)):
            $contact_details     = $contact->page_details()->where('meta_key','contact')->first();
            $contact_unserialize = unserialize($contact_details->meta_value);
        else:
            $contact_unserialize = '';
        endif;
	    View::share('contact', $contact_unserialize);
	 }
}
