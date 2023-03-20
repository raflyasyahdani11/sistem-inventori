<?php

use App\Http\Controllers\WebController;
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

Route::get('/', [WebController::class, 'showDashboard'])->name('dashboard');

Route::prefix('/user')->group(function () {
    Route::get('/list', [WebController::class, 'showListUser'])->name('user.show');
    Route::get('/add', [WebController::class, 'showAddUser'])->name('user.add');
});
