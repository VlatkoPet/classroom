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

Route::get('/', function () {
    return view('welcome');
});
Route::resource('classroom', 'ClassroomController');
Route::resource('teacher', 'TeacherController');
Route::resource('student', 'StudentController');

Route::get('/dashboard', 'AdminController@getAllClassrooms')->name('dashboard');




// Route::get('/testedit/{id}', 'TeacherController@edit')->name('testedit');
// Route::get('/index', 'TeacherController@index')->name('index');
// Route::get('/testteachers', 'AdminController@testteachers')->name('testteachers');

// Route::get('/testteachersclassess', 'AdminController@testteachersclassess')->name('testteachersclassess');
// Route::get('/teststudentclassess', 'AdminController@teststudentclassess')->name('teststudentclassess');

// Route::get('/getteacherallclassrooms', 'AdminController@getTeachersClassrooms')->name('getteacherallclassrooms');
// Route::get('/checkOldClassess/{id}', 'TeacherController@checkOldClassess')->name('checkOldClassess');
// Route::get('/dashboardtest', 'AdminController@getAllClassroomstest')->name('dashboardtest');
