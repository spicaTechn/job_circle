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
Route::get('/find-a-job','Front\Page\FindJob\FindJobController@index');



// Routes for admin section
Route::prefix('admin')->group(function () {
    Route::get('/', [
        'as'        =>'admin.dashboard',
        'uses'      =>'Admin\Dashboard\DashboardController@index'
	]);


    // Route for all pages backend part
	Route::get('/pages/services', [
		'as'		=>	'admin.pages.services',
		'uses'		=>	'Admin\Pages\Services\ServicesController@index'
	]);
	Route::get('/pages/services/getServices',[
		'as'		=> 'admin.pages.services.getServices',
		'uses'      => 'Admin\Pages\Services\ServicesController@getServices'
	]);
	Route::post('/pages/services',[
		'as'        => 'admin.pages.services',
		'uses'      => 'Admin\Pages\Services\ServicesController@store'
	]);
	Route::post('/pages/services/{id}',[
		'as'        => 'admin.pages.services.id',
		'uses'      => 'Admin\Pages\Services\ServicesController@update'
	]);
	Route::post('/pages/services',[
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

