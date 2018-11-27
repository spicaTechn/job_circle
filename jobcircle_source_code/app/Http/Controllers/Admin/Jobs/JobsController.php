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
        //echo "<pre>"; print_r($request->all()); echo "</pre>"; exit;
        $title                      = $request->input('job_title');
        $description                = $request->input('job_description');
        $excerpt                    = $request->input('job_excerpt');
        $job_type_id                = $request->input('job_type_id');
        $job_category_id            = $request->input('job_category_id');
        $salary_type                = $request->input('salary_type');
        $salary                     = $request->input('salary');
        $no_of_vacancies            = $request->input('no_of_vacancies');
        $total_children             = $request->input('total_children');
        $total_male_children        = $request->input('total_male_children');
        $total_female_children      = $request->input('total_female_children');
        $total_adults               = $request->input('total_adults');
        $total_working_days_in_week = $request->input('total_working_days_in_week');
        $week_days                  = $request->input('week_days');
        $start_time                 = $request->input('start_time');
        $end_time                   = $request->input('end_time');
        $job_display_type           = $request->input('job_display_type');
        $work_start_date            = $request->input('work_start_date');
        $job_publish_date           = $request->input('job_publish_date');
        $job_expiry_date            = $request->input('job_expiry_date');
        $no_of_year_of_experience   = $request->input('no_of_year_of_experience');
        $language_preferences       = $request->input('language_preferences');
        $interview_date             = $request->input('interview_date');
        $interview_time             = $request->input('interview_time');
        $status                     = $request->input('status');
        $shortlisted_status         = $request->input('shortlisted_status');

        $job                    = new Job();
        $job->title             = $title;
        $job->description       = $description;
        $job->excerpt           = $excerpt;
        $job->job_type_id       = $job_type_id;
        $job->job_category_id   = $job_category_id;
        $job->salary_type       = $salary_type;
        $job->salary            = $salary;
        $job->no_of_vacancies   = $no_of_vacancies;
        $job->total_children    = $total_children;
        $job->total_male_children   = $total_male_children;
        $job->total_female_children = $total_female_children;
        $job->total_adults          = $total_adults;
        $job->total_working_days_in_week = $total_working_days_in_week;
        $job->weekdays                   = $week_days;
        $job->start_time                 = $start_time;
        $job->end_time                   = $end_time;
        $job->job_display_type           = $job_display_type;
        $job->work_start_date            = $work_start_date;
        $job->job_publish_date           = $job_publish_date;
        $job->job_expiry_date            = $job_expiry_date;
        $job->no_of_year_of_experience   = $no_of_year_of_experience;
        $job->language_preferences       = $language_preferences;
        $job->interview_date             = $interview_date;
        $job->interview_time             = $interview_time;
        $job->status                     = $status;
        $job->shortlisted_status         = $shortlisted_status;

        $job->user_id = 1;
        $job->save();
        return response()->json(array('status'=>'success','result'=>'successfully added the job   in the jobcircle '),200);
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
        $job   = Job::findOrFail($id);
         // echo "<pre>"; print_r($job); echo "</pre>"; exit;
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

    public function getJobs()
    {
        $jobs = Job::orderBy('created_at','desc')->select('jobs.*');
        //echo "<pre>"; print_r($jobs); echo "</pre>"; exit;
        return Datatables($jobs)
                ->addColumn('title',function($job){
                    return $job->title;
                })
                
                ->addColumn('salary_type',function($job){
                    return $job->salary_type;
                })
                ->addColumn('salary',function($job){
                    return $job->salary;
                })
                ->addColumn('no_of_vacancies',function($job){
                    return $job->no_of_vacancies;
                })
                
                ->addColumn('total_working_days_in_week',function($job){
                    return $job->total_working_days_in_week;
                })
                ->addColumn('weekdays',function($job){
                    $serialize =$job->weekdays;
                    $unserialize = unserialize($serialize);
                    $week_days   = implode(",", $unserialize);  
                    return $week_days;
                    
                })
                ->addColumn('start_time',function($job){
                    return $job->start_time;
                })
                ->addColumn('end_time',function($job){
                    return $job->end_time;
                })
                ->addColumn('job_display_type',function($job){
                    return $job->job_display_type;
                })
                ->addColumn('work_start_date',function($job){
                    return $job->work_start_date;
                })
                ->addColumn('job_publish_date',function($job){
                    return $job->job_publish_date;
                })
                ->addColumn('job_expiry_date',function($job){
                    return $job->job_expiry_date;
                })
                ->addColumn('no_of_year_of_experience',function($job){
                    return $job->no_of_year_of_experience;
                })
                ->addColumn('language_preferences',function($job){
                    return $job->language_preferences;
                })
                ->addColumn('interview_date',function($job){
                    return $job->interview_date;
                })
                ->addColumn('interview_time',function($job){
                    return $job->interview_time;
                })
                ->addColumn('status',function($job){
                    return $job->status;
                })
                ->addColumn('shortlisted_status',function($job){
                    return $job->shortlisted_status;
                })
                ->addColumn('action',function($job){
                    $return_html = '<a href="javascript:void(0);" class="m-r-15 text-muted edit-job" 
                                      data-toggle="tooltip" 
                                      data-placement="top" 
                                      title="" 
                                      data-original-title="Edit"
                                      data-job-id="'.$job->id.'">
                                   <i class="icofont icofont-ui-edit" ></i>
                                   </a>
                                   <a href="javascript:void(0);" class="text-muted delete-job" 
                                      data-toggle="tooltip" 
                                      data-placement="top" title="" 
                                      data-original-title="Delete" 
                                      data-job-id="'.$job->id.'">
                                   <i class="icofont icofont-delete-alt"></i>
                                   </a>';
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

            $result .= '<option value="'.$job_type->id.'">'.$job_type->id.'</option>';
        }
        return response()->json(array('status'=>'success','result'=>$result),200);
    }
    public function getJobCategory()
    {
        $job_categories  = JobCategory::all();
        $result = '';
        foreach($job_categories as $job_category)
        {
            $result .= '<option value="'.$job_category->id.'">'.$job_category->id.'</option>';
        }
        return response()->json(array('status'=>'success','result'=>$result),200);
    }
}
