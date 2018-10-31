<?php

namespace App\Http\Controllers\Admin\Pages\Contact;

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
        //getting all contact information from db and showing in view
        $contact_details = PageDetails::where('meta_key','contact-us')->first();

        // checkif contact  is empty or not if empty then set null value
        if(!empty($contact_details)):
            $contact_id          = $contact_details->id;
            $contact_page_id     = $contact_details->page_id;
            $contact_unserialize = unserialize($contact_details->meta_value);
        else:
            $contact_id                            = '';
            $contact_page_id                       = '';
            $contact_unserialize['address']        = '';
            $contact_unserialize['phone']          = '';
            $contact_unserialize['email']          = '';
            $contact_unserialize['facebook_link']  = '';
            $contact_unserialize['twitter_link']   = '';
        endif;

        //echo "<pre>"; print_r($contact_details); echo "</pre>";exit;
        return view('admin.pages.contact.contact')
                ->with(
                    array(
                        'site_title'          =>    'Job Circle',
                        'page_title'          =>    'Contact',
                        'contact_info'        =>    $contact_unserialize,
                        'contact_id'          =>    $contact_id,
                        'contact_page_id'     =>    $contact_page_id
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
        // storing contact  information to page table
        $title           = 'Contact US';
        $slug            = str_slug($title);

        $address         = $request->input('address');
        $phone           = $request->input('phone');
        $email           = $request->input('email');
        $facebook_link   = $request->input('facebook_link');
        $twitter_link    = $request->input('twitter_link');

        $contact         = new Page();
        $contact->title  = $title;
        $contact->slug   = $slug;
        $contact->save();

        // serializing and saving contact information to pageDetails table
        $new_contact = array();
        $new_contact['address']          = $address;
        $new_contact['phone']            = $phone;
        $new_contact['email']            = $email;
        $new_contact['facebook_link']    = $facebook_link;
        $new_contact['twitter_link']     = $twitter_link;


        $new_contact_serialize       = serialize($new_contact);
        $contact_details             = new PageDetails();
        $contact_details->page_id    = $contact->id;
        $contact_details->meta_key   = $slug;
        $contact_details->meta_value = $new_contact_serialize;
        $contact_details->save();


        return response()->json(array('status'=>'success','result'=>'successfully updated the contact information in the jobcircle '),200);

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
        //updating contact information
        if($id)
        {
            $page_id             = $request->input('contact_page_id');
            $contact_details     = PageDetails::find($id);
            $contact_unserialize = unserialize($contact_details->meta_value);
            $meta_key            = $contact_details->meta_key;

            $contact_unserialize['address']       = $request->input('address');
            $contact_unserialize['phone']         = $request->input('phone');
            $contact_unserialize['email']         = $request->input('email');
            $contact_unserialize['facebook_link'] = $request->input('facebook_link');
            $contact_unserialize['twitter_link']  = $request->input('twitter_link');

            //echo "<pre>"; print_r($meta_key); echo "</pre>";exit;

            $new_contact_serialize       = serialize($contact_unserialize);
            $contact_details_data             = PageDetails::find($id);
            $contact_details_data->page_id    = $page_id;
            $contact_details_data->meta_key   = $meta_key;
            $contact_details_data->meta_value = $new_contact_serialize;
            $contact_details_data->save();


            return response()->json(array('status'=>'success','result'=>'successfully updated the contact information in the jobcircle '),200);
        }
        //echo "<pre>"; print_r($contact_unserialize); echo "</pre>";exit;
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
