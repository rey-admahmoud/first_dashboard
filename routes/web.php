<?php

use App\Http\Controllers\AddsubjecttostudentController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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




Route::get('admin/', function () {
    return view('admin.index');
});



Route::group(['prefix'=>'admin'],function(){

    Route::get('students.archive',[StudentController::class,'archive'])->name('students.archive');

    Route::post('students.restore/{ssn}',[StudentController::class,'restore'])->name('students.restore');

    Route::delete('students.forcedelete/{ssn}',[StudentController::class,'forcedelete'])->name('students.forcedelete');

    Route::resource('students',StudentController::class);
    
});



Route::group(['prefix'=>'admin'],function(){  
    Route::get('departments/archive',[DepartmentController::class,'archive'])->name('departments.archive');

    Route::post('departments/restore/{id}',[DepartmentController::class,'restore'])->name('departments.restore');

    Route::post('departments/delete/{id}',[DepartmentController::class,'forcedelete'])->name('departments.delete');

    Route::resource('departments',DepartmentController::class);

});


Route::group(['prefix'=>'admin'],function(){  
    Route::post('subjects/restore/{id}',[SubjectController::class,'restoreSubject'])->name('subjects.restore');

    Route::get('subjects/archive',[SubjectController::class,'archive'])->name('subjects.archive');

    Route::delete('subjects/delete/{id}',[SubjectController::class,'forcedelete'])->name('subjects.delete');

    Route::resource('subjects',SubjectController::class);
});

Route::group(['prefix'=>'admin'],function(){  
    Route::get('subject_student',[AddsubjecttostudentController::class,'index'])->name('subject_student.index');
    
    Route::post('subject_student/create',[AddsubjecttostudentController::class,'create'])->name('subject_student.create');

});




Route::get('home',[UserController::class,'home'])->name('home');

Route::get('login',[AuthController::class,'login'])->name('login');

Route::get('register',[AuthController::class,'register'])->name('register');

Route::post('register',[AuthController::class,'handleregister'])->name('handleregister');

Route::post('checklogin',[AuthController::class,'handlelogin'])->name('handlelogin');

Route::get('logout',[AuthController::class,'logout'])->name('logout');
