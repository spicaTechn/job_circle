<?php

namespace App\Http\Controllers\Admin\Pages\Faq;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Pages\Page;
use App\Model\Pages\PageDetails;

class FaqController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $faqs   = Page::where('slug','faq')->first();
        if(!empty($faqs))
        {
            $faq = $faqs;
        }
        else
        {
            $faq = '';
        }

        return view('admin.pages.faq.faq')
                ->with(
                    array(
                        'site_title'          =>    'Job Circle',
                        'page_title'          =>    "FAQ's",
                        'faqs'                =>    $faq
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
        // storing service in pages table
        //echo "<pre>"; print_r($request->all()); echo "</pre>";exit;
        $faq = Page::where('slug','faq')->first();
        //echo "<pre>"; print_r($service->id); echo "</pre>";exit;
        if(!empty($faq))
        {
            $page_id = $faq->id;
            $slug    = $faq->slug;
        }
        else
        {
            $title           = 'Faq';
            $slug            = str_slug($title);
            $faq             = new Page();
            $faq->title      = $title;
            $faq->slug       = $slug; 
            $faq->save();

            $page_id          = $faq->id;
        }

        // storing service details in pageDetails table
        $faq_title       = $request->input('faq_title');
        $faq_description = $request->input('faq_description');


        $new_faq = array();
        $new_faq['title']        = $faq_title;
        $new_faq['description']  = $faq_description;

        $new_faq_serialize       = serialize($new_faq);
        $faq_details             = new PageDetails();
        $faq_details->page_id    = $page_id;
        $faq_details->meta_key   = $slug;
        $faq_details->meta_value = $new_faq_serialize;
        $faq_details->save();

        return response()->json(array('status'=>'success','result'=>'successfully added the faq information in the jobcircle '),200);
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
        $faq               = PageDetails::findOrFail($id);
        $page_id           = $faq->page_id;
        $unserialize_value = unserialize($faq->meta_value);
        //echo "<pre>";print_r($unserialize_value['title']); echo "</pre>";exit;
        if($unserialize_value)
        {
            return response()->json(array('status'=>'success','result'=>$unserialize_value,'faq_id'=>$id,'page_id'=>$page_id),200);
        }
        else
        {
            return response()->json(array('status'=>'error','message'=>'Faq cannot found'),200);
        }
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
        $faq               = PageDetails::findOrFail($id);
        $unserialize_value = unserialize($faq->meta_value);
        // getting input value
        $faq_title       = $request->input('faq_title');
        $faq_description = $request->input('faq_description');
        $page_id         =  $request->input('page_id');
        

        $unserialize_value['title']       = $faq_title;
        $unserialize_value['description'] = $faq_description;
        

        $new_serialize           = serialize($unserialize_value);
        $faq_details             = PageDetails::findOrFail($id);
        $faq_details->page_id    = $page_id;
        $faq_details->meta_key   = $faq->meta_key;
        $faq_details->meta_value = $new_serialize;
        $faq_details->save();

        return response()->json(array('status'=>'success','result'=>'successfully updated the faq information in the jobcircle '),200);
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
        //
        $this->faq      = PageDetails::findOrFail($id);
        //now delete the faq 
        if($this->faq->delete() > 0)
        {
            return response()->json(array('status'=>'success','message'=>'Faq has been deleted successfully!!'),200);
        }
        else
        {
            return response()->json(array('status'=>'error','message'=>'Faq cannot be deleted now please try again later on'),200);
        }
    }
}
