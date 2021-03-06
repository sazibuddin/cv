<?php

use Illuminate\Support\Facades\Route;

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

Auth::routes();

Route::get('/', function () {
    return view('auth.register');
});
// Route::get('/admin/login', 'AdminController@showLogin');
// Route::post('/admin/login/login', 'Auth\LoginController@authenticate')->name('admin.login');





// admin middleware and route 
Route::group(['middleware' => ['auth','admin']], function () {
    Route::get('/admin', 'AdminController@admin')->name('admin.home');  
    Route::get('/admin/home/all/user', 'AdminController@all_member')->name('admin.all.member');  
    Route::get('/admin/view/user/{id}', 'AdminController@show');  
    Route::get('admin/delete/user/{id}', 'AdminController@deleteUser');  
    Route::get('admin/edit/personalInfo/{id}', 'AdminController@editpersonalInfo');  
    Route::post('update/personal_info/{id}', 'AdminController@updatepersonalInfo');  
    Route::get('admin/edit/experienceInfo/{id}', 'AdminController@experienceInfo');  
    Route::post('update/experienceInfo/{id}', 'AdminController@updateexperienceInfo');  
    Route::get('admin/edit/educationalInfo/{id}', 'AdminController@editeducationalInfo');  
    Route::post('update/educationalInfo/{id}', 'AdminController@updateeducationalnfo');  
 



    // admin mange route 
    Route::post('admin/make/admin/{id}', 'AdminManageController@makeadmin');  
    Route::get('admin/index', 'AdminManageController@index');
    Route::get('admin/profile/{id}', 'AdminManageController@profile');
    Route::get('admin/delete/admin/{id}', 'AdminManageController@destroy');
    Route::post('admin/password/update/{id}', 'AdminManageController@passUpdate');
    
});

// user middleware and route 
Route::group(['middleware' => ['auth','user']], function () {
    Route::get('/home', 'HomeController@index')->name('home'); 
    Route::get('/user-profile/{id}', 'UserController@profile_view'); 
    Route::get('/personal_info' , 'PersonalInfoController@index');
    Route::post('user/addPersonalInfo' , 'PersonalInfoController@store')->name('user.personalInfo.add');
    Route::get('/user/edit/personalInfo/{id}' , 'PersonalInfoController@edit');
    Route::post('user/update/personal_info/{id}' , 'PersonalInfoController@update');
    
    Route::get('/educational_info' , 'EducationInfoController@index');
    Route::post('/user/addeducationalInfo' , 'EducationInfoController@store')->name('user.educationalInfo.add');

    Route::get('/user/edit/educational/{id}' , 'EducationInfoController@edit');
    Route::post('user/update/educational/{id}' , 'EducationInfoController@update');
    
    Route::get('/experience_info' , 'ExperienceInfoController@index');
    Route::post('/user/addexperienceInfo' , 'ExperienceInfoController@store')->name('user.experienceInfo.add');
    Route::get('/user/edit/experience/{id}' , 'ExperienceInfoController@edit');
    Route::post('user/update/experienceInfo/{id}' , 'ExperienceInfoController@update');
    

});


