<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\DashboardController;
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

Route::get('/', [AuthController::class, 'Index']);
Route::post('/sign-in', [AuthController::class, 'SignIn']);

Route::get('/dashboard', [DashboardController::class, 'IndexDashboard']);

Route::prefix('/dashboard')->group(function () {
    Route::get('', [DashboardController::class, 'IndexDashboard']);
    Route::get('/{user_id}', [DashboardController::class, 'EditDasboardPage']);
    Route::post('/update-user/{user_id}', [DashboardController::class, 'EditDasboard']);
    Route::get('/delete-user/{user_id}', [DashboardController::class, 'DeleteDasboard']);
});