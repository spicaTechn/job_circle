<?php

namespace App\Http\Controllers\Admin\Jobs;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Job;
use App\Model\JobType;
use App\Model\JobCategory;



class JobsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      
        return view('admin.jobs.jobs')->with(
            array(
                'site_title'  => 'Job Circle',
                'page_title'  => 'Jobs'
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
        $job   = Job::findOrFail($id);
        //echo "<pre>"; print_r($job); echo "</pre>"; exit;
        if(!empty($job))
        {
            return response()->json(array('status'=>'success','result'=>$job),200);
        }
        else
        {
            return response()->json(array('status'=>'error','message'=>'Job   cannot found'),200);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $job   = Job::findOrFail($id);
        //echo "<pre>"; print_r($job); echo "</pre>"; exit;
        if(!empty($job))
        {
            return response()->json(array('status'=>'success','job'=>$job),200);
        }
        else
        {
            return response()->json(array('status'=>'error','message'=>'Job   cannot found'),200);
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
        //echo "<pre>"; print_r($request->all()); echo "</pre>"; exit;
        $job                     = Job::findOrFail($id);
        $job->job_display_type   = $request->input('job_display_type');
        $job->work_start_date    = $request->input('work_start_date');
        $job->job_publish_date   = $request->input('job_publish_date');
        $job->job_expiry_date    = $request->input('job_expiry_date');
        $job->status             = $request->input('status');
        $job->shortlisted_status = $request->input('shortlisted_status');
        $job->save();
       
        return response()->json(array('status'=>'success','message'=>'Job  has been updated successfully!!'),200);
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
        $job    = Job::findOrFail($id);
        $job->status = '4';
        $job->save();

        
        return response()->json(array('status'=>'success','message'=>'Job  has been deleted successfully!!'),200);
        
    }

    public function getJobs()
    {
        $jobs = Job::orderBy('created_at','desc')->select('jobs.*');
        //echo "<pre>"; print_r($jobs); echo "</pre>"; exit;
        return Datatables($jobs)
                ->addColumn('title',function($job){
                    return $job->title;
                })
                
                ->addColumn('no_of_application',function($job){
                    return $job->job_user()->count();
                })
                
                ->addColumn('job_publish_date',function($job){
                    return $job->job_publish_date;
                })
                ->addColumn('job_expiry_date',function($job){
                    return $job->job_expiry_date;
                })
                ->addColumn('work_start_date',function($job){
                    return $job->work_start_date;
                })
                ->addColumn('job_display_type', function($job){
                    if($job->job_display_type==0):
                        return "Hot Job";
                    endif;
                    if($job->job_display_type==1):
                        return "Featured Job";
                    endif;
                })
                
                
                ->addColumn('status',function($job){
                    if($job->status==0):
                        return "Pending";
                    elseif($job->status==1):
                        return "Approved";
                    elseif($job->status==2):
                        return "Hold";
                    elseif($job->status==3):
                        return "Expired";
                    else:
                        return "Deleted";
                    endif;
                })
                ->addColumn('shortlisted_status',function($job){
                    if($job->shortlisted_status==0):
                        return "Closed";
                    else:
                        return "Open";
                    endif;
                })
                ->addColumn('action',function($job){
                    $return_html = 
                            '<div class="dropdown-primary dropdown open">
                                <button class="btn btn-light dropdown-toggle" type="button" data-toggle="dropdown"><i class="icofont icofont-brand-flikr text-muted"></i>
                                </button>

                                <div class="dropdown-menu" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">
                                    <a class="dropdown-item waves-light waves-effect job-details" data-job-id="'.$job->id.'">View Details</a>
                                    <div class="dropdown-divider"></div>

                                    <a class="dropdown-item waves-light waves-effect job-edit"  data-job-id="'.$job->id.'">Edit</a>
                                    <div class="dropdown-divider"></div>

                                    <a class="dropdown-item waves-light waves-effect job-delete"  data-job-id="'.$job->id.'">Delete</a>
                                    
                                </div>

                            </div>';
                return $return_html;
                })

                ->make(true);
    }

    public function getJobType()
    {
        $job_types  = JobType::all();
        $result = '';
        foreach($job_types as $job_type)
        {

            $result .= '<option value="'.$job_type->id.'">'.$job_type->title.'</option>';
        }
        return response()->json(array('status'=>'success','result'=>$result),200);
    }
    public function getJobCategory()
    {
        $job_categories  = JobCategory::all();
        $result = '';
        foreach($job_categories as $job_category)
        {
            $result .= '<option value="'.$job_category->id.'">'.$job_category->name.'</option>';
        }
        return response()->json(array('status'=>'success','result'=>$result),200);
    }
}
