<?php

use App\Http\Controllers\authController;
use App\Http\Controllers\homeController;
use Illuminate\Support\Facades\Route;

Route::get('/',[homeController::class,'index']);

Route::get('/login',[authController::class,'showLoginForm']);
Route::get('/register',[authController::class,'showRegisterForm']);

