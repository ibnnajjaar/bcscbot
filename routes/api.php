<?php

use App\Http\Controllers\Api\AssessmentsController;
use App\Http\Controllers\Api\PeriodsController;
use App\Http\Controllers\Api\SubjectsController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group([
    'as' => 'api.'
], function (){

    Route::get('subjects', [SubjectsController::class, 'index'])->name('subjects.index');
    Route::get('periods', [PeriodsController::class, 'index'])->name('periods.index');
    Route::get('assessments', [AssessmentsController::class, 'index'])->name('assessments.index');
});
