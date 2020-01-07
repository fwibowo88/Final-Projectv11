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
    return view('layout.adminLayout');
});

Route::get('/student',function(){
  return view('administrator.master.allStudent');
});
Route::get('/subject',function(){
  return view('administrator.master.allSubject');
});
Route::get('/academic-year',function(){
  return view('administrator.master.allYear');
});

Route::get('/employee',function(){
  return view('administrator.master.allEmployee');
});

Route::get('/program',function(){
  return view('administrator.master.allProgram');
});

Route::get('/department',function(){
  return view('administrator.master.allDepartment');
});

Route::get('/extracurricular',function(){
  return view('administrator.master.allExtracurricular');
});

Route::get('/token',function(){
  return view('administrator.master.allToken');
});

Route::get('/bank',function(){
  return view('administrator.master.allBank');
});

Route::get('/religion',function(){
  return view('administrator.master.allReligion');
});

Route::get('/violation',function(){
  return view('administrator.master.allViolation');
});

Route::get('/complaint',function(){
  return view('administrator.master.allComplaint');
});

Route::get('/absent',function(){
  return view('administrator.transaction.allAbsent');
});





// Route::resource('/student','StudentController');
// Route::resource('/academic-year','AcademicYearController');
// Route::resource('/employee','EmployeeController');
// Route::resource('/subject','SubjectController');
// Route::resource('/program','ProgramController');
