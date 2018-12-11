 <div class="Dashboard-edit-wrap register-wrapper">
                       
                <div class="form-register" id="step-1">
                <h4>Job Details</h4>
                <form role="form" name="job-form1" id="job-form1">
                    @csrf
                    <div class="form-group">
                        <label>Job Category</label>
                        <select name="job_category" class="form-control job_category" disabled="disabled">
                            <option>{{ $job_category->name }}</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Job Title</label>
                        <input type="text" name="job_title" class="form-control job_title" placeholder="e.g Nanny" value="{{ $job->title }}" disabled="disabled">
                    </div>
                    <div class="form-group">
                        <label>Location: City or Post Code</label>
                        <input type="text" name="location" class="form-control location" placeholder="e.g Birmaingham" disabled="disabled" value="{{ $job_location->address }}">
                    </div>
                    <div class="form-group">
                        <label>Country Selection</label>
                        <!-- <input type="text" class="form-control" placeholder="United Kingdom"> -->
                        <select class="selectpicker countrypicker" name="country" data-live-search="true" disabled="disabled" >
                            <option>{{ $job_location->country }}</option>
                        </select>
                       <!--  <select class="form-control bfh-countries country" name="country" data-country="US"></select> -->
                    </div>
                    <div class="form-group">
                        <label>Job Type</label>
                        <div class="inline-form">
                            
                            <div class="form-group form-check">
                                <input type="checkbox" value="" name="job_type" class="form-check-input job_type" id="job-type1" value="{{ $job_type->title }}" disabled="disabled" checked="checked">
                                <label class="form-check-label" for="job-type1">{{ $job_type->title }}</label>
                            </div>
                           
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Salary Expectation</label>
                                <input type="text" name="salary" class="form-control salary" placeholder="$10" disabled="disabled" value="${{ $job->salary }}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="hidden" >Salary Expectation</label>
                                <select class="form-control salary_type" name="salary_type" disabled="disabled">
                                    @if($job->salary_type==0)
                                    <option value="0">per hour</option>
                                    @elseif($job->salary_type==1)
                                    <option value="1">per week</option>
                                    @elseif($job->salary_type==2)
                                    <option value="2">per month</option>
                                    @else
                                    <option value="3">per year</option>
                                    @endif
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>How many staffs want to hire?</label>
                        <input type="number" name="no_of_staff" class="form-control no_of_staff" disabled="disabled" value="{{ $job->no_of_vacancies }}" placeholder="2,   5">
                    </div>
                
               <!--  <div class="form-group flex-buttons">
                    <span class="btn btn-default" id="next-1">Next</span>
                </div> -->
                
                <h4>Children Information</h4>
            
                <div class="form-group">
                    <label>1) Total number of children</label>
                    <input type="number" name="total_children" class="form-control total_children" placeholder="" disabled="disabled" value="{{ $job->total_children }}">
                </div>
                
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Total male children  </label>
                            <input type="number" name="total_male_children" class="form-control total_male_children" placeholder="" disabled="disabled" value="{{ $job->total_male_children }}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Total female children  </label>
                            <input type="number" name="total_female_children" class="form-control total_female_children" placeholder="" disabled="disabled" value="{{ $job->total_female_children }}">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label>2) Total number of adults</label>
                    <input type="number" class="form-control total_adults" name="total_adults" placeholder="" disabled="disabled" value="{{ $job->total_adults }}">
                </div>
                
                
                <h4>Work Information</h4>
                <div class="form-group">
                    <label>1) Total working days</label>
                    <input type="number" name="total_workings_day" class="form-control total_workings_day" placeholder="e.g. 5,   6 " disabled="disabled" value="{{ $job->total_working_days_in_week }}">
                </div>
                 <!-- /*Sunday=1, Monday=2, Tuesday=3, Wednesday=4, Thursday=5, Friday=6, Saturday=7*/ -->
                <div class="inline-form">
                    <?php $unserialize = unserialize($job->weekdays); ?>
                    <?php //echo "<pre>"; print_r($unserialize['1']); echo "</pre>";exit; ?>
                    @if(!empty($unserialize['1']))
                    <div class="form-group form-check">
                        <input type="checkbox" name="1" class="form-check-input" id="day1" checked="checked" disabled="disabled">
                        <label class="form-check-label" for="day1">SUN</label>
                    </div>
                    @endif
                    @if(!empty($unserialize['2']))
                    <div class="form-group form-check">
                        <input type="checkbox" name="2" class="form-check-input" id="day2" disabled="disabled" checked="checked">
                        <label class="form-check-label" for="day2">MON</label>
                    </div>
                    @endif
                    @if(!empty($unserialize['3']))
                    <div class="form-group form-check">
                        <input type="checkbox" name="3" class="form-check-input" id="day3" disabled="disabled" checked="checked">
                        <label class="form-check-label" for="day3">TUE</label>
                    </div>
                    @endif
                    @if(!empty($unserialize['4']))
                    <div class="form-group form-check">
                        <input type="checkbox" name="4" class="form-check-input" id="day4" disabled="disabled" checked="checked">
                        <label class="form-check-label" for="day4">WED</label>
                    </div>
                    @endif
                    @if(!empty($unserialize['5']))
                    <div class="form-group form-check">
                        <input type="checkbox" name="5" class="form-check-input" id="day5" disabled="disabled" checked="checked">
                        <label class="form-check-label" for="day5">THU</label>
                    </div>
                    @endif
                    @if(!empty($unserialize['6']))
                    <div class="form-group form-check">
                        <input type="checkbox" name="6" class="form-check-input" id="day6" disabled="disabled" checked="checked">
                        <label class="form-check-label" for="day6">FRI</label>
                    </div>
                    @endif
                    @if(!empty($unserialize['7']))
                    <div class="form-group form-check">
                        <input type="checkbox" name="7" class="form-check-input" id="day7" disabled="disabled" checked="checked">
                        <label class="form-check-label" for="day7">SAT</label>
                    </div>
                    @endif
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Start Time</label>
                            <input type="text" name="start_time" class="form-control start_time" placeholder="12:00 PM" disabled="disabled" value="{{ $job->start_time }}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>End Time</label>
                            
                            <input type="text" name="end_time" class="form-control end_time" placeholder="4:00 PM" disabled="disabled" value="{{ $job->end_time }}">
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label>2) Work Start Day</label>
                    <!-- <input type="text" class="form-control" placeholder="01-11-2018"> -->
                    <input type="text" name="work_start_day" class="form-control work_start_day" placeholder="e. g.  09/02/2019" disabled="disabled" value="{{ $job->work_start_date }}">
                </div>
                
                
               <h4>Job Description</h4>
                <div class="form-group">
                    <label>Describe  about job (Roles and Responsibility)</label>
                    <textarea class="form-control job_description" name="job_description" disabled="disabled" style="min-height: 100px;">{{ $job->description }}</textarea>
                </div>
                <div class="form-group">
                    <label>Job Experience</label>
                    <input type="text" name="job_experience" class="form-control job_experience" placeholder="Job Experience" disabled="disabled" value="{{ $job->no_of_year_of_experience }} {{ 'years' }}">
                    
                </div>
                <div class="form-group">
                    <label>Language Preferences</label>
                    <input type="text" name="language_preferences" class="form-control language_preferences" placeholder="e. g English" disabled="disabled" value="{{ $job->language_preferences }}">
                </div>
                <div class="form-group">
                    <label>Best date and time to interview (morning, evening, etc.):</label>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <!-- <label>Start Time</label> -->
                                <input type="text" id="text-calendar" name="interview_date" class="form-control interview_date" placeholder="Interview Date"  disabled="disabled" value="{{ $job->interview_date }}" />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <!-- <label>End Time</label> -->
                              <input type="text" name="interview_start_time" class="form-control interview_start_time" placeholder="12:00 PM" disabled="disabled" value="{{ $job->interview_time }}">

                            </div>
                        </div>
                    </div>
                </div>
                
                </form>
            </div>
            <!-- end step 5 -->
       
    </div>