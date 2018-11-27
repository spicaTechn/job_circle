<?php

namespace App\Http\Controllers\Admin\JobType;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\JobType;

class JobTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.jobType.jobType')->with(
            array(
                'site_title'  => 'Job Circle',
                'page_title'  => 'Job Type'
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
         
         $title         = $request->input('job_type_title');
         $slug          = str_slug($title);
         $description   = $request->input('job_type_description');
         $status        = $request->input('job_type_status');
         $job_type              = new JobType();
         $job_type->title       = $title;
         $job_type->slug        = $slug;
         $job_type->description = $description;
         $job_type->status      = $status;
         //echo "<pre>"; print_r($job_type); echo "<pre>"; exit;
         $job_type->save();

         return response()->json(array('status'=>'success','result'=>'successfully added the job type  in the jobcircle '),200);
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
        //echo "<pre>"; print_r($id); echo "<pre>"; exit;

        $job_type           = JobType::findOrFail($id);
        //echo "<pre>"; print_r($job_type->status); echo "<pre>"; exit;
        if(!empty($job_type))
        {
            return response()->json(array('status'=>'success','result'=>$job_type),200);
        }
        else
        {
            return response()->json(array('status'=>'error','message'=>'Job Type  cannot found'),200);
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
       
        $job_type              = JobType::findOrFail($id);
        $job_type->title       = $request->input('job_type_title');
        $job_type->slug        = str_slug($request->input('job_type_title'));
        $job_type->description = $request->input('job_type_description');
        $job_type->status      = $request->input('job_type_status');

        $job_type->save();

         return response()->json(array('status'=>'success','result'=>'successfully updated the job type  in the jobcircle '),200);
        // echo "<pre>"; print_r($job_type);echo"</pre>";exit;
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
        $this->job_type    = JobType::findOrFail($id);

        //now delete the job_type 
        if($this->job_type->delete() > 0)
            return response()->json(array('status'=>'success','message'=>'Job Type has been deleted successfully!!'),200);
        else
            return response()->json(array('status'=>'error','message'=>'Job Type cannot be deleted now please try again later on'),200);
        
    }

    public function getJobType()
    {
        $job_types = JobType::orderBy('created_at','desc')->select('jobtypes.*');
        return Datatables($job_types)
                ->addColumn('title',function($job_type){
                    return $job_type->title;
                })
                ->addColumn('slug',function($job_type){
                    return $job_type->slug;
                })
                ->addColumn('description',function($job_type){
                    return $job_type->description;
                })
                ->addColumn('status',function($job_type){
                    if($job_type->status == '1'):
                    return 'active';
                    else:
                        return 'inactive';
                    endif;
                })
                ->addColumn('action',function($job_type){
                    $return_html = '<a href="javascript:void(0);" class="m-r-15 text-muted edit-job-type" 
                                      data-toggle="tooltip" 
                                      data-placement="top" 
                                      title="" 
                                      data-original-title="Edit"
                                      data-job-type-id="'.$job_type->id.'">
                                   <i class="icofont icofont-ui-edit" ></i>
                                   </a>
                                   <a href="javascript:void(0);" class="text-muted delete-job-type" 
                                      data-toggle="tooltip" 
                                      data-placement="top" title="" 
                                      data-original-title="Delete" 
                                      data-job-type-id="'.$job_type->id.'">
                                   <i class="icofont icofont-delete-alt"></i>
                                   </a>';
                return $return_html;
                })

                ->make(true);
    }
}
