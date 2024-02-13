<?php

use App\Http\Controllers\EventController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/event/{name}', function () {
//     return view('frontdesk-user.index')->name('event');
// });
Route::get('/', [EventController::class, 'socketTest'])->name('socket-test');
Route::get('/event', [EventController::class, 'index'])->name('index');

Route::post('/event/store', [EventController::class, 'store'])->name('event');
// Route::get('/', [FormController::class, 'index']);