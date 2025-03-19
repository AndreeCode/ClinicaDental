<?php

use App\Http\Controllers\API\eventController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::get('/event/show',[eventController::class,'show']);

Route::post('/event/create',[eventController::class,'store']);

