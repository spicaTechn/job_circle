<?php

namespace App\Http\Controllers\Front\Page\Services;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Pages\Page;
use App\Model\Pages\PageDetails;

class ServicesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        

        $services   = Page::where('slug','service')->first();
        $service_top_section = '';
        if(!empty($services))
        {
            $service = $services;
            $service_top_section = $service->page_details()->where('meta_key','services-top-image')->first();
            if(!empty($service_top_section)):
                $service_top_section_details        = $service_top_section;
                $service_background_image           = $service_top_section_details->meta_value;
            else:
                $service_top_section                = new Page();
                $service_background_image           = '';
            endif;
        }
        else
        {
            $service = '';

            $service_top_section                = '';
            $service_background_image           = '';
        }
        return view('front.page.services.services')
                    ->with(
                        array(
                            'site_title'                =>    'Job Circle',
                            'page_title'                =>    'Services',
                            'service_top_section'       =>    $service_top_section,
                            'service_background_image'  =>    $service_background_image,
                            'services'                  =>    $service
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
        $service             = PageDetails::findOrFail($id);
        $service_unserialize = unserialize($service->meta_value);

        $service_top_section = Page::where('slug','services-top-section')->first();
        if(!empty($service_top_section)):
            $service_top_section_details        = $service_top_section->page_details()->first();
            $service_background_image           = $service_top_section_details->meta_value;
        else:
            $service_background_image           = '';
        endif;

        return view('front.page.single-page.single-service')
               ->with
               (
                array
                (
                    'site_title'  =>    'Job Circle',
                    'page_title'  =>    $service_unserialize['title'],
                    'service'     =>    $service_unserialize,
                    'service_background_image'  =>    $service_background_image,
                            
                )
               );
        //echo "<pre>"; print_r($service_unserialize);echo"</pre>";exit;
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
