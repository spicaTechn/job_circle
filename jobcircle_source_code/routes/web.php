<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


// Routes for front section
Route::get('/', 'Front\MainController@index');
Route::get('/contact','Front\Page\Contact\ContactController@index');
Route::get('/faq','Front\Page\Faq\FaqController@index');
Route::get('/company','Front\Page\Company\CompanyController@index');
Route::get('/services','Front\Page\Services\ServicesController@index');
Route::get('/services/{id}','Front\Page\Services\ServicesController@show');
Route::get('/find-a-job','Front\Page\FindJob\FindJobController@index');
Route::get('/terms-conditions','Front\Page\TermsConditions\TermsConditionsController@index');

/*Route for employer*/
// Route::get('/employer',[
// 	'as'			=>	'employer.index',
// 	'uses'			=>	'Front\Employer\EmployerController@index'
// ]);
// Route::any('/employer/jobStep1',[
// 	'as'			=>	'employer.jobStep1',
// 	'uses'			=>	'Front\Employer\EmployerController@jobStep1'
// ]);
// Route::any('/employer/jobStep2',[
// 	'as'			=>	'employer.jobStep2',
// 	'uses'			=>	'Front\Employer\EmployerController@jobStep2'
// ]);
// Route::any('/employer/jobStep3',[
// 	'as'			=>	'employer.jobStep3',
// 	'uses'			=>	'Front\Employer\EmployerController@jobStep3'
// ]);
// // Route::any('/employer/jobStep4',[
// // 	'as'			=>	'employer.jobStep4',
// // 	'uses'			=>	'Front\Employer\EmployerController@jobStep4'
// // ]);
// Route::post('/employer',[
// 	'as'			=>	'employer.store',
// 	'uses'			=>	'Front\Employer\EmployerController@store'
// ]);

/*route for employer*/
Route::prefix('employer')->group(function () {
	Route::get('/', [
        'as'        =>'employer.dashboard',
        'uses'      =>'Front\Employer\EmployerController@dashboard'
	]);

	Route::get('/create-job',[
		'as'			=>	'employer.create-job',
		'uses'			=>	'Front\Employer\EmployerController@createJob'
	]);
	Route::any('/create-job/step1',[
		'as'			=>	'employer.create-job.step1',
		'uses'			=>	'Front\Employer\EmployerController@step1'
	]);
	Route::any('/create-job/step2',[
		'as'			=>	'employer.create-job.step2',
		'uses'			=>	'Front\Employer\EmployerController@step2'
	]);
	Route::any('/create-job/step3',[
		'as'			=>	'employer.create-job.step3',
		'uses'			=>	'Front\Employer\EmployerController@step3'
	]);
	Route::any('/create-job/step4',[
		'as'			=>	'employer.create-job.step4',
		'uses'			=>	'Front\Employer\EmployerController@step4'
	]);
	Route::post('/create-job',[
		'as'			=>	'employer.create-job.store',
		'uses'			=>	'Front\Employer\EmployerController@store'
	]);
	Route::get('/job/show/{id}',[
		'as'			=> 	'employer.job.show',
		'uses'			=>	'Front\Employer\EmployerController@show'
	]);
	Route::get('/job/edit/{id}',[
		'as'			=>	'employer.job.edit',
		'uses'			=>	'Front\Employer\EmployerController@edit'
	]);
	Route::any('/job/update/update1',[
		'as'			=>	'employer.job.update.update1',
		'uses'			=>	'Front\Employer\EmployerController@update1'
	]);
	Route::any('/job/update/update2',[
		'as'			=>	'employer.job.update.update2',
		'uses'			=>	'Front\Employer\EmployerController@update2'
	]);
	Route::any('/job/update/update3',[
		'as'			=>	'employer.job.update.update3',
		'uses'			=>	'Front\Employer\EmployerController@update3'
	]);
	Route::any('/job/update/update4',[
		'as'			=>	'employer.job.update.update4',
		'uses'			=>	'Front\Employer\EmployerController@update4'
	]);
	Route::post('/job/update/{id}',[
		'as'			=>	'employer.job.update',
		'uses'			=>	'Front\Employer\EmployerController@update'
	]);
	Route::get('/jobs/getJobType', [
		'as'			=>  'employer.jobs.getJobType',
		'uses'			=>  'Front\Employer\EmployerController@getJobType'
	]);
	Route::get('/jobs/getJobCategory', [
		'as'			=>  'employer.jobs.getJobCategory',
		'uses'			=>  'Front\Employer\EmployerController@getJobCategory'
	]);
});

// Routes for admin section
Route::prefix('admin')->group(function () {
    Route::get('/', [
        'as'        =>'admin.dashboard',
        'uses'      =>'Admin\Dashboard\DashboardController@index'
	]);
	Route::get('/adminjobs',[
		'as'		=> 'admin.adminjobs',
		'uses'		=> 'Admin\AdminJobs\AdminJobsController@index'
	]);


	// Job Category route
	Route::get('/job-category',[
		'as'		=> 'admin.job-category',
		'uses'		=> 'Admin\JobCategory\JobCategoryController@index'
	]);
	Route::post('/job-category',[
		'as'		=> 'admin.job-category',
		'uses'		=> 'Admin\JobCategory\JobCategoryController@store'
	]);
	Route::get('/job-category/{id}',[
		'as'		=> 'admin.job-category.id',
		'uses'		=> 'Admin\JobCategory\JobCategoryController@edit'
	]);
	Route::post('/job-category/{id}',[
		'as'		=> 'admin.job-category.id',
		'uses'		=> 'Admin\JobCategory\JobCategoryController@update'
	]);
	Route::delete('/job-category/{id}',[
		'as'		=> 'admin.job-category.id',
		'uses'		=> 'Admin\JobCategory\JobCategoryController@destroy'
	]);
	Route::get('/getJobCategory', [
		'as'		=> 'admin.getJobCategory',
		'uses'		=> 'Admin\JobCategory\JobCategoryController@getJobCategory'
	]);

	// Job Type route
	Route::get('/job-type',[
		'as'		=> 'admin.job-type',
		'uses'		=> 'Admin\JobType\JobTypeController@index'
	]);
	Route::post('/job-type',[
		'as'		=> 'admin.job-type',
		'uses'		=> 'Admin\JobType\JobTypeController@store'
	]);
	Route::get('/job-type/{id}',[
		'as'		=> 'admin.job-type.id',
		'uses'		=> 'Admin\JobType\JobTypeController@edit'
	]);
	Route::post('/job-type/{id}',[
		'as'		=> 'admin.job-type.id',
		'uses'		=> 'Admin\JobType\JobTypeController@update'
	]);
	Route::delete('/job-type/{id}',[
		'as'		=> 'admin.job-type.id',
		'uses'		=> 'Admin\JobType\JobTypeController@destroy'
	]);
	Route::get('/getJobType', [
		'as'		=> 'admin.getJobType',
		'uses'		=> 'Admin\JobType\JobTypeController@getJobType'
	]);



	// Job route
	Route::get('/jobs', [
		'as'		=> 'admin.jobs',
		'uses'		=> 'Admin\Jobs\JobsController@index'
	]);
	Route::post('/jobs',[
		'as'		=> 'admin.jobs',
		'uses'		=> 'Admin\Jobs\JobsController@store'
	]);
	Route::get('/jobs/getJobs',[
		'as'		=>	'admin.jobs.getJobs',
		'uses'		=>	'Admin\Jobs\JobsController@getJobs'
	]);
	Route::get('/jobs/getJobType', [
		'as'		=> 'admin.jobs.getJobType',
		'uses'		=> 'Admin\Jobs\JobsController@getJobType'
	]);
	Route::get('/jobs/getJobCategory', [
		'as'		=> 'admin.jobs.getJobCategory',
		'uses'		=> 'Admin\Jobs\JobsController@getJobCategory'
	]);
	Route::get('/jobs/{id}',[
		'as'		=>	'admin.jobs.edit',
		'uses'		=>  'Admin\Jobs\JobsController@edit'
	]);
	Route::post('/jobs/{id}',[
		'as'		=>	'admin.jobs.update',
		'uses'		=>  'Admin\Jobs\JobsController@update'
	]);
	Route::get('/jobs/show/{id}',[
		'as'		=>	'admin.jobs.show',
		'uses'		=>  'Admin\Jobs\JobsController@show'
	]);
	Route::post('/jobs/delete/{id}', [
		'as'		=>	'admin.jobs.destroy',
		'uses'		=>	'Admin\Jobs\JobsController@destroy'
	]);

	
/************Route for all pages backend part************/
	// home slider
	Route::get('/pages/home',[
		'as'		=>	'admin.pages.home',
		'uses'		=>	'Admin\Pages\Home\HomeController@index'
	]);
	Route::post('/pages/home/sliderStore',[
		'as'        => 'admin.pages.home.sliderStore',
		'uses'      => 'Admin\Pages\Home\HomeController@sliderStore'
	]);
	Route::get('/pages/home/sliderEdit/{id}',[
		'as'        => 'admin.pages.home.sliderEdit',
		'uses'      => 'Admin\Pages\Home\HomeController@sliderEdit'
	]);
	Route::post('/pages/home/sliderUpdate/{id}',[
		'as'        => 'admin.pages.home.sliderUpdate',
		'uses'      => 'Admin\Pages\Home\HomeController@sliderUpdate'
	]);
	Route::get('/pages/home/sliderDelete/{id}',[
		'as'        => 'admin.pages.home.sliderDelete',
		'uses'      => 'Admin\Pages\Home\HomeController@sliderDelete'
	]);

	Route::post('/pages/home/backgroundImageStore',[
		'as'		=> 'admin.pages.home.backgroundImageStore',
		'uses'		=> 'Admin\Pages\Home\HomeController@backgroundImageStore'
	]);

	Route::post('/pages/home/backgroundImageUpdate/{id}',[
		'as'		=> 'admin.pages.home.backgroundImageUpdate',
		'uses'		=> 'Admin\Pages\Home\HomeController@backgroundImageUpdate'
	]);


	// faq page
	Route::get('/pages/faq', [
		'as'		=>	'admin.pages.faq',
		'uses'		=>	'Admin\Pages\Faq\FaqController@index'
	]);
	Route::post('/pages/faq/',[
		'as'        => 'admin.pages.faq.store',
		'uses'      => 'Admin\Pages\Faq\FaqController@store'
	]);
	Route::get('/pages/faq/{id}',[
		'as'        => 'admin.pages.faq.edit',
		'uses'      => 'Admin\Pages\Faq\FaqController@edit'
	]);
	Route::post('/pages/faq/{id}',[
		'as'        => 'admin.pages.faq.update',
		'uses'      => 'Admin\Pages\Faq\FaqController@update'
	]);
	Route::get('/pages/faq/destroy/{id}',[
		'as'        => 'admin.pages.faq.destroy',
		'uses'      => 'Admin\Pages\Faq\FaqController@destroy'
	]);

    // service
    Route::post('/pages/services/serviceStore',[
		'as'        => 'admin.pages.services.serviceStore',
		'uses'      => 'Admin\Pages\Services\ServicesController@serviceStore'
	]);
	Route::get('/pages/services/serviceEdit/{id}',[
		'as'        => 'admin.pages.services.serviceEdit',
		'uses'      => 'Admin\Pages\Services\ServicesController@serviceEdit'
	]);
	Route::post('/pages/services/serviceUpdate/{id}',[
		'as'        => 'admin.pages.services.serviceUpdate',
		'uses'      => 'Admin\Pages\Services\ServicesController@serviceUpdate'
	]);
	Route::get('/pages/services/serviceDelete/{id}',[
		'as'        => 'admin.pages.services.serviceDelete',
		'uses'      => 'Admin\Pages\Services\ServicesController@serviceDelete'
	]);
	
	Route::get('/pages/services', [
		'as'		=>	'admin.pages.services',
		'uses'		=>	'Admin\Pages\Services\ServicesController@index'
	]);
	Route::post('/pages/services',[
		'as'        => 'admin.pages.services',
		'uses'      => 'Admin\Pages\Services\ServicesController@store'
	]);
	Route::post('/pages/services/{id}',[
		'as'        => 'admin.pages.services.id',
		'uses'      => 'Admin\Pages\Services\ServicesController@update'
	]);
	

	// company=about page
	Route::get('/pages/company', [
		'as'		=>	'admin.pages.company',
		'uses'		=>	'Admin\Pages\Company\CompanyController@index'
	]);
	Route::post('/pages/company', [
		'as'		=>	'admin.pages.company',
		'uses'		=>	'Admin\Pages\Company\CompanyController@store'
	]);
	Route::post('/pages/company/{id}',[
		'as'        => 'admin.pages.company.id',
		'uses'      => 'Admin\Pages\Company\CompanyController@update'
	]);

	// contact page
	Route::get('/pages/contact', [
		'as'		=>	'admin.pages.contact',
		'uses'		=>	'Admin\Pages\Contact\ContactController@index'
	]);
	Route::post('/pages/contact',[
		'as'        => 'admin.pages.contact',
		'uses'		=>	'Admin\Pages\Contact\ContactController@store'
	]);
	Route::post('/pages/contact/{id}',[
		'as'        => 'admin.pages.contact.id',
		'uses'		=>	'Admin\Pages\Contact\ContactController@update'
	]);
	

	// terms and conditons
	Route::get('/pages/terms-conditions', [
		'as'		=> 'admin.pages.terms-conditions',
		'uses'		=> 'Admin\Pages\TermsConditions\TermsConditionsController@index'
	]);
	Route::post('/pages/terms-conditions', [
		'as'		=> 'admin.pages.terms-conditions',
		'uses'		=> 'Admin\Pages\TermsConditions\TermsConditionsController@store'

	]);
	Route::post('/pages/terms-conditions/{id}', [
		'as'		=> 'admin.pages.terms-conditions.id',
		'uses'		=> 'Admin\Pages\TermsConditions\TermsConditionsController@update'

	]);
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// mail send
Route::post('/sendbasicemail','Front\Page\MailSend\MailController@basic_email');
