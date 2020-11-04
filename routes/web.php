<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

// Route::get('/welcome', function () {
//     return view('welcome');
// });

Route::get('/', 'IndexController@index');

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

Route::middleware(['auth'])->group(function() {

    Route::get('/deploy', 'IndexController@deploy');
    Route::post('/deploy', 'ConsoleController@deploy');

    Route::get('/servers', 'ConsoleController@get_servers');

    Route::get('/servers/startup/{id}', 'IndexController@startup');
    Route::post('/servers/startup/{id}', 'ApplicationController@startup');
    
    Route::get('/servers/file-manager/{id}', 'ConsoleController@file_manager');
    Route::post('/servers/file-manager/{id}', 'ConsoleController@file_upload');

    Route::get('/servers/view/{id}', 'ViewController@index')->name('console');

    Route::get('/servers/start/{id}', 'ApplicationController@start');
    Route::get('/servers/restart{id}', 'ApplicationController@restart');
    Route::get('/servers/stop{id}', 'ApplicationController@stop');
    Route::get('/servers/kill{id}', 'ApplicationController@kill');
});
