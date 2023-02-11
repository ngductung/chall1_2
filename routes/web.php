<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\AssignmentController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ChallengeController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\TurnInAssController;
use Illuminate\Support\Facades\Route;



Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'processLogin'])->name('process_login');
Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::put('/register', [AccountController::class, 'store'])->name('create');


Route::group([
    'middleware' => 'signIn',
], function () {

    //logout
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
    //home
    Route::get('', [AccountController::class, 'index'])->name('index');
    Route::get('/message', [MessageController::class, 'index'])->name('message');
    Route::post('/message/{receive_user}', [MessageController::class, 'store'])->name('saveMessage');
    Route::get('/detail/{username}', [AccountController::class, 'show'])->name('detail');
    Route::get('/edit/{id}', [MessageController::class, 'edit'])->name('editMess');
    Route::put('/update/{messageID}', [MessageController::class, 'update'])->name('updateMess');
    Route::delete('/delete/{messageID}', [MessageController::class, 'destroy'])->name('deleteMess');
    Route::get('editMyI4', [AccountController::class, 'editMyI4'])->name('editMyI4');
    Route::put('updateMyI4', [AccountController::class, 'updateMyI4'])->name('updateMyI4');


    //Assignment
    Route::get('assignment', [AssignmentController::class, 'index'])->name('assignment');
    Route::get('detailAssignment/{idAss}', [AssignmentController::class, 'show'])->name('detailAss');
    Route::get('download/{IDAss}', [AssignmentController::class, 'download'])->name('downloadAssignment');



    //Challenge
    Route::get('challenge', [ChallengeController::class, 'index'])->name('challenge');
    Route::get('detailChallenge/{id}', [ChallengeController::class, 'show'])->name('detailChall');
    Route::post('submitFlag/{idChall}', [ChallengeController::class, 'processFlag'])->name('submitFlag');




    //Role teacher
    Route::group(['prefix' => 'teacher'], function () {


        Route::get('create', [AccountController::class, 'create'])->name('teacher.create');
        Route::post('create', [AccountController::class, 'store'])->name('teacher.store');
        Route::get('edit/{username}', [AccountController::class, 'edit'])->name('teacher.edit');
        Route::delete('destroy/{username}', [AccountController::class, 'destroy'])->name('teacher.destroy');
        Route::put('update', [AccountController::class, 'update'])->name('teacher.update');

        //assignment
        Route::get('/createAssignment', [AssignmentController::class, 'create'])->name('teacher.createAssignment');
        Route::post('/createAssignment', [AssignmentController::class, 'store'])->name('teacher.storeAssignment');
        Route::get('/editAssignment/{IDAss}', [AssignmentController::class, 'edit'])->name('teacher.editAss');
        Route::post('/editAssignment', [AssignmentController::class, 'update'])->name('teacher.updateAss');
        Route::delete('/deleteAssignment/{ID}', [AssignmentController::class, 'destroy'])->name('teacher.deleteAss');
        Route::get('/downloadFile/{IDAss}', [TurnInAssController::class, 'download'])->name('teacher.downloadAss');

        //Challenge
        Route::get('createChallenge', [ChallengeController::class, 'create'])->name('teacher.createChall');
        Route::post('createChallenge', [ChallengeController::class, 'store'])->name('teacher.storeChall');
        Route::delete('destroy', [ChallengeController::class, 'destroy'])->name('teacher.destroyChall');
    });


    //Role Student
    Route::group(['prefix' => 'student'], function () {
        Route::put('update', [AccountController::class, 'update'])->name('student.update');
        Route::post('turnInAssignment', [TurnInAssController::class, 'store'])->name('student.turnInAss');
    });
});
