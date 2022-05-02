<?php

use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Route;


Route::get('/',[HomeController::class,'index'])->middleware('can:Ver dashboard')->name('home');

/* roles */

Route::resource('roles',RoleController::class)->names('roles');

/* users */

Route::resource('users',UserController::class)->only(['index','edit','update'])->names('users');