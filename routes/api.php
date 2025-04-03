<?php

use App\Http\Controllers\API\eventController;
use App\Http\Middleware\checkRole;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;




Route::post('/event/create',[eventController::class,'store']);