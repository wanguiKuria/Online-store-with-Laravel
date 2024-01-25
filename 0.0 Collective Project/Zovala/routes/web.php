<?php

use App\Http\Controllers\RoleController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    //return view('test');
    echo"<h1>Default Request</h1>";
});
Route::get('jaribu', function () {
    //return view('jaribu');
    echo"<h1>Default Request</h1>";
});


//Roles routes

Route::get('roles',[RoleController::class,'all']);

Route::get('role/add',[RoleController::class,'add']);
Route::post('role/save',[RoleController::class,'save']);
Route::post('role/saveChanges/{id}',[RoleController::class,'saveChanges']);
Route::get('role/edit/{id}',[RoleController::class,'edit']);
Route::get('role/delete/{id}',[RoleController::class,'delete']);
//users
Route::get('users',[UserController::class,'all']);