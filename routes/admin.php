<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserController;

//El primer parametro esta vacio porque hemos puesto un prefijo en RouteServiceProvider para admin
//En name la ruta es admin.home pero en RouteServiceProvider hemos añadido el metodo name y todas las rutas tendran delante admin.
Route::get('', [HomeController::class, 'index'])->middleware('can:Ver dashboard')->name('home');

Route::resource('roles', RoleController::class)->names('roles');

Route::resource('users', UserController::class)->only(['index', 'edit', 'update'])->names('users');
