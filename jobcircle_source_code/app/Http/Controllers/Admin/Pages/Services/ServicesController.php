<?php

namespace App\Http\Controllers\Admin\Pages\Services;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Input,Session,Hash,Image,Validator,File,Auth;
use App\Model\Pages\Page;
use App\Model\Pages\PageDetails;

class ServicesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public $image_path='front/images/pages/services';
    public function index()
    {
        //
        $services   = Page::where('slug','service')->first();
        if(!empty($services))
        {
            $service = $services;
        }
        else
        {
            $service = '';
        }

        $service_top_section = Page::where('slug','services-top-section')->first();
        if(!empty($service_top_section)):
            $service_top_section_details        = $service_top_section->page_details()->first();
            $service_top_secton_page_details_id = $service_top_section_details->id;
            $service_background_image           = $service_top_section_details->meta_value;
            // echo "<pre>"; print_r($page_details_id);echo"</pre>";exit;
        else:
            $service_top_section                = new Page();
            $service_top_secton_page_details_id = '';
            $service_background_image           = '';
        endif;
        
        return view('admin.pages.services.services')
                ->with(
                    array(
                        'site_title'                          =>    'Job Circle',
                        'page_title'                          =>    "Services",
                        'service_top_secton_page_details_id'  =>    $service_top_secton_page_details_id,
                        'service_top_section'                 =>    $service_top_section,
                        'service_background_image'            =>    $service_background_image,
                        'services'                            =>    $service
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
        $service_top          = Page::where('slug','services-top-section')->first();
        if(!empty($service_top))
        {
            $page_id = $service_top->id;
            $slug    = $service_top->slug;
        }
        else
        {
            //storing service data to page table
            $title                = 'Services Top Section';
            $slug                 = str_slug($title);
            $service_description  = $request->input('service_description');
            $service              = new Page();
            $service->title       = $title;
            $service->slug        = $slug; 
            $service->description = $service_description;
            $service->save();
            $page_id              = $service->id;
        }

        if($request->hasFile('service_background_image')) {
            $service_background            = $request->file('service_background_image');
            $service_background_image_name = str_random(20).'.'.$service_background->getClientOriginalExtension();
            $destinationPath               = $this->image_path;
            $service_background->move($destinationPath, $service_background_image_name);
            $service_background_image      = $service_background_image_name;
        }
        else
        {
            $service_background_image = '';
        }

        $service_details_image             = new PageDetails();
        $service_details_image->page_id    = $page_id;
        $service_details_image->meta_key   = $slug;
        $service_details_image->meta_value = $service_background_image;
        $service_details_image->save();
       
        return response()->json(array('status'=>'success','result'=>'successfully added the company information in the jobcircle '),200);

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
        if($id)
        {
            $page_id              = $request->input('service_topsection_id');
            $page_detail_id       = $request->input('service_topsection_page_id');
            $service_description  = $request->input('service_description');

            // find service top section record by id and saving data to that id
            $service_top_section              = Page::find($page_id);
            $service_top_section->description = $service_description;
            $service_top_section->save();

            //find service top section details record by id and saving data to that id
            $service_top_section_details             = PageDetails::find($page_detail_id);
            //echo "<pre>"; print_r($service_top_section_details); echo "</pre>";exit;
           
            // checking if request has image if not than pass previous image value
            if($request->hasFile('service_background_image')) {
                $service_background            = $request->file('service_background_image');
                $service_background_image_name = str_random(20).'.'.$service_background->getClientOriginalExtension();
                $destinationPath               = $this->image_path;
                $service_background->move($destinationPath, $service_background_image_name);
                $service_background_image      = $service_background_image_name;

                // removing existing image
                $path=$this->image_path.'/'.$service_top_section_details->meta_value;
                File::delete($path);
            }
            else
            {
                $service_background_image = $service_top_section_details->meta_value;
            }

            $service_top_section_details->meta_value = $service_background_image;
            $service_top_section_details->save();


            return response()->json(array('status'=>'success','result'=>'successfully updated the company information in the jobcircle '),200);
        }
        
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
    public function serviceStore(Request $request)
    {   
        // storing service in pages table
        //echo "<pre>"; print_r($request->all()); echo "</pre>";exit;
        $service = Page::where('slug','service')->first();
        //echo "<pre>"; print_r($service->id); echo "</pre>";exit;
        if(!empty($service))
        {
            $page_id = $service->id;
            $slug    = $service->slug;
        }
        else
        {
            $title                = 'Service';
            $slug                 = str_slug($title);
            $services             = new Page();
            $services->title      = $title;
            $services->slug       = $slug; 
            $services->save();

            $page_id              = $services->id;
        }

        // storing service details in pageDetails table
        $services_title       = $request->input('services_title');
        $services_description = $request->input('services_description');

        // checking if request has image
        if($request->hasFile('services_icon')) 
        {
            $icon               = $request->file('services_icon');
            $icon_name          = str_random(20).'.'.$icon->getClientOriginalExtension();
            $destinationPath    = $this->image_path;
            $icon->move($destinationPath, $icon_name);
            $services_icon      = $icon_name;
        }
        else
        {
            $services_icon       = 'hello.jpg';
        }

        $new_services = array();
        $new_services['icon']         = $services_icon;
        $new_services['title']        = $services_title;
        $new_services['description']  = $services_description;

        $new_service_serialize       = serialize($new_services);
        $service_details             = new PageDetails();
        $service_details->page_id    = $page_id;
        $service_details->meta_key   = $slug;
        $service_details->meta_value = $new_service_serialize;
        $service_details->save();

        return response()->json(array('status'=>'success','result'=>'successfully added the service information in the jobcircle '),200);
        

    }

    public function serviceEdit($id)
    {
        $service           = PageDetails::findOrFail($id);
        $page_id           = $service->page_id;
        $unserialize_value = unserialize($service->meta_value);
        //echo "<pre>";print_r($unserialize_value['title']); echo "</pre>";exit;
        if($unserialize_value)
        {
            return response()->json(array('status'=>'success','result'=>$unserialize_value,'service_id'=>$id,'page_id'=>$page_id),200);
        }
        else
        {
            return response()->json(array('status'=>'error','message'=>'Service cannot found'),200);
        }
    }

    public function serviceUpdate(Request $request,$id)
    {

        $service           = PageDetails::findOrFail($id);
        $unserialize_value = unserialize($service->meta_value);
        // getting input value
        $service_title       = $request->input('services_title');
        $service_description = $request->input('services_description');
        $page_id             =  $request->input('services_page_id');
        // checking if request has image
        if($request->hasFile('services_icon')) 
        {
            $icon               = $request->file('services_icon');
            $icon_name          = str_random(20).'.'.$icon->getClientOriginalExtension();
            $destinationPath    = $this->image_path;
            $icon->move($destinationPath, $icon_name);
            $service_icon       = $icon_name;

            $path=$this->image_path.'/'.$unserialize_value['icon'];
            File::delete($path);
        }
        else
        {
            $service_icon       = $unserialize_value['icon'];
        }

        $unserialize_value['title']       = $service_title;
        $unserialize_value['description'] = $service_description;
        $unserialize_value['icon']        = $service_icon;

        $new_serialize               = serialize($unserialize_value);
        $service_details             = PageDetails::findOrFail($id);
        $service_details->page_id    = $page_id;
        $service_details->meta_key   = $service->meta_key;
        $service_details->meta_value = $new_serialize;
        $service_details->save();

        return response()->json(array('status'=>'success','result'=>'successfully added the service information in the jobcircle '),200);
        
        //echo "<pre>"; print_r($service); echo"</pre>";exit;
    }
    public function serviceDelete($id)
    {
        //
        $this->service    = PageDetails::findOrFail($id);
        $unserialize_value = unserialize($this->service->meta_value);
        //now delete the service 
        if($this->service->delete() > 0)
        {
            $path=$this->image_path.'/'.$unserialize_value['icon'];
            File::delete($path);
            return response()->json(array('status'=>'success','message'=>'Service has been deleted successfully!!'),200);
        }
        else
        {
            return response()->json(array('status'=>'error','message'=>'Service cannot be deleted now please try again later on'),200);
        }
        
    }

    
}
