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
	Route::get('/result/class_subjectinfo/{id}','School\SchoolController@getSubjectByClass')->name('class.subject');

	/*-------Result Routes-------*/
	Route::post('/submit/result/','School\ResultController@addResultInfo')->name('result.add');
	Route::get('/edit/result/{id}','School\ResultController@editResultInfo')->name('result.edit');
	Route::post('/update/result/{id}','School\ResultController@updateResultInfo')->name('result.update');
	Route::get('/show/result/{id}','School\ResultController@getResult')->name('result.show');
	Route::get('/print/result/','School\ResultController@result')->name('result');
	Route::get('/print/result/{id}','School\ResultController@resultClass')->name('result.class');
	Route::get('/pdf/result/{id}','School\ResultController@resultPdf')->name('result.pdf');
	/*-------Result Routes-------*/
});

?>