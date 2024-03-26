<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;
use App\Livewire\Projects\CreateProject;
use App\Livewire\Projects\ShowProject;

use GuzzleHttp\Middleware;

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
})->middleware(['guest'])->name('login');

Route::post('/login',[AuthController::class, 'authenticate']);
//Route::get('/login/inactive',[AuthController::class, 'inactive'])->name('loginInactiveForm');
Route::get('activate-account',[AuthController::class, 'activateAccount'])->name('loginActivationForm');
Route::post('login-update',[AuthController::class, 'update']);
Route::middleware(['auth'])->group(function(){
    Route::get('dashboard',[AuthController::class, 'dashboard'])->name('dashboard');
    Route::get('logout',[AuthController::class, 'logout'])->name('logout');
    Route::get('/projects/create', CreateProject::class)->name('create-project');
    Route::get('/projects/{slug}', ShowProject::class)->name('show-project');
});

