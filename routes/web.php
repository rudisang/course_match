<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\AdminDashboardController;
use App\Models\User;
use App\Models\Program;
use Illuminate\Validation\Rule;
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

Route::get('/dashboard', [DashboardController::class, 'dashboard'])->middleware(['auth'])->name('dashboard');


//admin Routes
Route::group(['prefix' => 'admin', 'middleware' => ['auth']], function () {
    
    Route::get('/programs', [AdminDashboardController::class, 'allPrograms'])->name('programs');
    Route::delete('/programs/{id}/delete', [AdminDashboardController::class, 'destroyProgramRequirement'])->name('deleterequirement');
    Route::post('/program/add', [AdminDashboardController::class, 'addProgram'])->name('addprogram');
    Route::post('/requirement/add', [AdminDashboardController::class, 'addProgramRequirement'])->name('addrequirement');
});

Route::get('/dashboard/my-grades', function () {
    return view('dashboard.student-views.mygrades.index');
})->middleware(['auth'])->name('mygrades');

Route::get('/dashboard/my-grades', function () {
    return view('dashboard.student-views.mygrades.index');
})->middleware(['auth'])->name('mygrades');

Route::get('/dashboard/program/{id}', [DashboardController::class, 'showProgram'])->middleware(['auth'])->name('showprogram');
Route::get('/dashboard/mygrades/add', [DashboardController::class, 'createGrades'])->middleware(['auth'])->name('addgrades');
Route::post('/dashboard/mygrades/add', [DashboardController::class, 'storeGrades'])->middleware(['auth'])->name('storegrades');



require __DIR__.'/auth.php';
