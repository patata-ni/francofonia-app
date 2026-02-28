<?php

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

Route::get('/', function () {
    return redirect()->route('participants.index');
});

use App\Http\Controllers\ParticipantController;
use App\Http\Controllers\StandController;

Route::resource('participants', ParticipantController::class);
Route::resource('stands', StandController::class);

// endpoint to register visit from QR (GET parameters code and stand)
Route::get('visit', [ParticipantController::class, 'visit'])->name('visit');
