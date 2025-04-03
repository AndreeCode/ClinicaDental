<?php

use App\Http\Controllers\API\eventController;
use App\Http\Controllers\authController;
use App\Http\Controllers\homeController;
use App\Http\Middleware\checkRole;
use App\Models\User;
use Illuminate\Support\Facades\Route;

Route::get('/dtb',function(){
    dd(User::all());
});

Route::get('/',[homeController::class,'index']);


Route::get('/register',[authController::class,'showRegisterForm'])->name('register.form');
Route::post('/register',[authController::class,'register'])->name('register.submit');
Route::middleware([checkRole::class.':0'])->group(function (){
    
        Route::get('/login',[authController::class,'showLoginForm'])->name('login');
        Route::post('/login',[authController::class,'login'])->name('login.submit');
    
});

Route::middleware([checkRole::class.':1'])->group(function (){
    Route::prefix('api')->group(function(){
        Route::get('/event/show',[eventController::class,'show']);
        Route::put('/event/{event}',[eventController::class,'update']);
    Route::delete('/event/{id}',[eventController::class,'destroy']);

    });

    Route::get('/dashboard/{dash?}',[authController::class,'showDashboardUser'])->whereIn('dash',['citar','usuario','historial'])->name('dashboard.user');
    Route::post('/logout',[authController::class,'logout'])->name('logout.submit');
});

Route::get('/edit',function (){
    $user=User::find(1);
    $user->telefono='951286673';
    $user->rol='admin';
    $user->save();
    dd($user);
});