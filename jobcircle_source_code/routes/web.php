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

	Route::get('/jobs', [
		'as'		=>	'admin.jobs',
		'uses'		=>	'Admin\Jobs\JobsController@index'
	]);

	Route::get('/edit-profile', [
		'as'		=>	'admin.edit-profile',
		'uses'		=>	'Admin\EditProfile\EditProfileController@index'
	]);
});

