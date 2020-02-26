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

// Route for Admission FrontEnd Module
Route::get('/admission/contact','AdmissionController@viewContact')->name('admission.contact');
Route::get('/admission/register','AdmissionController@viewRegister')->name('admission.register');
Route::post('/admission/verify','AdmissionController@checkToken')->name('admission.checkToken');

Route::get('/absent-record/filter',['as'=>'absent-record.filter','uses'=>'AbsentController@filter']);

Route::resource('/bank','BankController');
Route::resource('/religion','ReligionController');
Route::resource('/department','DepartmentController');
Route::resource('/program','ProgramController');
Route::resource('/subject','SubjectController');
Route::resource('/counseling','CounselingController');
Route::resource('/complaint','ComplaintController');
Route::resource('/achievment','AchievmentController');
Route::resource('/violation','ViolationController');
Route::resource('/season','AcademicYearController');
Route::resource('/billing-Item','BillingItemController');
Route::resource('/class','GradeController');
Route::resource('/employee','EmployeeController');
Route::resource('/extracurricular','ExtracurricularController');
Route::resource('/guardian','GuardianController');
Route::resource('/student','StudentController');
Route::resource('/absent-record','AbsentController');
Route::resource('/medical-record','MedicalController');
