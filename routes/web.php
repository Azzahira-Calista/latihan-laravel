<?php

use Illuminate\Support\Facades\Route;
use App\http\Controllers\StudentController;
use App\http\Controllers\KelasController;
use App\http\Controllers\AuthController;
use App\http\Controllers\DashboardController;
use Illuminate\Support\Facades\Auth;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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
    return view('home', [
        "title" => "home page"
    ]);
});

Route::get('/about', function () {
    return view('about', [
        "title" => "about page",
        "nama" => "Calista",
        "kelas" => "11 pplg 2",
        "foto" => "images/mie.jpg"
    ]);
});

Route::group(['prefix' => '/students'], function () {

    Route::get('/all', [StudentController::class, 'index']);

    Route::get('/detail/{student}', [StudentController::class, 'show']);

    Route::get('/create', [StudentController::class, 'create']);

    Route::post('/store', [StudentController::class, 'store']); //buat post request (add)

    Route::delete('/delete/{student}', [StudentController::class, 'destroy']);

    Route::get('/{student}/edit', [StudentController::class, 'edit']);

    Route::put('/{student}', [StudentController::class, 'update']);
});

Route::group(["prefix" => "/kelas"], function () {

    Route::get('/all', [KelasController::class, 'index']);

    Route::get('/detail/{kelas}', [KelasController::class, 'show']);

    Route::get('/create', [KelasController::class, 'create']);

    Route::post('/store', [KelasController::class, 'store']);

    Route::get('/edit/{kelas}', [KelasController::class, 'edit']);

    Route::post('/{kelas}', [KelasController::class, 'update']);

    Route::delete('/delete/{kelas}', [KelasController::class, 'destroy']);
});

Route::group(['prefix' => 'auth'], function () {
    Route::get('/login', [AuthController::class, 'login']) ->middleware(['guest']);

    Route::post('/login', [AuthController::class, 'auth']);

    Route::post('/logout', [AuthController::class, 'logout']);

    Route::get('/register', [AuthController::class, 'register']) ->middleware(['guest']);

    Route::post('/register', [AuthController::class, 'store']);
});

Route::group(["prefix" => "/dashboard"], function(){
    Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth']);

    Route::get('/student', [DashboardController::class, 'student'])->middleware(['auth']);

    Route::get('/kelas', [DashboardController::class, 'kelas'])->middleware(['auth']);

    // Route::get('/search', [Dashboard::class, 'search'])->name('search');

});