<?php

use App\Http\Controllers\PermissionsController;
use App\Http\Controllers\ProfilesController;
use App\Http\Controllers\RolesController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Models\Profile;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
*/

Route::controller(UserController::class)->group(function () {
    Route::get('users', 'index'); //Para obtener todos
    Route::get('users/{id}', 'show'); //Para consultar especifico
    Route::post('users', 'store'); //Para guardar
    Route::put('users/{id}', 'update'); //Para actualizar
    Route::delete('users/{id}', 'destroy'); //Para eliminar un registro
});

Route::controller(PermissionsController::class)->group(function () {
    Route::get('permissions', 'index'); //Para obtener todos
    Route::get('permissions/{id}', 'show'); //Para consultar especifico
    Route::post('permissions', 'store'); //Para guardar
    Route::put('permissions/{id}', 'update'); //Para actualizar
    Route::delete('permissions/{id}', 'destroy'); //Para eliminar un registro
});

Route::controller(ProfilesController::class)->group(function () {
    Route::get('profiles', 'index'); //Para obtener todos
    Route::get('profiles/{id}', 'show'); //Para consultar especifico
    Route::post('profiles', 'store'); //Para guardar
    Route::put('profiles/{id}', 'update'); //Para actualizar
    Route::delete('profiles/{id}', 'destroy'); //Para eliminar un registro
});

Route::controller(RolesController::class)->group(function () {
    Route::get('roles', 'index'); //Para obtener todos
    Route::get('roles/{id}', 'show'); //Para consultar especifico
    Route::post('roles', 'store'); //Para guardar
    Route::put('roles/{id}', 'update'); //Para actualizar
    Route::delete('roles/{id}', 'destroy'); //Para eliminar un registro
});
