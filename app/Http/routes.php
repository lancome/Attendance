<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/


/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/
//admin route
Route::group(['middleware' => 'web'], function () {
    Route::auth();
    Route::resource('/students', 'Admin\StudentController');
    Route::resource('/groups', 'Admin\GroupController');
    Route::resource('/subjects', 'Admin\SubjectController');
//    Route::resource('/users', 'Admin\UserController');
    Route::get('/pdf', 'Admin\PDFController@decodePDF');
    Route::get('/excel', 'Admin\ExcelController@decodeExcel');
});

//teacher route
Route::group(['middleware' => 'web'], function () {
    Route::auth();
//teacher_attendances
    Route::resource('/pivots', 'Teacher\PivotController');
//teacher_attendances
    Route::resource('pivots/{pivotid}/students/{studentid}/attendances', 'Teacher\AttendanceController');
//teacher_students
    Route::resource('pivots/{pivotid}/students', 'Teacher\StudentController');
//teacher_sbujects
    Route::resource('pivots/{pivotid}/subjects', 'Teacher\SubjectController');
//teacher_groups
    Route::resource('pivots/{pivotid}/groups', 'Teacher\GroupController');

});
//welcome page route
Route::group(['middleware' => 'web'], function() {
    Route::get('/', function () {
        return view('pages.welcome');
    });
});