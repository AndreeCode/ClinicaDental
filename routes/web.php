<?php

use App\Http\Controllers\authController;
use App\Http\Controllers\homeController;
use App\Http\Middleware\checkRole;
use App\Models\Usuario;
use Illuminate\Support\Facades\Route;

Route::get('/dtb',function(){
    dd(Usuario::all());
});

Route::get('/',[homeController::class,'index']);


Route::get('/register',[authController::class,'showRegisterForm'])->name('register.form');
Route::post('/register',[authController::class,'register'])->name('register.submit');
Route::middleware([checkRole::class.':0'])->group(function (){
    Route::get('/login',[authController::class,'showLoginForm'])->name('login.form');
    Route::post('/login',[authController::class,'login'])->name('login.submit');
});

Route::middleware([checkRole::class.':1'])->group(function (){
    Route::get('/dashboard',[authController::class,'showDashboardUser'])->name('dashboard.user');
});

