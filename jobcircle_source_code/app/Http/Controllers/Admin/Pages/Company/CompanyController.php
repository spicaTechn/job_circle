<?php

namespace App\Http\Controllers\Admin\Pages\Company;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Input,Session,Hash,Image,Validator,File,Auth;
use App\Model\Pages\Page;
use App\Model\Pages\PageDetails;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    // image store path
    public $image_path='front/images/pages/company';

    public function index()
    {
        //getting company all data and showing in view
        $company = Page::where('slug','company')->first();
        //echo "<pre>"; print_r($company);echo"</pre>";exit;
        if(!empty($company)):
            $company_details = $company->page_details()->first();
            $page_details_id = $company_details->id;
            $unserialize_value = unserialize($company_details->meta_value);
            //echo "<pre>"; print_r($company_details);echo"</pre>";exit;
        else:
            $company                                 = new Page();
            $page_details_id                         = '';
            $unserialize_value['about_image']        = '';
            $unserialize_value['background']         = '';
            $unserialize_value['mission']            = '';
            $unserialize_value['founder_name']       = '';
            $unserialize_value['founder_position']   = '';
            $unserialize_value['founder_description']= '';
            $unserialize_value['founder_image']      = '';
            //echo "<pre>"; print_r($unserialize_value);echo"</pre>";exit;
        endif;
        
        return view('admin.pages.company.company')
                ->with(
                    array(
                        'site_title'             =>    'Job Circle',
                        'page_title'             =>    'Company',
                        'company'                =>    $company,
                        'meta_value_unserialize' =>    $unserialize_value,
                        'page_details_id'        =>    $page_details_id
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
       
        //storing about content to pages table
        $about_description   = $request->input('about_description');
        $background          = $request->input('background');
        $mission             = $request->input('mission');
        $founder_name        = $request->input('founder_name');
        $founder_position    = $request->input('founder_position');
        $founder_description = $request->input('founder_description');

        
        //echo "<pre>"; print_r($request->all());echo "</pre>";exit;

        $title                = 'Company';
        $slug                 = str_slug($title);
        $company              = new Page();
        $company->title       = $title;
        $company->slug        = $slug;
        $company->description = $about_description;
        $company->save();

        // storing about details content to pageDetails table

        // storing about image
        if($request->hasFile('about_image')) {
            $about            = $request->file('about_image');
            $about_image_name = str_random(20).'.'.$about->getClientOriginalExtension();
            $destinationPath  = $this->image_path;
            $about->move($destinationPath, $about_image_name);
            $about_image      = $about_image_name;
        }
        // storing founder image
        if($request->hasFile('founder_image')) {
            $founder            = $request->file('founder_image');
            $founder_image_name = str_random(20).'.'.$founder->getClientOriginalExtension();
            $destinationPath    = $this->image_path;
            $founder->move($destinationPath, $founder_image_name);
            $founder_image      = $founder_image_name;
        }

        $new_company = array();
        $new_company['about_image']         = $about_image;
        $new_company['background']          = $background;
        $new_company['mission']             = $mission;
        $new_company['founder_name']        = $founder_name;
        $new_company['founder_description'] = $founder_description;
        $new_company['founder_position']    = $founder_position;
        $new_company['founder_image']       = $founder_image;


        $new_company_serialize       = serialize($new_company);
        $company_details             = new PageDetails();
        $company_details->page_id    = $company->id;
        $company_details->meta_key   = $slug;
        $company_details->meta_value = $new_company_serialize;
        $company_details->save();


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
        //updating data if id is found
        if($id)
        {
            // form input data 
            $company_description = $request->input('about_description');
            $background          = $request->input('background');
            $mission             = $request->input('mission');
            $founder_name        = $request->input('founder_name');
            $founder_position    = $request->input('founder_position');
            $founder_description = $request->input('founder_description');
            $page_id             = $request->input('about_id');
            $page_detail_id     = $request->input('page_detail_id');

            // find company record by id and saving data to that id
            $company             = Page::find($page_id);
            $company->description= $company_description;
            $company->save();
            
            //find company details record by id and saving data to that id
            $company_details             = PageDetails::find($page_detail_id);
            $company_details_unserialize = unserialize($company_details->meta_value);
           
            // checking if request has image if not than pass previous image value
            if($request->hasFile('about_image')) {
                $about            = $request->file('about_image');
                $about_image_name = str_random(20).'.'.$about->getClientOriginalExtension();
                $destinationPath  = $this->image_path;
                $about->move($destinationPath, $about_image_name);
                $about_image      = $about_image_name;

                // removing existing image
                $path=$this->image_path.'/'.$company_details_unserialize['about_image'];
                File::delete($path);
            }
            else
            {
                $about_image      = $company_details_unserialize['about_image'];
            }
            // checking if request has image if not than pass previous image value
            if($request->hasFile('founder_image')) {
                $founder            = $request->file('founder_image');
                $founder_image_name = str_random(20).'.'.$founder->getClientOriginalExtension();
                $destinationPath    = $this->image_path;
                $founder->move($destinationPath, $founder_image_name);
                $founder_image      = $founder_image_name;

                // removing existing image
                $path=$this->image_path.'/'.$company_details_unserialize['founder_image'];
                File::delete($path);
            }
            else
            {
                $founder_image     = $company_details_unserialize['founder_image'];
            }

            // updating page details
            $company_details_unserialize['about_image']         = $about_image;
            $company_details_unserialize['background']          = $background;
            $company_details_unserialize['mission']             = $mission;
            $company_details_unserialize['founder_name']        = $founder_name;
            $company_details_unserialize['founder_description'] = $founder_description;
            $company_details_unserialize['founder_position']    = $founder_position;
            $company_details_unserialize['founder_image']       = $founder_image;

            

            $new_company_serialize       = serialize($company_details_unserialize);
            $company_details->meta_value = $new_company_serialize;
            $company_details->save();


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
}
