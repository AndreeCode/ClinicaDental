<?php

use App\Http\Controllers\API\eventController;
use App\Http\Middleware\checkRole;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::get('/event/show',[eventController::class,'show']);

Route::post('/event/create',[eventController::class,'store']);
Route::middleware([checkRole::class.':1'])->group(function(){

    Route::put('',[eventController::class,'update']);
    Route::delete('',[eventController::class,'destroy']);
});
