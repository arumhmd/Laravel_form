<?php

use App\Http\Controllers\AuthManager;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->name(name:'home');

//Login
Route::get('/login', [AuthManager::class,'login'])->name(name:'login',);
Route::post('/login', [AuthManager::class,'loginpost'])->name(name:'login.post',);
//Register
Route::get('/register',[AuthManager::class,'register'])->name(name:'register');
Route::post('/register',[AuthManager::class,'registerpost'])->name(name:'register.post');

//Logout
Route::get('/logout',[AuthManager::class,'logout'])->name(name:'logout');