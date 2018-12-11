<?php

namespace App\Http\Controllers\Front\Employer;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\JobType;
use App\Model\JobCategory;
use App\Model\Job;
use App\Model\JobAddress;
use App\Model\JobUser;
use Session;
use Illuminate\Support\Facades\Input;

class EmployerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    /*when employer route is call*/
    public function dashboard()
    {
        $job     = Job::all();
        $all_jobs;
        if(!empty($job->count()>0))
        {
            $all_jobs = $job;
        }
        else
        {
            $all_jobs = new Job();
            $all_jobs = '';
        }
       
        //echo "<pre>"; print_r($job_user); echo "</pre>"; exit;
        return view('front.employer.dashboard')
                    ->with(
                        array(
                            'site_title'      =>    'Job Circle',
                            'page_title'      =>    'Employer',
                            'jobs'            =>    $all_jobs,
                           
                        )
                    );
    }

    public function createJob(Request $request)
    {
        $job_types       = JobType::all();
        if(!empty($job_types)):
            $job_type = $job_types;
        else:
            $job_type = '';
        endif;
        $job_categories   = JobCategory::all();
        if(!empty($job_categories)):
            $job_category = $job_categories;
        else:
            $job_category = '';
        endif;

        return view('front.employer.create-job')
                    ->with(
                        array(
                            'site_title'      =>    'Job Circle',
                            'page_title'      =>    'Create Job',
                            'job_types'       =>    $job_type,
                            'job_categories'  =>    $job_category
                        )
                    );
    }
    public function index()
    {
        $job_types       = JobType::all();
        if(!empty($job_types)):
            $job_type = $job_types;
        else:
            $job_type = '';
        endif;
        $job_categories   = JobCategory::all();
        if(!empty($job_categories)):
            $job_category = $job_categories;
        else:
            $job_category = '';
        endif;

        return view('front.employer.employer')
                    ->with(
                        array(
                            'site_title'      =>    'Job Circle',
                            'page_title'      =>    'Employer',
                            'job_types'       =>    $job_type,
                            'job_categories'  =>    $job_category
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

    // while adding job these are the steps as form structure
    public function step1(Request $request) 
    {
        // echo"<pre>"; print_r($request->all()); echo "</pre>"; exit;
        $form1Data  = $request->all();
        Session::put('step1', $form1Data);
        $input = Input::get('next-1');
        if (isset($input))
        {
         //echo "next-1";
         return redirect()->route('employer.create-job.step2');

        }
        
     
    }
    public function step2(Request $request) 
    {
        $form2Data = $request->all();
        Session::put('step2', $form2Data);
        $input = Input::get('next-3');
        if (isset($input))
        {
         //echo "next-1";
         return redirect()->route('employer.create-job.step3');
         
        }
    }
    public function step3(Request $request) 
    {
        $form3Data = $request->all();
        Session::put('step3', $form3Data);
        $input = Input::get('next-4');
        if (isset($input))
        {
         //echo "next-1";
         return redirect()->route('employer.create-job.step4');
         
        }
    }
    public function store(Request $request)
    {
        //echo "<pre>"; print_r($request->all()); echo "</pre>";exit;
        $form4Data = $request->all();
        Session::put('step4', $form4Data);


        $form1Data_session = Session::get('step1');
        $form2Data_session = Session::get('step2');
        $form3Data_session = Session::get('step3');
        //echo "<pre>"; print_r($form3Data_session); echo "</pre>";exit;
        $form4Data_session = Session::get('step4');

        //print_r($form1Data_session['job_title']);
        
        $job                  = new Job();
        // form1 input
        $job->title           = $form1Data_session['job_title'];
        $job->job_type_id     = $form1Data_session['job_type'];
        $job->job_category_id = $form1Data_session['job_category'];
        $job->salary          = $form1Data_session['salary'];
        
        $job->salary_type     = $form1Data_session['salary_type'];/*0=per_hour, 1=per_week, 2=per_month, 3=per_year*/
        $job->no_of_vacancies = $form1Data_session['no_of_staff'];
        // form2 input
        $job->total_children        = $form2Data_session['total_no_of_children'];
        $job->total_male_children   = $form2Data_session['total_male_children'];
        $job->total_female_children = $form2Data_session['total_female_children'];
        $job->total_adults          = $form2Data_session['total_no_of_adults'];

        // form3 input
       
        $new_weekdays = array();

        /*Sunday=1, Monday=2, Tuesday=3, Wednesday=4, Thursday=5, Friday=6, Saturday=7*/
        if(!empty($form3Data_session['1']))
        {
           
            $new_weekdays['1'] = "Sunday";
        }
        if(!empty($form3Data_session['2']))
        {
           
            $new_weekdays['2'] = "Monday";
        }
        if(!empty($form3Data_session['3']))
        {
            
             $new_weekdays['3'] = "Tuesday";
        }
        if(!empty($form3Data_session['4']))
        {
            
             $new_weekdays['4'] = "Wednesday";
        }
        if(!empty($form3Data_session['5']))
        {
             
             $new_weekdays['5'] = "Thursday";
        }
        if(!empty($form3Data_session['6']))
        {
            
             $new_weekdays['6'] = "Friday";
        }
        if(!empty($form3Data_session['7']))
        {
            
             $new_weekdays['7'] = "Saturday";
        }
       
        $serialize_weekdays = serialize($new_weekdays);
        
        $job->total_working_days_in_week = count($new_weekdays);
        $job->weekdays                   = $serialize_weekdays;
        $job->start_time                 = $form3Data_session['start_time'];
        $job->end_time                   = $form3Data_session['end_time'];
        $job->work_start_date            = $form3Data_session['work_start_day'];
        // form4input
        $job->description                = $form4Data_session['job_description'];
        $job->no_of_year_of_experience   = $form4Data_session['job_experience'];
        $job->language_preferences       = $form4Data_session['language_preferences'];
        $job->interview_time             = $form4Data_session['interview_start_time'];
        $job->interview_date             = $form4Data_session['interview_date'];
        $job->excerpt = $form1Data_session['job_title'];
        $job->user_id = 1;
        //echo "<pre>"; print_r($job); echo "</pre>"; exit;
        $job->save();

        $jobAddress = new JobAddress();

        $jobAddress->job_id = $job->id;
        $jobAddress->address= $form1Data_session['location'];
        $jobAddress->country= $form1Data_session['country'];
        $jobAddress->save();

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
        $job          = Job::findOrFail($id);
        $job_category = JobCategory::findOrFail($job->job_category_id);
        $job_type     = JobType::findOrFail($job->job_type_id);
        $job_location = JobAddress::where('job_id',$id)->first();//$id is job id
        $view         = view("front.employer.job-detail",compact('job','job_category','job_type','job_location'))->render();

        return response()->json(array('status'=>'success','html'=>$view),200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //echo "<pre>"; print_r($id); echo "</pre>";exit;
        $job          = Job::findOrFail($id);
        $job_category = JobCategory::findOrFail($job->job_category_id);//finding single job category base on job id passed
        $job_type     = JobType::findOrFail($job->job_type_id);//finding single job type base on job id passed
        $job_location = JobAddress::where('job_id',$id)->first();//$id is job id

        $jobCategory   = JobCategory::all();//getting all job categories
        $jobType       = JobType::all();//getting all job type
        //echo "<pre>"; print_r($job); echo "</pre>";exit;
        return view('front.employer.job-edit')
                    ->with(
                        array(
                            'site_title'      =>    'Job Circle',
                            'page_title'      =>    'Edit Job',
                            'job'             =>    $job,
                            'job_category'    =>    $job_category,
                            'job_type'        =>    $job_type,
                            'job_location'    =>    $job_location,
                            'job_categories'  =>    $jobCategory,
                            'job_types'       =>    $jobType
                            
                        )
                    );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    // while adding job these are the steps as form structure
    public function update1(Request $request) 
    {
        // echo"<pre>"; print_r($request->all()); echo "</pre>"; exit;
        $form1Data  = $request->all();
        Session::put('update1', $form1Data);
        $input = Input::get('next-1');
        if (isset($input))
        {
         //echo "next-1";
         return redirect()->route('employer.job.update.update2');

        }
        
     
    }
    public function update2(Request $request) 
    {
        $form2Data = $request->all();
        Session::put('update2', $form2Data);
        $input = Input::get('next-3');
        if (isset($input))
        {
         //echo "next-1";
         return redirect()->route('employer.job.update.update3');
         
        }
    }
    public function update3(Request $request) 
    {
        $form3Data = $request->all();
        Session::put('update3', $form3Data);
        $input = Input::get('next-4');
        if (isset($input))
        {
         //echo "next-1";
         return redirect()->route('employer.job.update.update4');
         
        }
    }
    public function update(Request $request, $id)
    {
        $form4Data = $request->all();
        Session::put('update4', $form4Data);

        $form1Data_session = Session::get('update1');
        $form2Data_session = Session::get('update2');
        $form3Data_session = Session::get('update3');
        //echo "<pre>"; print_r($form3Data_session); echo "</pre>";exit;
        $form4Data_session = Session::get('update4');



        $job                  = Job::findOrFail($id);
        // form1 input
        $job->title           = $form1Data_session['job_title'];
        $job->job_type_id     = $form1Data_session['job_type'];
        $job->job_category_id = $form1Data_session['job_category'];
        $job->salary          = $form1Data_session['salary'];
        
        $job->salary_type     = $form1Data_session['salary_type'];/*0=per_hour, 1=per_week, 2=per_month, 3=per_year*/
        $job->no_of_vacancies = $form1Data_session['no_of_staff'];
        // form2 input
        $job->total_children        = $form2Data_session['total_no_of_children'];
        $job->total_male_children   = $form2Data_session['total_male_children'];
        $job->total_female_children = $form2Data_session['total_female_children'];
        $job->total_adults          = $form2Data_session['total_no_of_adults'];

        // form3 input
        
        $new_weekdays = array();

        /*Sunday=1, Monday=2, Tuesday=3, Wednesday=4, Thursday=5, Friday=6, Saturday=7*/
        if(!empty($form3Data_session['1']))
        {
           
            $new_weekdays['1'] = "Sunday";
        }
        if(!empty($form3Data_session['2']))
        {
           
            $new_weekdays['2'] = "Monday";
        }
        if(!empty($form3Data_session['3']))
        {
            
             $new_weekdays['3'] = "Tuesday";
        }
        if(!empty($form3Data_session['4']))
        {
            
             $new_weekdays['4'] = "Wednesday";
        }
        if(!empty($form3Data_session['5']))
        {
             
             $new_weekdays['5'] = "Thursday";
        }
        if(!empty($form3Data_session['6']))
        {
            
             $new_weekdays['6'] = "Friday";
        }
        if(!empty($form3Data_session['7']))
        {
            
             $new_weekdays['7'] = "Saturday";
        }
        //echo "<pre>"; print_r(count($new_weekdays)); echo "</pre>"; exit;
        $serialize_weekdays = serialize($new_weekdays);

        $job->total_working_days_in_week = count($new_weekdays);
        
        $job->weekdays                   = $serialize_weekdays;
        $job->start_time                 = $form3Data_session['start_time'];
        $job->end_time                   = $form3Data_session['end_time'];
        $job->work_start_date            = $form3Data_session['work_start_day'];
        // form4input
        $job->description                = $form4Data_session['job_description'];
        $job->no_of_year_of_experience   = $form4Data_session['job_experience'];
        $job->language_preferences       = $form4Data_session['language_preferences'];
        $job->interview_time             = $form4Data_session['interview_start_time'];
        $job->interview_date             = $form4Data_session['interview_date'];
        $job->excerpt = $form1Data_session['job_title'];
        $job->user_id = 1;
        //echo "<pre>"; print_r($job); echo "</pre>"; exit;
        $job->save();

        $jobAddress = new JobAddress();

        $jobAddress->job_id = $job->id;
        $jobAddress->address= $form1Data_session['location'];
        $jobAddress->country= $form1Data_session['country'];
        $jobAddress->save();

        return response()->json(array('status'=>'success','result'=>'successfully added the job   in the jobcircle '),200);
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
