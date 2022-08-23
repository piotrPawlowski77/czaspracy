<?php

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

//Moje routes:
Route::get('/', [App\Http\Controllers\FrontendController::class, 'index'])->name('home');
Route::get('/about', [App\Http\Controllers\FrontendController::class, 'about'])->name('about');
Route::get('/currentShifts', [App\Http\Controllers\FrontendController::class, 'currentShifts'])->name('currentShifts');

//route dla panelu admin (backend)
Route::group(['prefix' => 'admin'], function (){

    Route::get('/', [\App\Http\Controllers\BackendController::class, 'index'])->name('adminHome');
    Route::match(['GET', 'POST'],'/setSchedule', [\App\Http\Controllers\BackendController::class, 'setSchedule'])->name('setSchedule');
    Route::match(['GET', 'POST'],'/schedule', [\App\Http\Controllers\BackendController::class, 'schedule'])->name('schedule');
    Route::match(['GET', 'POST'], '/workPanel/{id?}', [\App\Http\Controllers\BackendController::class, 'workPanel'])->name('workPanel');
    Route::get('/deleteWork/{id}', [\App\Http\Controllers\BackendController::class, 'deleteWork'])->name('deleteWork');

});

//niżej rout-y wygenerowane przez laravel breeze:

//Route::get('/', function () {
//    return view('welcome');
//});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
