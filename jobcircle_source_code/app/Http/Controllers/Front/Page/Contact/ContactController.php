<?php

namespace App\Http\Controllers\Front\Page\Contact;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Pages\Page;
use App\Model\Pages\PageDetails;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contact_details = PageDetails::where('meta_key','contact-us')->first();
        // checkif contact  is empty or not if empty then set null value
        if(!empty($contact_details)):
            $contact_unserialize = unserialize($contact_details->meta_value);
        else:
            $contact_unserialize = new PageDetails();
            $contact_unserialize = '';
        endif;
        return view('front.page.contact.contact')
                    ->with(
                        array(
                            'site_title'          =>    'Job Circle',
                            'page_title'          =>    'Contact',
                            'contact'             =>    $contact_unserialize,
                        )
                    );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
