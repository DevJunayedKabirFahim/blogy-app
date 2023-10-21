<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WebsiteController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\VisitorAuthController;
use App\Http\Controllers\VisitorProfileController;

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

Route::get('/', [WebsiteController::class, 'index'])->name('home');
Route::get('/blog-category/{id}', [WebsiteController::class, 'category'])->name('blog-category');
Route::get('/blog-detail/{id}', [WebsiteController::class, 'detail'])->name('blog-detail');
Route::get('/user-login', [VisitorAuthController::class, 'index'])->name('user-login');
Route::post('/user-login', [VisitorAuthController::class, 'login'])->name('user-login');
Route::post('/user-register', [VisitorAuthController::class, 'register'])->name('user-register');

Route::middleware(['visitor'])->group(function (){
    Route::get('/my-dashboard', [VisitorAuthController::class, 'dashboard'])->name('my-dashboard');
    Route::get('/user-logout', [VisitorAuthController::class, 'logout'])->name('user-logout');
    Route::get('/my-profile', [VisitorProfileController::class, 'index'])->name('my-profile');
    Route::get('/my-comment', [VisitorProfileController::class, 'comment'])->name('my-comment');
    Route::get('/change-password', [VisitorProfileController::class, 'changePassword'])->name('change-password');
});

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified',])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/category/add', [CategoryController::class, 'index'])->name('category.add');
    Route::get('/category/manage', [CategoryController::class, 'manage'])->name('category.manage');
    Route::get('/category/edit/{id}', [CategoryController::class, 'edit'])->name('category.edit');
    Route::post('/category/update/{id}', [CategoryController::class, 'update'])->name('category.update');
    Route::get('/category/delete/{id}', [CategoryController::class, 'destroy'])->name('category.delete');
    Route::post('/category/store', [CategoryController::class, 'store'])->name('category.store');

    Route::get('/blog/add', [BlogController::class, 'index'])->name('blog.add');
    Route::post('/blog/store', [BlogController::class, 'store'])->name('blog.store');
    Route::get('/blog/manage', [BlogController::class, 'manage'])->name('blog.manage');
    Route::get('/blog/edit/{id}', [BlogController::class, 'edit'])->name('blog.edit');
    Route::post('/blog/update/{id}', [BlogController::class, 'update'])->name('blog.update');
    Route::get('/blog/delete/{id}', [BlogController::class, 'destroy'])->name('blog.delete');
});
