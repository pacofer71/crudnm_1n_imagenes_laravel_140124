<?php

use App\Http\Controllers\DepartamentController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Models\Departament;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::resource('users', UserController::class);
Route::resource('roles', RoleController::class);
Route::resource('departaments', DepartamentController::class);
