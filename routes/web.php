<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // Home/ User
    Route::get('/user_appointments', [HomeController::class, 'user_appointments']);
    Route::delete('/cancel_appointment/{id}', [HomeController::class, 'cancel_appointment']);
    Route::get('/home', [HomeController::class, 'redirect']);
    // Admin
    Route::get('/get_doctors', [AdminController::class, 'get_doctors']);
    Route::get('/add_doctor_view/{id?}', [AdminController::class, 'add_doctor_view']);
    Route::post('/save_doctor', [AdminController::class, 'save_doctor']);
    Route::get('/get_appointments', [AdminController::class, 'get_appointments']);
    Route::get('/approve_appointment/{id}', [AdminController::class, 'approve_appointment']);
    Route::get('/disapprove_appointment/{id}', [AdminController::class, 'disapprove_appointment']);
});

// Visitor
Route::get('/', [HomeController::class, 'index']);
Route::post('/appointment', [HomeController::class, 'appointment']);

