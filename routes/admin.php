<?php

use App\Http\Controllers\Admin\AssessmentsController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\PeriodsController;
use App\Http\Controllers\Admin\SubjectsController;
use App\Http\Controllers\Admin\UsersController;

Route::group([
    'prefix' => 'admin',
    'middleware' => [
        'auth:sanctum',
        'verified',
    ],
], function () {

    Route::get('/dashboard', DashboardController::class)->name('dashboard');

    Route::group([
        'as' => 'admin.',
    ], function () {

        Route::resource('users', UsersController::class)->except('show');
        Route::resource('subjects', SubjectsController::class)->except('show');
        Route::resource('periods', PeriodsController::class)->except('show');
        Route::resource('assessments', AssessmentsController::class)->except('show');

    });
});
