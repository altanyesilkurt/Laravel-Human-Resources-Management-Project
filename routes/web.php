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
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::post('/login/custom',[
    'uses'=>'LoginController@login',
    'as'=>'login.custom'
]);
Route::group(['middleware'=>'auth'],function(){
    Route::get('/home',function(){
        return view('home');
    })->name('home');
    Route::get('/admin',function(){
        return view('dashboard');
    })->name('dashboard');
});

/*Route::resource('companies','CompanyController');
Route::resource('departments','DepartmentController');
Route::resource('branches','BranchController');
Route::resource('tasks','TaskController');
Route::resource('titles','TitleController');
Route::resource('candidates','CandidateController');
Route::resource('employees','EmployeeController');*/

Route::resource('sms_logs','Sms_logController');
Route::get('/download', 'CandidateController@getDownload')->name('candidate.cv.download');
Route::get('/reports','ReportController@index')->name('report.index');
Route::get('/reports/gridData', 'ReportController@gridData')->name('gridData');
Route::get('/export','ReportController@export')->name('exports');
Route::get('/exportToPdf','ReportController@exportToPdf')->name('exportToPdf');

Route::get('candidateReports','CandidateReportController@index')->name('candidate.report.index');
Route::get('candidateReports/create','CandidateReportController@create')->name('candidate.report.create');
Route::post('candidateReports','CandidateReportController@store');
Route::get('candidateReports/{id}/edit','CandidateReportController@edit')->name('candidate.report.edit');
Route::patch('candidateReports/{id}','CandidateReportController@update');
Route::get('/reports/candidates/{id}/delete','CandidateReportController@destroy')->name('candidate.report.destroy');
Route::get('/candidateReports/Data','CandidateReportController@gridData')->name('Data');

Route::get('employeeReports','EmployeeReportController@index')->name('employee.report.index');
Route::get('employeeReports/create','EmployeeReportController@create')->name('employee.report.create');
Route::post('employeeReports','EmployeeReportController@store');
Route::get('employeeReports/{id}/edit','EmployeeReportController@edit')->name('employee.report.edit');
Route::patch('employeeReports/{id}','EmployeeReportController@update');
Route::get('/reports/employees/{id}/delete','EmployeeReportController@destroy')->name('employee.report.destroy');
Route::get('/employeeReports/Data','EmployeeReportController@gridData')->name('employeeData');

Route::get('companyReports','CompanyReportController@index')->name('company.report.index');
Route::get('companyReports/create','CompanyReportController@create')->name('company.report.create');
Route::post('companyReports','CompanyReportController@store');
Route::get('companyReports/{id}/edit','CompanyReportController@edit')->name('company.report.edit');
Route::patch('companyReports/{id}','CompanyReportController@update');
Route::get('/reports/companies/{id}/delete','CompanyReportController@destroy')->name('company.report.destroy');
Route::get('/companyReports/Data','CompanyReportController@gridData')->name('companyData');

Route::get('departmentReports','DepartmentReportController@index')->name('department.report.index');
Route::get('departmentReports/create','DepartmentReportController@create')->name('department.report.create');
Route::post('departmentReports','DepartmentReportController@store');
Route::get('departmentReports/{id}/edit','DepartmentReportController@edit')->name('department.report.edit');
Route::patch('departmentReports/{id}','DepartmentReportController@update');
Route::get('/reports/departments/{id}/delete','DepartmentReportController@destroy')->name('department.report.destroy');
Route::get('/departmentReports/Data','DepartmentReportController@gridData')->name('departmentData');

Route::get('branchReports','BranchReportController@index')->name('branch.report.index');
Route::get('branchReports/create','BranchReportController@create')->name('branch.report.create');
Route::post('branchReports','BranchReportController@store');
Route::get('branchReports/{id}/edit','BranchReportController@edit')->name('branch.report.edit');
Route::patch('branchReports/{id}','BranchReportController@update');
Route::get('/reports/branches/{id}/delete','BranchReportController@destroy')->name('branch.report.destroy');
Route::get('/branchReports/Data','BranchReportController@gridData')->name('branchData');

Route::get('titleReports','TitleReportController@index')->name('title.report.index');
Route::get('titleReports/create','TitleReportController@create')->name('title.report.create');
Route::post('titleReports','TitleReportController@store');
Route::get('titleReports/{id}/edit','TitleReportController@edit')->name('title.report.edit');
Route::patch('titleReports/{id}','TitleReportController@update');
Route::get('/reports/titles/{id}/delete','TitleReportController@destroy')->name('title.report.destroy');
Route::get('/titleReports/Data','TitleReportController@gridData')->name('titleData');

Route::get('/projects/chart/data', 'ChartController@projectChartData');
Route::get('/projects/chart', 'ChartController@index');

Route::post('/sendEmail','EmailController@sendmail')->name('email.send');
Route::get('/sendEmail','EmailController@index')->name('email.index');

Route::get('check','CheckController@index')->name('check.index');
Route::post('check','CheckController@store')->name('check.store');

Route::get('tasks','TaskController@create')->name('tasks.index');
Route::post('tasks','TaskController@store')->name('tasks.add');

Route::get('vue','CheckController@show')->name('check.show');