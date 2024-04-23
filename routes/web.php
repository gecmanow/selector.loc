<?php

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
});

Route::group(['namespace' => 'App\Http\Controllers'], function()
{
    Route::get('/bot', 'BotController@index')->name('bot.index');


    Route::get('/actions', 'ActionController@index')->name('actions.index');
    Route::post('/actions', 'ActionController@store')->name('actions.store');
    Route::get('/actions/{action}', 'ActionController@show')->name('actions.show');
    Route::get('/actions/{action}/edit', 'ActionController@edit')->name('actions.edit');
    Route::match(['PUT', 'PATCH'],'/actions/{action}', 'ActionController@update')->name('actions.update');
    Route::delete('/actions/{action}/delete', 'ActionController@delete')->name('actions.delete');

    Route::get('/departments', 'DepartmentController@index')->name('departments.index');
    Route::post('/departments', 'DepartmentController@store')->name('departments.store');
    Route::get('/departments/{department}', 'DepartmentController@show')->name('departments.show');
    Route::get('/departments/{department}/edit', 'DepartmentController@edit')->name('departments.edit');
    Route::match(['PUT', 'PATCH'],'/departments/{department}', 'DepartmentController@update')->name('departments.update');
    Route::delete('/departments/{department}/delete', 'DepartmentController@delete')->name('departments.delete');

    Route::get('/workers', 'WorkerController@index')->name('workers.index');
    Route::post('/workers', 'WorkerController@store')->name('workers.store');
    Route::get('/workers/{worker}', 'WorkerController@show')->name('workers.show');
    Route::get('/workers/{worker}/edit', 'WorkerController@edit')->name('workers.edit');
    Route::match(['PUT', 'PATCH'],'/workers/{worker}', 'WorkerController@update')->name('workers.update');
    Route::delete('/workers/{worker}/delete', 'WorkerController@delete')->name('workers.delete');
});
