<?php

use App\Http\Controllers\Admin\Auth\ChangePasswordController;
use App\Http\Controllers\Admin\Auth\LoginController as AdminLoginController;
use App\Http\Controllers\Admin\Auth\PasswordResetController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ForgetPasswordController;
use App\Http\Controllers\Admin\SectionController;
use App\Http\Controllers\Admin\ResetPasswordController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\User\Auth\LoginController;
use App\Http\Controllers\User\Auth\RegisterController;
use App\Http\Controllers\User\DashboardController as UserDashboardController;
use Illuminate\Support\Facades\Route;



Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('about', [HomeController::class, 'viewAbout'])->name('about');
Route::get('service', [HomeController::class, 'viewService'])->name('service');
Route::get('contact', [HomeController::class, 'viewContact'])->name('contact');


Route::prefix('admin')->middleware('admin.guest')->name('admin.')->group(function () {
    Route::get('login', [AdminLoginController::class, 'showLogin'])->name('login');
    Route::post('login', [AdminLoginController::class, 'login'])->name('login.store');
    Route::get('password/forgot', [ForgetPasswordController::class, 'showLinkRequestForm'])->name('password.forget');
    Route::post('password/email', [ForgetPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
    Route::get('password/reset/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');
    Route::post('password/reset', [ResetPasswordController::class, 'reset'])->name('password.update');
});

Route::middleware(['admin.auth'])->name('admin.')->prefix('admin')->group(function () {
    Route::post('logout', [AdminLoginController::class, 'logout'])->name('logout');
    Route::get('dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');
    Route::get('change-password', [ChangePasswordController::class, 'showChangePassword'])->name('show.password.change');
    Route::post('password/change', [ChangePasswordController::class, 'changePassword'])->name('password.change');
    Route::get('user/list', [DashboardController::class, 'viewUserList'])->name('user.list');
    Route::post('add_balance/send/{id}', [DashboardController::class, 'balanceSend'])->name('addBalance.send');
    Route::post('subtract/balance/{id}',  [DashboardController::class, 'balanceSubtract'])->name('subtract.balance');
    Route::get('pending/deposit/list', [DashboardController::class, 'pendingDeposit'])->name('deposit.pending');
    Route::post('pending/deposit/accept/{id}', [DashboardController::class, 'depositAccept'])->name('deposit.accept');
    Route::post('pending/deposit/reject/{id}', [DashboardController::class, 'rejectDeposit'])->name('deposit.reject');
    Route::get('success/deposit', [DashboardController::class, 'successDeposit'])->name('deposit.success');
    Route::get('reject/deposit/page', [DashboardController::class, 'showRejectDeposit'])->name('show.reject.deposit');
    


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

Route::middleware('guest')->group(function () {
    Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('login', [LoginController::class, 'login']);
    Route::get('register', [RegisterController::class, 'showRegisterForm'])->name('register');
    Route::post('register', [RegisterController::class, 'register']);
});
Route::prefix('user/')->middleware('auth')->name('user.')->group(function () {
    Route::get('dashboard', [UserDashboardController::class, 'dashboard'])->name('dashboard');
    Route::get('transaction', [UserDashboardController::class, 'transaction'])->name('transaction');
    Route::get('send/money', [UserDashboardController::class, 'viewSendMoney'])->name('view.send.money');
    Route::post('send/money', [UserDashboardController::class, 'sendMoney'])->name('send.money');
    Route::get('send/money/history', [UserDashboardController::class, 'sendMoneyHistory'])->name('send.money.history');
    Route::get('deposit', [UserDashboardController::class, 'viewDeposit'])->name('view.deposit');
    Route::post('send/deposit/request', [UserDashboardController::class, 'sendDeposit'])->name('send.deposit.request');
    Route::post('logout', [LoginController::class, 'logout'])->name('logout');
});
