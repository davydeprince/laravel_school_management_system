<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ExamController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ClassController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\ParentController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ClassSubjectController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/' , [AuthController::class ,'login'])->name('login');
Route::post('/' , [AuthController::class ,'authenticate'])->name('authenticate');
Route::get('/logout' , [AuthController::class ,'logout']);
Route::get('/forgot' , [AuthController::class ,'forgotpassword'])->name('forgotpassword');
Route::post('/forgot' , [AuthController::class ,'forgotpasswordpost'])->name('forgotpasswordpost');
Route::get('reset/{token}' , [AuthController::class , 'reset'])->name('reset');
Route::post('reset/{token}' , [AuthController::class ,'postreset'])->name('postreset');



//class URLs

Route::get('admin/class/list', [ClassController::class, 'list'])->name('list');
Route::get('admin/class/create', [ClassController::class, 'create'])->name('create');
Route::post('admin/class/create' ,[ClassController::class, 'postcreate'])->name('postcreate');
Route::get('admin/class/edit{id}', [ClassController::class, 'edit'])->name('edit');
Route::post('admin/class/edit{id}', [ClassController::class,'update'])->name('update');
Route::get('admin/class/delete{id}', [ClassController::class,'delete'])->name('delete');

// Course URLs

Route::get('/admin/course/list', [CourseController::class,'list'])->name('list');
Route::get('/admin/course/create' , [CourseController::class, 'create'])->name('create');
Route::post('/admin/course/create' , [CourseController::class, 'insert'])->name('insert');
Route::get('/admin/course/edit{id}' , [CourseController::class, 'edit'])->name('edit');
Route::post('/admin/course/edit{id}' , [CourseController::class, 'update'])->name('update');
Route::get('/admin/course/delete{id}' , [CourseController::class, 'delete'])->name('delete');

// Assign subject URLs

Route::get('/admin/assign_subject/list', [ClassSubjectController::class,'list'])->name('list');
Route::get('/admin/assign_subject/create' , [ClassSubjectController::class, 'create'])->name('create');
Route::post('/admin/assign_subject/create' , [ClassSubjectController::class, 'insert'])->name('insert');
Route::get('/admin/assign_subject/edit{id}' , [ClassSubjectController::class, 'edit'])->name('edit');
Route::post('/admin/assign_subject/edit{id}' , [ClassSubjectController::class, 'update'])->name('update');
Route::get('/admin/assign_subject/delete{id}' , [ClassSubjectController::class, 'delete'])->name('delete');
Route::get('/admin/assign_subject/edit_single{id}', [ClassSubjectController::class, 'edit_single'])->name('edit_single');

Route::get('/admin/change_password', [UserController::class, 'change_password'])->name('change_password');
Route::post('/admin/change_password', [UserController::class, 'postChange_password'])->name('postChange_password');

//student
Route::get('admin/admin/student/list', [StudentController::class, 'list'])->name('list');
Route::get('admin/admin/student/add', [StudentController::class, 'add'])->name('add');  
Route::post('/admin/admin/student/add', [StudentController::class, 'post_add'])->name('post_add');  
Route::get('/admin/admin/student/edit{id}' , [StudentController::class, 'edit'])->name('edit');   
Route::post('/admin/admin/student/edit{id}', [StudentController::class, 'update'])->name('update'); 
Route::get('/admin/admin/student/delete{id}' , [StudentController::class, 'delete'])->name('delete');

//Parent Route
Route::get('/admin/admin/parent/list', [ParentController::class, 'list'])->name('list');
Route::get('admin/admin/parent/add', [ParentController::class, 'add'])->name('add');
Route::post('admin/admin/parent/add', [ParentController::class,'post_add'])->name('post_add');
Route::get('admin/admin/parent/edit{id}', [ParentController::class, 'edit'])->name('edit');
Route::post('admin/admin/parent/edit{id}', [ParentController::class, 'update'])->name('update');
Route::get('/admin/admin/parent/delete{id}' , [ParentController::class, 'delete'])->name('delete');
Route::get('/admin/admin/my_student{id}' , [ParentController::class, 'my_student'])->name('my_student');
Route::get('admin/admin/parent/assign_parent_student{student_id}/{parent_id}' , [ParentController::class, 'AssignParentStudent'])->name('AssignParentStudent');
Route::get('admin/admin/parent/assign_parent_student_delete{id}' , [ParentController::class, 'AssignParentStudentDelete'])->name('AssignParentStudentDelete');

//Teacher
Route::get('/admin/admin/teacher/list', [TeacherController::class, 'list'])->name('list');
Route::get('/admin/admin/teacher/add', [TeacherController::class, 'add'])->name('add');
Route::post('/admin/admin/teacher/add', [TeacherController::class, 'postadd'])->name('postadd');
Route::get('/admin/admin/teacher/edit{id}', [TeacherController::class, 'edit'])->name('edit');
Route::post('/admin/admin/teacher/edit{id}', [TeacherController::class, 'update'])->name('update');
Route::get('/admin/admin/teacher/delete{id}', [TeacherController::class, 'delete'])->name('delete');

//Exams

Route::get('/admin/Exams/list', [ExamController::class,'list'])->name('list');
Route::get('/admin/Exams/create' , [ExamController::class, 'create'])->name('create');
Route::post('/admin/Exams/create' , [ExamController::class, 'insert'])->name('insert');
Route::get('/admin/Exams/edit{id}' , [ExamController::class, 'edit'])->name('edit');
Route::post('/admin/Exams/edit{id}' , [ExamController::class, 'update'])->name('update');
Route::get('/admin/Exams/delete{id}' , [ExamController::class, 'delete'])->name('delete');
Route::get('/admin/Exams/edit_single{id}', [ExamController::class, 'edit_single'])->name('edit_single');



Route::group(['middleware' => 'admin'], function(){
    Route::get('/admin/dashboard' , [DashboardController::class, 'dashboard']);
    Route::get('admin/admin/list', [AdminController::class, 'list']);
    Route::get('admin/admin/create', [AdminController::class,'create'])->name('create');
    Route::post('admin/admin/create', [AdminController::class,'postcreate'])->name('postcreate');
    Route::get('admin/admin/list', [AdminController::class, 'list']);
    Route::get('admin/admin/edit{id}', [AdminController::class, 'edit']);
    Route::post('admin/admin/edit{id}', [AdminController::class,'update']);
    Route::get('admin/admin/delete{id}', [AdminController::class, 'delete']);

    Route::get('admin/account', [AdminController::class, 'myaccount'])->name('myaccount');
    Route::post('admin/account', [AdminController::class, 'updateacc'])->name('updateacc');
});

Route::group(['middleware' => 'teacher'], function(){
    Route::get('/teacher/dashboard' , [DashboardController::class, 'dashboard']);

    Route::get('/teacher/change_password', [UserController::class])->name('change_password');
    Route::post('/teacher/change_password', [UserController::class])->name('postChange_password');
    Route::get('teacher/account', [UserController::class, 'myaccount'])->name('myaccount');
    Route::post('teacher/account', [UserController::class, 'update'])->name('update');
  
});


Route::group(['middleware' => 'student'], function(){
     
    Route::get('/student/dashboard' , [DashboardController::class, 'dashboard']);

    Route::get('/student/change_password', [UserController::class])->name('change_password');
    Route::post('/student/change_password', [UserController::class])->name('postChange_password');
    Route::get('/student/account', [StudentController::class, 'myaccount'])->name('myaccount');
    Route::post('/student/account', [StudentController::class, 'accountupdate'])->name('accountupdate');
    Route::get('/student/myunits', [StudentController::class, 'myunits'])->name('myunits');
});


Route::group(['middleware' => 'parent'], function(){
     
    Route::get('/parent/dashboard' , [DashboardController::class, 'dashboard']);

    Route::get('/parent/change_password', [UserController::class])->name('change_password');
    Route::post('/parent/change_password', [UserController::class])->name('postChange_password');
    Route::get('/parent/account', [ParentController::class, 'myaccount'])->name('myaccount');
    Route::post('/parent/account', [ParentController::class, 'updateacc'])->name('updateacc');
    Route::get('/parent/mystudent', [ParentController::class, 'mystudent'])->name('mystudent');


});

