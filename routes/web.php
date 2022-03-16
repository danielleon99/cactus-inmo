<?php

use Illuminate\Http\Request;
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
    return redirect()->to("/login");
});

Route::get('/login', function () {
    return view('login');
});

Route::get('/properties', function () {
    return view('properties');
});

Route::get('/register', function () {
    return view('register');
});

Route::get('/todoList/{id}', function () {
    return view('todoList');
});



