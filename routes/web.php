<?php

use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\admin\CategoriesController;
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

Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::get('/', [AdminController::class, "index"])->name("index");
    Route::resource('/categories', CategoriesController::class);
    Route::resource('/settings', SettingsController::class);
});
