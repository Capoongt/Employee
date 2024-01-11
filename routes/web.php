<?php

use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\HappyNewYear;
use Illuminate\Support\Facades\Route;
use Illuminate\Routing\Controller;



Route::get('/', function () {
    return view('welcome');
});

Route::get('employee',
[EmployeeController::class, 'index']);

Route::get('happynewyear',
[HappyNewYear::class, 'index']);



// Route::resource('employee', EmployeeController::class) ->only(['index']);
