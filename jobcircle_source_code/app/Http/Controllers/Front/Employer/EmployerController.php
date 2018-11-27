<?php

namespace App\Http\Controllers\Front\Employer;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\JobType;
use App\Model\JobCategory;
use App\Model\Job;
use App\Model\JobAddress;
use Session;
use Illuminate\Support\Facades\Input;

class EmployerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
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
    public function jobStep1(Request $request) 
    {
        // echo"<pre>"; print_r($request->all()); echo "</pre>"; exit;
        $form1Data  = $request->all();
        Session::put('jobStep1', $form1Data);
        $input = Input::get('next-1');
        if (isset($input))
        {
         //echo "next-1";
         return redirect()->route('employer.jobStep2');

        }
        
     
    }
    public function jobStep2(Request $request) 
    {
        $form2Data = $request->all();
        Session::put('jobStep2', $form2Data);
        $input = Input::get('next-3');
        if (isset($input))
        {
         //echo "next-1";
         return redirect()->route('employer.jobStep3');
         
        }
    }
    public function jobStep3(Request $request) 
    {
        $form3Data = $request->all();
        Session::put('jobStep3', $form3Data);
        $input = Input::get('next-4');
        if (isset($input))
        {
         //echo "next-1";
         return redirect()->route('employer.jobStep4');
         
        }
    }
    public function store(Request $request)
    {

        $form4Data = $request->all();
        Session::put('jobStep4', $form4Data);


        $form1Data_session = Session::get('jobStep1');
        $form2Data_session = Session::get('jobStep2');
        $form3Data_session = Session::get('jobStep3');
        //echo "<pre>"; print_r($form3Data_session); echo "</pre>";exit;
        $form4Data_session = Session::get('jobStep4');

        //print_r($form1Data_session['job_title']);
        
        $job                  = new Job();
        // form1 input
        $job->title           = $form1Data_session['job_title'];
        $job->job_type_id     = $form1Data_session['job_type'];
        $job->job_category_id = $form1Data_session['job_category'];
        $job->salary          = $form1Data_session['salary'];
        // $salary_type          = '';
        // switch ($form1Data_session['salary_type'])
        // {
        //     case 0:
        //     $salary_type = 'Per Hour';
        //     break;
        //     case 1:
        //     $salary_type = 'Per Week';
        //     break;
        //     case 2:
        //     $salary_type = 'Per Month';
        //     break;
        //     case 3:
        //     $salary_type = 'Per year';
        //     break;
        //     default:
        //     $salary_type = 'Per Hour';
        // }
        $job->salary_type     = $form1Data_session['salary_type'];
        $job->no_of_vacancies = $form1Data_session['no_of_staff'];
        // form2 input
        $job->total_children        = $form2Data_session['total_no_of_children'];
        $job->total_male_children   = $form2Data_session['total_male_children'];
        $job->total_female_children = $form2Data_session['total_female_children'];
        $job->total_adults          = $form2Data_session['total_no_of_adults'];

        // form3 input
        $job->total_working_days_in_week = $form3Data_session['total_workings_day'];
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
        //echo "<pre>"; print_r($new_weekdays); echo "</pre>"; exit;
        $serialize_weekdays = serialize($new_weekdays);
        
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
}
