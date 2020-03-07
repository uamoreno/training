<?php

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


Route::resource('/notebooks','NotebookController');
Route::resource('/notebooks/{notebook}/notes','NoteController');

Route::get('/',function(){
    return view('auth.login');
});


Route::get('/login',function(){;
    return view('auth.login');
});

Route::post('login','Auth\LoginController@login')->name('login');
Route::get('logout', 'Auth\LoginController@logout');

Route::post('/notebooks/remove', 'NotebookController@remove');
Route::post('/notebooks/{notebook}/notes/remove', 'NoteController@remove');
