<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\LoginController as AdminLoginController;
use App\Http\Controllers\Admin\SectionController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\User\Auth\LoginController;
use Illuminate\Support\Facades\Route;


Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('about', [HomeController::class, 'viewAbout'])->name('about');
Route::get('service', [HomeController::class, 'viewService'])->name('service');
Route::get('contact', [HomeController::class, 'viewContact'])->name('contact');


Route::prefix('admin')->middleware('admin.guest')->name('admin.')->group(function () {
    Route::get('login', [AdminLoginController::class, 'showLogin'])->name('login');
    Route::post('admin/login', [AdminLoginController::class, 'login'])->name('login.store');
});

Route::middleware(['admin.auth'])->name('admin.')->prefix('admin')->group(function () {
    Route::post('logout', [AdminLoginController::class, 'logout'])->name('logout');
    Route::get('dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');

    Route::get('section/list', [SectionController::class, 'list'])->name('section.list');
    Route::get('section/edit/banner', [SectionController::class, 'viewBanner'])->name('section.edit.banner');
    Route::get('section/elements/about', [SectionController::class, 'viewAbout'])->name('section.about.edit');
    Route::get('section/edit/feature', [SectionController::class, 'viewFeature'])->name('section.edit.feature');
    Route::get('section/edit/statistic', [SectionController::class, 'viewStatistic'])->name('section.edit.statistic');
    Route::get('section/edit/choose', [SectionController::class, 'viewChoose'])->name('section.edit.choose');
    Route::get('section/edit/service', [SectionController::class, 'viewService'])->name('section.edit.service');
    Route::get('section/edit/project', [SectionController::class, 'viewProject'])->name('section.edit.project');
    Route::get('section/edit/team', [SectionController::class, 'viewTeam'])->name('section.edit.team');
    Route::get('section/edit/testimonial', [SectionController::class, 'viewTestimonial'])->name('section.edit.testimonial');
    Route::get('section/edit/footer', [SectionController::class, 'viewFooter'])->name('section.edit.footer');
    Route::get('section/edit/siteSetting', [SectionController::class, 'siteSetting'])->name('section.edit.siteSetting');
    Route::get('section/edit/breadcrumb', [SectionController::class, 'viewBreadcrumb'])->name('section.edit.breadcrumb');
    Route::post('section/single/save/{key}', [SectionController::class, 'storeSingle'])->name('section.single.update');
    Route::post('section/save/{key}', [SectionController::class, 'store'])->name('section.save');

    Route::put('section/update/{id}', [SectionController::class, 'update'])->name('section.update');
    Route::delete('section/delete/{id}', [SectionController::class, 'delete'])->name('section.delete');
});


Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [LoginController::class, 'login']);
Route::get('register', [RegisterController::class, 'showRegisterForm'])->name('register');
Route::post('register', [RegisterController::class, 'register']);
