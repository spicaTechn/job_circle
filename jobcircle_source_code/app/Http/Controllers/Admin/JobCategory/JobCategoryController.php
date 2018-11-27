<?php

namespace App\Http\Controllers\Admin\JobCategory;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Input,Session,Hash,Image,Validator,File,Auth;
use App\Model\JobCategory;

class JobCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    // image store  path
    public $image_path='front/images/job-category';
    public function index()
    {
        return view('admin.jobCategory.jobCategory')->with(
            array(
                'site_title'  => 'Job Circle',
                'page_title'  => 'Job Category'
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
         $name          = $request->input('job_category_name');
         $slug          = str_slug($name);
         $description   = $request->input('job_category_description');
         $status        = $request->input('job_category_status');

         // storing about image
         if($request->hasFile('job_category_image')) {
            $image               = $request->file('job_category_image');
            $category_image_name = str_random(20).'.'.$image->getClientOriginalExtension();
            $destinationPath     = $this->image_path;
            $image->move($destinationPath, $category_image_name);
            $category_image      = $category_image_name;
         }
         else
         {
            $category_image      = 'job-category.png';
         }
         $job_category              = new JobCategory();
         $job_category->name        = $name;
         $job_category->slug        = $slug;
         $job_category->description = $description;
         $job_category->image_path  = $category_image;
         $job_category->status      = $status;
         //echo "<pre>"; print_r($job_category); echo "<pre>"; exit;
         $job_category->save();

         return response()->json(array('status'=>'success','result'=>'successfully added the job category  in the jobcircle '),200);
         //echo "<pre>"; print_r($request->all()); echo"</pre>";exit;
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
        $job_category           = JobCategory::findOrFail($id);
        //echo "<pre>"; print_r($job_category); echo "<pre>"; exit;
        if(!empty($job_category))
        {
            return response()->json(array('status'=>'success','result'=>$job_category),200);
        }
        else
        {
            return response()->json(array('status'=>'error','message'=>'Job Category  cannot found'),200);
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
        $job_category       = JobCategory::findOrFail($id);
        $job_category->name = $request->input('job_category_name');
        $job_category->slug = str_slug($request->input('job_category_name'));
        $job_category->description = $request->input('job_category_description');
        $job_category->status      = $request->input('job_category_status');

        if($request->hasFile('job_category_image')) {
            $image               = $request->file('job_category_image');
            $category_image_name = str_random(20).'.'.$image->getClientOriginalExtension();
            $destinationPath     = $this->image_path;
            $image->move($destinationPath, $category_image_name);
            $category_image      = $category_image_name;

            $path=$this->image_path.'/'.$job_category->image_path;
            File::delete($path);
         }
         else
         {
            $category_image      = $job_category->image_path;
         }

         $job_category->image_path = $category_image;
         //echo "<pre>"; print_r($job_category); echo"</pre>";exit;
         $job_category->save();
         return response()->json(array('status'=>'success','result'=>'successfully updated the job category  in the jobcircle '),200);
         
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //echo "<pre>"; print_r($id); echo "<pre>"; exit;
        $this->job_category    = JobCategory::findOrFail($id);

        //now delete the job_category 
        if($this->job_category->delete() > 0)
            return response()->json(array('status'=>'success','message'=>'Job Category has been deleted successfully!!'),200);
        else
             return response()->json(array('status'=>'error','message'=>'Job Category cannot be deleted now please try again later on'),200);
    }

    public function getJobCategory()
    {
        $job_categories = JobCategory::orderBy('created_at','desc')->select('jobcategories.*');
        return Datatables($job_categories)
                ->addColumn('image',function($job_category){
                    if($job_category->image_path != "")
                        return asset('/front/images/job-category/'.$job_category->image_path);
                    else
                        return asset('/front/images/job-category/job-category.png');
               })
                ->addColumn('name',function($job_category){
                    return $job_category->name;
                })
                ->addColumn('slug',function($job_category){
                    return $job_category->slug;
                })
                ->addColumn('description',function($job_category){
                    return $job_category->description;
                })
                ->addColumn('status',function($job_category){
                    if($job_category->status == '1'):
                    return 'active';
                    else:
                        return 'inactive';
                    endif;
                })
                ->addColumn('action',function($job_category){
                    $return_html = '<a href="javascript:void(0);" class="m-r-15 text-muted edit-job-category" 
                                      data-toggle="tooltip" 
                                      data-placement="top" 
                                      title="" 
                                      data-original-title="Edit"
                                      data-job-category-id="'.$job_category->id.'">
                                   <i class="icofont icofont-ui-edit" ></i>
                                   </a>
                                   <a href="javascript:void(0);" class="text-muted delete-job-category" 
                                      data-toggle="tooltip" 
                                      data-placement="top" title="" 
                                      data-original-title="Delete" 
                                      data-job-category-id="'.$job_category->id.'">
                                   <i class="icofont icofont-delete-alt"></i>
                                   </a>';
                return $return_html;
                })

                ->make(true);
    }
}
