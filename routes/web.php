<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\ChatifyController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KonsultasiController;
use App\Http\Controllers\ReportAdminController;
use App\Http\Controllers\ReportPenyuluhController;
use App\Http\Controllers\ReportPemerintahController;

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


Route::get('login', [AuthController::class, 'login'])->name('login');
Route::post('login', [AuthController::class, 'authenticate'])->name('authenticate');
Route::get('logout', [AuthController::class, 'logout'])->name('logout');
Route::get('register', [AuthController::class, 'form_register'])->name('form_register');
Route::post('register', [AuthController::class, 'register'])->name('register');





Route::group(['middleware' => ['auth']], function () {
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::group(['prefix' => 'profile'], function () {
        Route::get('/', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/', [ProfileController::class, 'destroy'])->name('profile.destroy');
    });
});


Route::middleware('petani')->group(function(){
    Route::get('/chat', [ChatController::class, 'index']);
    Route::post('/chat', [ChatController::class, 'store']);
    Route::get('/chat/{id}', [ChatController::class, 'show'])->name('chat.show');
    Route::group(['prefix' => 'dashboard'], function() {
        Route::resource('/pengaduan', ReportController::class);
    });
});

Route::middleware('penyuluh')->group(function(){
    Route::get('/konsultasi-penyuluh', [ChatController::class, 'index2']);
    Route::get('/konsultasi-penyuluh/{id}', [ChatController::class, 'show2']);
    Route::group(['prefix' => 'dashboard'], function() {
        Route::get('/pengaduan-penyuluh/edit/{pengaduan_penyuluh}', [ReportPenyuluhController::class, 'edit2']);
        Route::put('/pengaduan-penyuluh/edit/{pengaduan_penyuluh}', [ReportPenyuluhController::class, 'update2']);
        Route::resource('/pengaduan-penyuluh', ReportPenyuluhController::class);
    });
});

Route::middleware('pemerintah')->group(function(){
    Route::group(['prefix' => 'dashboard'], function() {
        Route::resource('/pengaduan-pemerintah', ReportPemerintahController::class);
    });
});

Route::middleware('admin')->group(function(){
    Route::group(['prefix' => 'dashboard'], function() {
        Route::resource('/pengaduan-admin', ReportAdminController::class);
    });
});

