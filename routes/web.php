<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ListController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TrendPostController;
use App\Models\Category;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    // Route::get('/dashboard', function () {
    //     return view('admin.profile.index');
    // })->name('dashboard');
    Route::get('dashboard',[ProfileController::class,'index'])->name('dashboard');
    Route::get('dashboard',[ListController::class,'index'])->name('admin#list');
    Route::get('dashboard',[CategoryController::class,'index'])->name('admin#category');
    Route::get('dashboard',[PostController::class,'index'])->name('admin#post');
    Route::get('dashboard',[TrendPostController::class,'index'])->name('admin#trend');

});
