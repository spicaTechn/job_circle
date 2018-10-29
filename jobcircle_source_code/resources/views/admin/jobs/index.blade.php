@extends('front.layout.master')

@section('content')
<div class="custumer-dashboard">
    <div class="container">
        <div class="row">
            @include('admin.dashboard-menu.menuitems')
            <!-- customer-dashboard-sidebar -->
            <div class="col-md-9">
                <div class="customer-dashboard-body">
                    <div class="job-list-search">
                        <div class="row">
                            <div class="col-md-6 col-lg-6">
                                <h4>Post a Job</h4>
                                <div class="breadcum-nav">
                                    <ul>
                                        <li><a href="{{route('admin.jobs')}}">Jobs</a></li>
                                        <li><a href="#">Post a Job</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-6">
                                <div class="show-active-jobs text-right">
                                    <a href="#" class="btn btn-default">show active jobs</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="Dashboard-edit-wrap register-wrapper">
                        <form>
                            <div class="form-register" id="step-1">
                                <h4>Get Started </h4>
                                <div class="form-group">
                                    <label>Job Category</label>
                                    <select class="form-control">
                                        <option>Nanny Helper</option>
                                        <option>Clearner</option>
                                        <option>Housekeeper</option>
                                        <option>Chef</option>
                                        <option>Night Baby sitter</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Job Title</label>
                                    <input type="text" class="form-control" placeholder="e.g Nanny">
                                </div>
                                <div class="form-group">
                                    <label>Location: City or Post Code</label>
                                    <input type="text" class="form-control" placeholder="e.g Birmaingham">
                                </div>
                                <div class="form-group">
                                    <label>Country Selection</label>
                                    <!-- <input type="text" class="form-control" placeholder="United Kingdom"> -->
                                <select class="form-control bfh-countries" data-country="US"></select>
                            </div>
                            <div class="form-group">
                                <label>Job Type</label>
                                <div class="inline-form">
                                    <div class="form-group form-check">
                                        <input type="checkbox" class="form-check-input" id="job-type1">
                                        <label class="form-check-label" for="job-type1">Full Time</label>
                                    </div>
                                    <div class="form-group form-check">
                                        <input type="checkbox" class="form-check-input" id="job-type2">
                                        <label class="form-check-label" for="job-type2">Part Time</label>
                                    </div>
                                    <div class="form-group form-check">
                                        <input type="checkbox" class="form-check-input" id="job-type3">
                                        <label class="form-check-label" for="job-type3">Live In</label>
                                    </div>
                                    <div class="form-group form-check">
                                        <input type="checkbox" class="form-check-input" id="job-type4">
                                        <label class="form-check-label" for="job-type4">Live Out</label>
                                    </div>
                                    <div class="form-group form-check">
                                        <input type="checkbox" class="form-check-input" id="job-type5">
                                        <label class="form-check-label" for="job-type5">Permanent</label>
                                    </div>
                                    <div class="form-group form-check">
                                        <input type="checkbox" class="form-check-input" id="job-type5">
                                        <label class="form-check-label" for="job-type5">Temporary</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Salary Expectation</label>
                                        <input type="text" class="form-control" placeholder="$10">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="hidden" >Salary Expectation</label>
                                        <select class="form-control">
                                            <option>per hour</option>
                                            <option>per week</option>
                                            <option>per month</option>
                                            <option>per year</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>How many staffs want to hire?</label>
                                <select class="form-control">
                                    <option>1</option>
                                    <option>2-4</option>
                                    <option>5-10</option>
                                </select>
                            </div>

                            <div class="form-group flex-buttons">
                                <span class="btn btn-default" id="next-1">Next</span>
                            </div>
                        </div>
                        <!-- register section step 1-->
                        <div class="form-register" id="step-2">
                            <h4>Children Information</h4>
                            <div class="form-group">
                                <label>1) Total number of children</label>
                                <input type="text" class="form-control" placeholder="">
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Total male children  </label>
                                        <input type="text" class="form-control" placeholder="">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Total female children  </label>
                                        <input type="text" class="form-control" placeholder="">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>2) Total number of adults</label>
                                <input type="text" class="form-control" placeholder="">
                            </div>
                            <div class="form-group flex-buttons">
                                <span class="btn btn-default" id="back-1">Back</span>
                                <span class="btn btn-default" id="next-3">Next</span>
                            </div>
                        </div>
                        <!-- end step 2 -->
                        <div class="form-register" id="step-3">
                            <h4>Work Information</h4>
                            <div class="form-group">
                                <label>1) Total working days</label>
                                <input type="text" class="form-control" placeholder="e. g 4 hours a day ">
                            </div>
                            <div class="inline-form">
                                <div class="form-group form-check">
                                    <input type="checkbox" class="form-check-input" id="day1">
                                    <label class="form-check-label" for="day1">SUN</label>
                                </div>
                                <div class="form-group form-check">
                                    <input type="checkbox" class="form-check-input" id="day2">
                                    <label class="form-check-label" for="day2">MON</label>
                                </div>
                                <div class="form-group form-check">
                                    <input type="checkbox" class="form-check-input" id="day3">
                                    <label class="form-check-label" for="day3">TUE</label>
                                </div>
                                <div class="form-group form-check">
                                    <input type="checkbox" class="form-check-input" id="day4">
                                    <label class="form-check-label" for="day4">WED</label>
                                </div>
                                <div class="form-group form-check">
                                    <input type="checkbox" class="form-check-input" id="day5">
                                    <label class="form-check-label" for="day5">THU</label>
                                </div>
                                <div class="form-group form-check">
                                    <input type="checkbox" class="form-check-input" id="day6">
                                    <label class="form-check-label" for="day6">FRI</label>
                                </div>
                                <div class="form-group form-check">
                                    <input type="checkbox" class="form-check-input" id="day7">
                                    <label class="form-check-label" for="day7">SAT</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Start Time</label>
                                        <input type="text" class="form-control" placeholder="12:00 PM">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>End Time</label>

                                        <input type="text" class="form-control" placeholder="4:00 PM">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>2) Work Start Day</label>
                                <!-- <input type="text" class="form-control" placeholder="01-11-2018"> -->
                                <input type="date" class="form-control" placeholder="e. g.  09/02/2019">
                            </div>

                            <div class="form-group flex-buttons">
                                <span class="btn btn-default" id="back-2">Back</span>
                                <span class="btn btn-default" id="next-4">next</span>
                            </div>
                        </div>
                        <!-- end step 3 -->
                        <div class="form-register" id="step-4">
                            <h4>Children Information</h4>
                            <div class="form-group">
                                <label>1) Total number of children</label>
                                <input type="text" class="form-control" placeholder="">
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Total male children  </label>
                                        <input type="text" class="form-control" placeholder="">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Total female children  </label>
                                        <input type="text" class="form-control" placeholder="">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>2) Total number of adults</label>
                                <input type="text" class="form-control" placeholder="">
                            </div>
                            <div class="form-group flex-buttons">
                                <span class="btn btn-default" id="back-3">Back</span>
                                <span class="btn btn-default" id="next-5">Next</span>
                            </div>
                        </div>
                        <!-- end step 4 -->
                        <div class="form-register" id="step-5">
                            <h4>Job Description</h4>
                            <div class="form-group">
                                <label>Describe  about job (Roles and Responsibility)</label>
                                <textarea class="form-control"></textarea>
                            </div>
                            <div class="form-group">
                                <label>Job Experience</label>
                                <select class="form-control">
                                    <option>1</option>
                                    <option>2-4</option>
                                    <option>5-10</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Language Preferences</label>
                                <input type="text" class="form-control" placeholder="e. g English">
                            </div>
                            <div class="form-group">
                                <label>Best time to interview (morning, evening, etc.):</label>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <!-- <label>Start Time</label> -->
                                            <input type="text" class="form-control" placeholder="3/12/2018">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <!-- <label>End Time</label> -->
                                            <input type="text" class="form-control" placeholder="12:00 PM">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-group form-check">
                                    <input type="checkbox" class="form-check-input" id="terms">
                                    <label class="form-check-label" for="terms">
                                        <span class="small">
                                            Check this box if you accept these terms. I here by confirm that i have read and
                                            understood the <a href="">Terms and condition</a> of Jobcircle Limited and agree to be bound
                                            by these terms and condition.
                                        </span>
                                    </label>
                                </div>

                            </div>
                            <div class="form-group flex-buttons">
                                <span class="btn btn-default" id="back-4">Back</span>
                                <button class="btn btn-default" id="submit">Submit</button>
                            </div>
                        </div>
                        <!-- end step 5 -->
                    </form>
                </div>
            </div>
        </div>
        <!-- customer-dashboard-body -->
    </div>
</div>
@endsection