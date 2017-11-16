<?php
use Furbook\Breed;
use Furbook\Cat;

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
    $cats = Cat::all();
    // dd($cats[0]->breed->name);
    return view('cats.index', compact('cats'));
});

Route::get('/cats/breeds/{name}', function($name){
  $breed = Breed::with('cats')
    ->whereName($name) // ->where('name', $name)
    ->first();
  $cats = $breed->cats;

  return view('cats.index', compact('breed', 'cats'));
});

Route::get('cats/{id}', function($id){
  $cat = Cat::find($id);
  return view('cats.show', compact('cat'));
});
