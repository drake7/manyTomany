<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\StudentController;
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

// Route::get('/', function () {
//     return view('welcome');
// });
Route:: get('/', function () {
    return view('home');
});

//Courses
Route::get('/courses','App\Http\Controllers\CourseController@index')
    ->name('course.list');
Route::get('/courses/{id}','App\Http\Controllers\CourseController@singleCourse');
Route::get('/courses/{id}/delete','App\Http\Controllers\CourseController@delete')
    ->name('course.delete');
// Route::get('/courses/add','App\Http\Controllers\CourseController@add');
Route::post('/courses/create','App\Http\Controllers\CourseController@create')
    ->name('course.create');
Route::post('courses/{id}/update','App\Http\Controllers\CourseController@update')
    ->name('course.update');
Route::get('courses/{id}/edit','App\Http\Controllers\CourseController@edit')
    ->name('course.edit');

//Student
Route::get('/students','App\Http\Controllers\StudentController@list')
    ->name('student.list');
Route::get('/students/{id}','App\Http\Controllers\StudentController@single');
Route::get('/students/{id}/edit',[StudentController::class,'edit'])
    ->name('student.edit');

Route::get('/student/{id}/delete','App\Http\Controllers\StudentController@delete')
    ->name('student.delete');
Route::post('/students/create','App\Http\Controllers\StudentController@create')
    ->name('student.create');
// Route::post('/student/{id}/update','App\Http\Controllers\StudentController@update')
    // ->name('student.update');
Route::post('/student/{id}/update',[StudentController::class,'update'])->name('student.update');


//Enrollment
Route::post('/enrollment/create','App\Http\Controllers\EnrollmentController@create')
    ->name('enrollment.create');
Route::get('/enrollment/{id}/delete','App\Http\Controllers\EnrollmentController@delete')
    ->name('enrollment.delete');

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Build the logout as a get request
route::get('/logout','App\Http\Controllers\Auth\LoginController@logout')->name('logout');


route::get('/secret','App\Http\Controllers\SecretController@showSecretPage');