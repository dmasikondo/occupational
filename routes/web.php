<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;

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
    return view('welcome');
})->name('login');

Route::post('/login',[AuthController::class, 'authenticate']);
//Route::get('/login/inactive',[AuthController::class, 'inactive'])->name('loginInactiveForm');
Route::get('activate-account',[AuthController::class, 'activateAccount'])->name('loginActivationForm');
Route::post('login-update',[AuthController::class, 'update']);
Route::get('dashboard',[AuthController::class, 'dashboard'])->middleware(['auth'])->name('dashboard');
Route::get('logout',[AuthController::class, 'logout'])->middleware(['auth'])->name('logout');
