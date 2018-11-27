<!doctype html>
<html lang="en">
<head>
<!-- Required meta tags -->
@include('front.include.head')
</head>

<body>
@include('front.include.topnav')
@include('front.include.header')
<div class="register-page">
            <div class="container">
                <div class="register-wrapper">
                    <form>
                        <div class="form-register" id="step-1">
                            <h4>Register as an Employee</h4>
                            <form method="POST" action="{{ route('register') }}">
                             @csrf
                            <div class="form-group">
                               <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" placeholder="Your Email" required>

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" placeholder="Password" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                           <div class="form-group">
                               <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Confirm Password" required>
                           </div>
                            <div class="form-group flex-buttons">
                                <span class="btn btn-default" id="next-1">Register</span>
                            </div>
                            <!--     <p><a href="#">Forgot Your Password?</a></p> -->
                            @guest
                            <p>Already have an account?<a href="{{ route('login') }}"> Sign In</a></p>
                            @endguest
                        </div>
                        <!-- register section step 1-->
                        <div class="form-register" id="step-2">
                            <h4>About You</h4>
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="First Name">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Surname">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Nationality">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Language">
                            </div>
                            <div class="form-group">
                                <input type="number" class="form-control" placeholder="Phone Number">
                            </div>
                            <!-- <div class="form-group">
                                <input type="text" class="form-control" placeholder="Do you have the legal right to work in UK">
                            </div> -->
                            <div class="form-group flex-buttons">
                                <span class="btn btn-default" id="back-1">Back</span>
                                <span class="btn btn-default" id="next-3">Next</span>
                            </div>
                        </div>
                        <!-- end step 2 -->
                        <div class="form-register" id="step-3">
                            <h4>Ideal work and role</h4>
                            <div class="form-group">
                                <label>Work Skills</label>
                                <input type="text" class="form-control" placeholder="e.g. Cleaning, Nanny">
                            </div>
                            <div class="form-group">
                                <label>Work Experience </label>
                                <input type="text" class="form-control" placeholder="e. g. 1 Year">
                            </div>
                            <div class="form-group">
                                <label>Reference (At least 2)</label>
                                <input type="text" class="form-control" placeholder="Reference 1">
                                <br>
                                <input type="text" class="form-control" placeholder="Reference 2">
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
                                <label>Position Wanted</label>
                                <input type="text" class="form-control" placeholder="Tell us your ideal job role (Optional)">
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
                                        <input type="checkbox" class="form-check-input" id="Permanent">
                                        <label class="form-check-label" for="Permanent">Permanent</label>
                                    </div>
                                    <div class="form-group form-check">
                                        <input type="checkbox" class="form-check-input" id="job-type3">
                                        <label class="form-check-label" for="job-type3"> Temporary</label>
                                    </div>
                                    <div class="form-group form-check">
                                        <input type="checkbox" class="form-check-input" id="job-type4">
                                        <label class="form-check-label" for="job-type4"> Live Out </label>
                                    </div>
                                    <div class="form-group form-check">
                                        <input type="checkbox" class="form-check-input" id="job-type5">
                                        <label class="form-check-label" for="job-type5">Live In</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>When you can start your job</label>
                                <input type="date" class="form-control" placeholder="e. g 09/02/2019">
                            </div>
                            <div class="form-group">
                                <label>Health Condition</label>
                                
                                <textarea class="form-control" placeholder="Tell us about your health condition "></textarea>
                            </div>
                            <!-- <div class="form-group">
                                <label>Expected Salary</label>
                                <input type="text" class="form-control" placeholder="Expected Salary">
                            </div> -->
                            <div class="form-group flex-buttons">
                                <span class="btn btn-default" id="back-2">Back</span>
                                <span class="btn btn-default" id="next-4">Next</span>
                            </div>
                        </div>
                        <!-- end step 3 -->
                        <div class="form-register" id="step-4">
                            <h4>Your CV</h4>
                            <div class="form-group">
                                <div class="file-upload">
                                    <div class="file-select">
                                        <div class="file-select-button" id="fileName">Choose File</div>
                                        <div class="file-select-name" id="noFile">No file chosen...</div>
                                        <input type="file" name="chooseFile" id="chooseFile">
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
                                <span class="btn btn-default" id="back-3">Back</span>
                                <button type="submit" class="btn btn-default">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                        <!-- end step 4 -->
                    </form>
                </div>
            </div>
</div>


@include('front.include.footer')
</body>
</html>