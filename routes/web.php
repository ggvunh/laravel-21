<?php
use Furbook\Breed;
use Furbook\Cat;
use Illuminate\Support\Facades\Input;

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

Route::get('/', 'CatController@home');
Route::get('/cats','CatController@index');
Route::get('/cats/breeds/{name}', 'CatController@getCatsByBreed');
// view form
Route::get('/cats/create', 'CatController@create');
Route::get('cats/{cat}', 'CatController@show');
// recive data
Route::post('cats', 'CatController@saveCat');
// load data and form
Route::get('cats/{cat}/edit', 'CatController@edit');
// update
Route::put('cats/{cat}', 'CatController@updateCat');
// delete
Route::get('cats/{cat}/delete', 'CatController@destroy');
