<?php

use App\Http\Controllers\AdmissionController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\RoleController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\SemesterController;
use App\Http\Controllers\SyllabusController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\NoticesController;
use App\Http\Controllers\CollegeController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\NoticeTypeController;
use App\Http\Controllers\AjaxController;
use App\Http\Controllers\ClgNoticeController;
use App\Http\Controllers\SemesterFillUpController;
use App\Http\Livewire\Notification;
use App\Providers\RouteServiceProvider;

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
    if (Auth::check()) {
        return redirect(RouteServiceProvider::HOME);
    }
    return view('auth.login');
});

// Route::get('/student, function () {
//     return view('colleges.create_user');
// });
Route::get('/student', function () {
    return view('studentportal.index');
});
Route::get('/form', function () {
    return view('form.index');
});
Route::get('/formpage', function () {
    return view('form.indexpage');
});



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::group(['middleware' => ['auth', 'prevent-back']], function () {
    Route::get('dashboard', [DashboardController::class, 'dashboard']);
    Route::resource('users', UserController::class);
    Route::get('create-user/{id}', [UserController::class, 'createClgUser']);
    Route::get('edit-user/{id}', [UserController::class, 'editClgUser'])->name('college-users.edit');
    Route::post('store-user', [UserController::class, 'storeClgUser']);
    Route::post('update-user', [UserController::class, 'updateClgUser']);
    Route::get('delete-user/{id}', [UserController::class, 'deleteClgUser'])->name('college-users.delete');

    Route::resource('roles', RoleController::class);

    Route::resource('colleges', CollegeController::class);
    Route::resource('students', StudentController::class);

    Route::resource('department', DepartmentController::class);
    Route::get('course-structure', [CourseController::class, 'courseStructure'])->name('course.structure');
    Route::resource('course', CourseController::class);
    Route::resource('notice-type', NoticeTypeController::class);
    Route::get('semester/{id}/{parameter}', [SemesterController::class, 'semesterList'])->name('semester.list');
    Route::resource('semester',SemesterController::class);
    Route::get('uuc-syllabus/{id}/{department}/{sem}', [SyllabusController::class, 'syllabus'])->name('uuc.syllabus');
    // Route::resource('uuc-syllabus',SyllabusController::class);

    Route::get('notices', [NoticesController::class, 'index']);
    Route::get('add-notices', [NoticesController::class, 'create']);
    Route::post('uuc-create-notice', [NoticesController::class, 'store']);
    Route::get('notice/view/{id}', [NoticesController::class, 'show']);


    Route::post('find-student-by-rollno', [AjaxController::class, 'findByRollNo']);

    Route::post('get-course', [AjaxController::class, 'getCourse']);
    Route::post('publish-notice', [AjaxController::class, 'publishNotice']);
    Route::post('get-semester', [AjaxController::class, 'getSemester']);

    Route::get('uuc-admission/{id}/{dep}/{depId}', [AdmissionController::class, 'index']);
    Route::post('student-admission', [AdmissionController::class, 'store']);
    Route::post('student-admission/apply', [AdmissionController::class, 'apply']);

    Route::get('student-admission/preview/{id}', [AdmissionController::class, 'show']);
    Route::get('student-admission/edit/{id}', [AdmissionController::class, 'edit']);

    Route::get('student-admission/applied-application/{id}', [AdmissionController::class, 'appliedApplication']);

    Route::get('uuc-admission', [AdmissionController::class, 'admissionList']);
    Route::post('draft-student-admission', [AdmissionController::class, 'update']);

    Route::get('applied-admission-list', [AdmissionController::class, 'appliedAdmissionList']);
    Route::get('uuc-verify-admission/{id}', [AdmissionController::class, 'verifyAdmission']);
    Route::post('uuc-verify-admission', [AdmissionController::class, 'verifyStudentAdmission']);
    Route::get('uuc-applicant-admission-details/{id}', [AdmissionController::class, 'admissionDetails']);

    Route::get('exam-notices', [ClgNoticeController::class, 'index']);
    Route::get('view-notice/{id}/{notification_id}', [ClgNoticeController::class, 'show']);

    //prasant mid sem exam
    Route::get('mid-sem-exam', [CollegeController::class, 'midSemExam']);
    Route::POST('get-course-by-section', [CollegeController::class, 'midSemExamcourse']);
    Route::POST('get-semester-by-section', [CollegeController::class, 'midSemExamsemester']);

    Route::get('semester-form-fill-up/{id}/{dep}/{depId}', [SemesterFillUpController::class, 'index']);
    

    Route::get('uuc-exam-section/{id}', [NoticesController::class, 'redirectToNotice']);









});



