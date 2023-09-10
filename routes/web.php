<?php

use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\admin\CategoriesController;
use App\Http\Controllers\admin\HomeCategoriesController;
use App\Http\Controllers\admin\SettingsController;
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

Route::get('/admin/login', [AdminController::class, 'login'])->name('admin.login');
Route::post('/admin/access_check', [AdminController::class, 'access_check'])->name('admin.access_check');
Route::get('/admin/logout', [AdminController::class, 'logout'])->name('admin.logout');

Route::group(['middleware' => 'adminlogin', 'prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::get('/', [AdminController::class, "index"])->name("index");
    Route::resource('/categories', CategoriesController::class);
    Route::resource('/settings', SettingsController::class);
    Route::resource('/home-categories', HomeCategoriesController::class);
});
