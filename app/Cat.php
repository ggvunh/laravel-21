<?php

namespace Furbook;

use Illuminate\Database\Eloquent\Model;

class Cat extends Model
{
    protected $fillable = ['name', 'date_of_birth', 'breed_id'];
    protected $table = 'cats';

    public function breed()
    {
        $this->belongTo('Furrbook\Breed');
    }
}
