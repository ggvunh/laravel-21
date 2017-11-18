<?php

namespace Furbook\Http\Controllers;

use Illuminate\Http\Request;
use Furbook\Cat;
use Furbook\Breed;
use Illuminate\Support\Facades\Input;

class CatController extends Controller
{
    public function home()
    {
      return redirect('/cats');
    }

    public function index()
    {
      $cats = Cat::all();
      return view('cats.index', compact('cats'));
    }

    public function getCatsByBreed($name)
    {
      $breed = Breed::with('cats')
        ->whereName($name) // ->where('name', $name)
        ->first();
      $cats = $breed->cats;
      return view('cats.index', compact('breed', 'cats'));
    }

    public function create()
    {
      $breeds = Breed::all()->pluck('name', 'id');
      return view('cats.create', compact('breeds'));
    }

    public function show(Cat $cat)
    {
      return view('cats.show', compact('cat'));
    }

    public function saveCat()
    {
      $inputs = Input::all();
      $cat = Cat::create($inputs);
      return redirect('/cats/' . $cat->id)->withSuccess('Cat has been create');
    }

    public function edit(Cat $cat)
    {
      $breeds = Breed::all()->pluck('name', 'id');
      return view('cats.edit', compact('cat', 'breeds'));
    }

    public function updateCat(Cat $cat)
    {
      $inputs = Input::all();
      $cat->update($inputs);
      return redirect('/cats/' . $cat->id)->withSuccess('Cat has been update');
    }

    public function destroy(Cat $cat)
    {
      $cat->delete();
      return redirect('cats')->withSuccess('Cat has been delete');
    }
}
