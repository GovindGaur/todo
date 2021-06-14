<?php
use Illuminate\Support\Facades\Cache;
Route::get('/cache', function () {
    return Cache::get('dsaf');
});
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
Route::get('/index','ToDoController@index');
Route::get('/create','ToDoController@create');
Route::post ('/upload_data','ToDoController@upload');
Route::get('/edit/{id}','ToDoController@edit');
Route::post('/update','ToDoController@update');
Route::get('/completed/{id}','ToDoController@completed');
Route::get('/delete/{id}','ToDoController@delete');
Route::get('/profile','ToDoController@profile');