<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
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

Route::get('/dashboard', function () {
    return view('dashboard.index');
})->middleware(['auth'])->name('dashboard');

Route::get('/dashboard/my-grades', function () {
    return view('dashboard.student-views.mygrades.index');
})->middleware(['auth'])->name('mygrades');

Route::get('/dashboard/mygrades/add', [DashboardController::class, 'createGrades'])->middleware(['auth'])->name('addgrades');
Route::post('/dashboard/mygrades/add', [DashboardController::class, 'storeGrades'])->middleware(['auth'])->name('storegrades');



require __DIR__.'/auth.php';
