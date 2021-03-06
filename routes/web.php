<?php

use App\Http\Controllers\AssessmentsController;
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

include('admin.php');

Route::get('/', HomeController::class)->name('home');
Route::get('/assessments', [AssessmentsController::class, 'index'])->name('assessments.index');
Route::get('/assessments/{assessment}', [AssessmentsController::class, 'show'])->name('assessments.show');

