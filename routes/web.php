<?php

use App\Http\Controllers\AdminPanel\DashboardController;
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
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard',[DashboardController::class,'index_'])->name('dashboard');
});
route::get('/employees',[DashboardController::class,'index'])->name('employees.index');
route::get('/employees/create',[DashboardController::class,'create'])->name('employees.create');
route::post('/employees',[DashboardController::class,'store'])->name('employees.store');
route::get('/employees/{employee}/edit',[DashboardController::class,'edit'])->name('employees.edit');
route::put('/employees/{employee}',[DashboardController::class,'update'])->name('employees.update');
route::delete('/employees/{employee}',[DashboardController::class,'destroy'])->name('employees.destroy');

route::get('/graph',[DashboardController::class,'graph'])->name('graph');
