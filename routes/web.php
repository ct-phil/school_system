<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\LecturerController;
use App\Http\Controllers\UnitController;
use App\Http\Controllers\BatchController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\FacultyController;
use App\Http\Controllers\Lecturer\HomeController as LecturerHomeController;
use App\Http\Controllers\ShiftController;
use App\Http\Controllers\Student\HomeController as StudentHomeController;
use App\Mail\AcceptanceLetter;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

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

// Route::get('/courses', function () {
//     return view('courses.index');
// });

Route::get('/dashboard', function () {
    return view('dashboard');
});

// Route::get('/', function () {
//     Mail::send(new AcceptanceLetter());
// });

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/not_authorized', [App\Http\Controllers\NotAuthController::class, 'index'])->name('not_authorized');

// Route::group(['middleware' => ['auth', 'admin']], function() {


Route::group(['middleware' => ['auth']], function() {
    Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class);
    Route::resource('courses', CourseController::class);
    Route::resource('students', StudentController::class);
    Route::resource('lecturers', LecturerController::class);
    Route::resource('units', UnitController::class);
    Route::resource('batches', BatchController::class);
    Route::resource('attendances', AttendanceController::class);
    Route::resource('faculties', FacultyController::class);
    Route::resource('shifts', ShiftController::class);
});

Route::group(['middleware' => ['auth', 'student']], function () {
    Route::get('/student_home', [StudentHomeController::class, 'index'])->name('student.home');
});

Route::group(['middleware' => ['auth', 'lecturer']], function () {
    Route::get('lecturer_home', [LecturerHomeController::class, 'index'])->name('lecturer.home');
});
