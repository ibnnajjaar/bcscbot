<?php

use App\Http\Controllers\Admin\AssessmentsController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\PeriodsController;
use App\Http\Controllers\Admin\SubjectsController;
use App\Http\Controllers\HomeController;
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

Route::get('/', HomeController::class);

Route::group([
        'middleware' => [
            'auth:sanctum',
            'verified',
        ],
    ], function () {

    Route::get('/dashboard', DashboardController::class)->name('dashboard');

    Route::group([
        'as' => 'admin.'
    ], function () {

        Route::resource('subjects', SubjectsController::class)->except('show');
        Route::resource('periods', PeriodsController::class)->except('show');
        Route::resource('assessments', AssessmentsController::class)->except('show');

    });
});
