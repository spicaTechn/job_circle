<?php

namespace App\Http\Controllers\Admin\Pages\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Input,Session,Hash,Image,Validator,File,Auth;
use App\Model\Pages\Page;
use App\Model\Pages\PageDetails;


class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public $image_path='front/images/pages/home';

    public function index()
    {
        //
        $sliders   = Page::where('slug','home-slider')->first();
        if(!empty($sliders))
        {
            $slider = $sliders;
        }
        else
        {
            $slider = '';
        }

        $testimonials   = Page::where('slug','home-testimonial')->first();
        if(!empty($testimonials))
        {
            $testimonial = $testimonials;
        }
        else
        {
            $testimonial = '';
        }
        return view('admin.pages.home.home')
                ->with(
                    array(
                        'site_title'     =>    'Job Circle',
                        'page_title'     =>    "Home",
                        'sliders'        =>    $slider,
                        'testimonials'   =>    $testimonial
                        
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

    public function sliderStore(Request $request)
    {   
        // storing service in pages table
        //echo "<pre>"; print_r($request->all()); echo "</pre>";exit;
        $home = Page::where('slug','home-slider')->first();
        //echo "<pre>"; print_r($service->id); echo "</pre>";exit;
        if(!empty($home))
        {
            $page_id = $home->id;
            $slug    = $home->slug;
        }
        else
        {
            $title            = 'Home Slider';
            $slug             = str_slug($title);
            $home             = new Page();
            $home->title      = $title;
            $home->slug       = $slug; 
            $home->save();

            $page_id          = $home->id;
        }

        // storing service details in pageDetails table
        $slider_title       = $request->input('slider_title');
        $slider_description = $request->input('slider_description');

        // checking if request has image
        if($request->hasFile('slider_image')) 
        {
            $icon               = $request->file('slider_image');
            $icon_name          = str_random(20).'.'.$icon->getClientOriginalExtension();
            $destinationPath    = $this->image_path;
            $icon->move($destinationPath, $icon_name);
            $slider_image       = $icon_name;
        }
        else
        {
            $slider_image       = 'hello.jpg';
        }

        $new_slider = array();
        $new_slider['image']        = $slider_image;
        $new_slider['title']        = $slider_title;
        $new_slider['description']  = $slider_description;

        $new_slider_serialize       = serialize($new_slider);
        $slider_details             = new PageDetails();
        $slider_details->page_id    = $page_id;
        $slider_details->meta_key   = 'home-slider';
        $slider_details->meta_value = $new_slider_serialize;
        $slider_details->save();

        return response()->json(array('status'=>'success','result'=>'successfully added the slider information in the jobcircle '),200);
    
    }

    public function sliderEdit($id)
    {
        $slider            = PageDetails::findOrFail($id);
        $page_id           = $slider->page_id;
        $unserialize_value = unserialize($slider->meta_value);
        //echo "<pre>";print_r($unserialize_value['title']); echo "</pre>";exit;
        if($unserialize_value)
        {
            return response()->json(array('status'=>'success','result'=>$unserialize_value,'slider_id'=>$id,'page_id'=>$page_id),200);
        }
        else
        {
            return response()->json(array('status'=>'error','message'=>'Service cannot found'),200);
        }
    }

    public function sliderUpdate(Request $request,$id)
    {

        $slider            = PageDetails::findOrFail($id);
        $unserialize_value = unserialize($slider->meta_value);
        // getting input value
        $slider_title       = $request->input('slider_title');
        $slider_description = $request->input('slider_description');
        $page_id            =  $request->input('page_id');
        // checking if request has image
        if($request->hasFile('slider_image')) 
        {
            $icon               = $request->file('slider_image');
            $icon_name          = str_random(20).'.'.$icon->getClientOriginalExtension();
            $destinationPath    = $this->image_path;
            $icon->move($destinationPath, $icon_name);
            $slider_image       = $icon_name;

            $path=$this->image_path.'/'.$unserialize_value['image'];
            File::delete($path);
        }
        else
        {
            $slider_image       = $unserialize_value['image'];
        }

        $unserialize_value['title']       = $slider_title;
        $unserialize_value['description'] = $slider_description;
        $unserialize_value['image']       = $slider_image;

        $new_serialize              = serialize($unserialize_value);
        $slider_details             = PageDetails::findOrFail($id);
        $slider_details->page_id    = $page_id;
        $slider_details->meta_key   = $slider->meta_key;
        $slider_details->meta_value = $new_serialize;
        $slider_details->save();

        return response()->json(array('status'=>'success','result'=>'successfully updated the slider information in the jobcircle '),200);
        
        //echo "<pre>"; print_r($service); echo"</pre>";exit;
    }

    public function sliderDelete($id)
    {
        //
        $this->slider      = PageDetails::findOrFail($id);
        $unserialize_value = unserialize($this->slider->meta_value);
        //now delete the slider 
        if($this->slider->delete() > 0)
        {
            $path=$this->image_path.'/'.$unserialize_value['image'];
            File::delete($path);
            return response()->json(array('status'=>'success','message'=>'Slider has been deleted successfully!!'),200);
        }
        else
        {
            return response()->json(array('status'=>'error','message'=>'Slider cannot be deleted now please try again later on'),200);
        }
        
    }

}
