<?php

use App\Http\Controllers\ClasseController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\LevelController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SchoolYearsController;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::prefix('niveaux')->group(function () {
        Route::get('/', [LevelController::class, 'index'])->name('niveaux');
    });


    Route::prefix('settings')->group(function () {
        Route::get('/', [SchoolYearsController::class, 'index'])->name('settings');

        Route::get('/create', [SchoolYearsController::class, 'create'])->name('settings.create_school_year');

        Route::get('/create-level', [LevelController::class, 'create'])->name('settings.create_level');

        Route::get('/edit-level/{level}', [LevelController::class, 'edit'])->name('settings.edit_level');

    });

    Route::prefix('classes')->group(function(){
        Route::get('/',[ClasseController::class,'index'])->name('classes');
    });


        Route::resources(['classes'=> ClasseController::class]);
        // use {classe} so route model binding resolves correctly
        Route::get('/edit-classe/{classe}', [ClasseController::class, 'edit'])->name('classes.editer');


        Route::prefix('students')->group(function (){
            Route::get('/',[StudentController::class, 'index'])->name('students');
            Route::get('/create',[StudentController::class, 'create'])->name('student_create');
            Route::get('/edit/{students}',[StudentController::class, 'edit'])->name('student_edit');
        });
});
