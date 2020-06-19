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


Route::get('/', function () {
    return view('welcome');
});
*/

Route::get('/', function () {
    return view('welcome');
});


Route::group(['prefix'=>'admin'],function(){
	Route::get('/','School\SchoolController@index')->name('admin-dashboard');
	Route::get('/studentinfo','School\SchoolController@studentInfo')->name('student.info');
	Route::get('/student/manage','School\SchoolController@listStudentInfo')->name('student.manage');
	Route::post('/add','School\SchoolController@addStudentInfo')->name('student.add');
	Route::get('/edit/{id}','School\SchoolController@editStudentInfo')->name('student.edit');
	Route::post('/update/{id}','School\SchoolController@addStudentInfo')->name('student.update');
	Route::get('/delete/{id}','School\SchoolController@deleteStudentInfo')->name('student.delete');
	Route::get('/view/{id}','School\SchoolController@viewStudentInfo')->name('student.delete');
	Route::get('/studentinfo/{class_id}','School\SchoolController@getStudentByClass')->name('studentfetch.class');
	Route::get('/class_subjectinfo/{id}','School\SchoolController@getSubjectByClass')->name('class.subject');

	/*-------Result Routes-------*/
	Route::post('/submit/result/','School\ResultController@addResultInfo')->name('result.add');
	Route::get('/show/result/{id}','School\ResultController@getResult')->name('result.show');
	/*-------Result Routes-------*/
});

?>