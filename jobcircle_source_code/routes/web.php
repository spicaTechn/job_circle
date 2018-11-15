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



// Routes for admin section
Route::prefix('admin')->group(function () {
    Route::get('/', [
        'as'        =>'admin.dashboard',
        'uses'      =>'Admin\Dashboard\DashboardController@index'
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


	// faq
	Route::post('/pages/faq/',[
		'as'        => 'admin.pages.faq',
		'uses'      => 'Admin\Pages\Faq\FaqController@store'
	]);
	Route::get('/pages/faq/{id}',[
		'as'        => 'admin.pages.faq',
		'uses'      => 'Admin\Pages\Faq\FaqController@edit'
	]);
	Route::post('/pages/faq/{id}',[
		'as'        => 'admin.pages.faq',
		'uses'      => 'Admin\Pages\Faq\FaqController@update'
	]);
	Route::get('/pages/faq/{id}',[
		'as'        => 'admin.pages.faq',
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
	// faq page
	Route::get('/pages/faq', [
		'as'		=>	'admin.pages.faq',
		'uses'		=>	'Admin\Pages\Faq\FaqController@index'
	]);
});

