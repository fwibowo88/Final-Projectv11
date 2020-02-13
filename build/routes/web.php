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

Route::get('/', function () {
    return view('welcome');
});


Route::get('/absent-record/{id}/confirmed','AbsentController@confirmed')->name('absent-record.confirmed'); //Confirmation Absent

Route::resource('/bank','BankController');
Route::resource('/religion','ReligionController');
Route::resource('/department','DepartmentController');


Route::resource('/program','ProgramController');
Route::resource('/subject','SubjectController');
Route::resource('/counseling','CounselingController');
Route::resource('/complaint','ComplaintController');
Route::resource('/achievment','AchievmentController');
Route::resource('/violation','ViolationController');
Route::resource('/academic-Year','AcademicYearController');
Route::resource('/billing-Item','BillingItemController');
Route::resource('/class','GradeController');
Route::resource('/employee','EmployeeController');
Route::resource('/extracurricular','ExtracurricularController');
Route::resource('/guardian','GuardianController');
Route::resource('/student','StudentController');
Route::resource('/absent-record','AbsentController');
Route::resource('/medical-record','MedicalController');
