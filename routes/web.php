<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\LoginController as AdminLoginController;
use App\Http\Controllers\Admin\SectionController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\User\Auth\LoginController;
use Illuminate\Support\Facades\Route;


Route::get('/', [HomeController::class, 'index'])->name('home');


Route::prefix('admin')->middleware('admin.guest')->name('admin.')->group(function () {
    Route::get('login', [AdminLoginController::class, 'showLogin'])->name('login');
    Route::post('admin/login', [AdminLoginController::class, 'login'])->name('login.store');
});

Route::middleware(['admin.auth'])->name('admin.')->prefix('admin')->group(function () {
    Route::post('logout', [AdminLoginController::class, 'logout'])->name('logout');
    Route::get('dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');

    Route::get('section/list', [SectionController::class, 'list'])->name('section.list');
    Route::get('section/edit/{key}', [SectionController::class, 'viewEdit'])->name('section.edit');

    Route::get('section/elements/mission/{key}', [SectionController::class, 'viewMultipleMission'])->name('section.mission.edit');
    Route::post('section/content/mission/save/{key}', [SectionController::class, 'storeSingle'])->name('section.single.update');
    Route::post('section/save/{key}', [SectionController::class, 'store'])->name('section.update');
});


Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [LoginController::class, 'login']);
Route::get('register', [RegisterController::class, 'showRegisterForm'])->name('register');
Route::post('register', [RegisterController::class, 'register']);
