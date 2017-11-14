<?php

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
    return redirect('/cats');
});

Route::get('/cats/{id}', function($id){
    return $id;
});

Route::get('/cats', function(){
    $number = 10;
    $numberBreed = 20;
    return view('about', compact('number', 'numberBreed'));
});
