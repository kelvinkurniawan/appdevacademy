<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\RoomController;

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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware' => 'auth'], function () {
	Route::resource('user', 'App\Http\Controllers\UserController', ['except' => ['show']]);
	Route::get('profile', ['as' => 'profile.edit', 'uses' => 'App\Http\Controllers\ProfileController@edit']);
	Route::put('profile', ['as' => 'profile.update', 'uses' => 'App\Http\Controllers\ProfileController@update']);
	Route::get('upgrade', function () {return view('pages.upgrade');})->name('upgrade');
    Route::get('map', function () {return view('pages.maps');})->name('map');
    Route::get('icons', function () {return view('pages.icons');})->name('icons');
    Route::get('table-list', function () {return view('pages.tables');})->name('table');
	Route::put('profile/password', ['as' => 'profile.password', 'uses' => 'App\Http\Controllers\ProfileController@password']);

    Route::get('/manage/rooms', ['as' => 'admin.room.manage', 'uses' => 'App\Http\Controllers\RoomController@index']);
    Route::get('/manage/rooms/{id}', ['as' => 'admin.room.manage.detail', 'uses' => 'App\Http\Controllers\RoomController@roomDetailTeacher']);

    // Student
    Route::get('/my/room', ['as' => 'student.room.manage', 'uses' => 'App\Http\Controllers\RoomController@indexStudent']);
    Route::get('/my/room/{id}', ['as' => 'room.student.detail', 'uses' => 'App\Http\Controllers\RoomController@roomDetailStudent']);

});

