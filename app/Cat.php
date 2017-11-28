<?php

namespace Furbook;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cat extends Model
{
    use SoftDeletes;

    protected $fillable = ['name', 'date_of_birth', 'breed_id', 'user_id'];
    protected $table = 'cats';
    protected $dates = ['deleted_at'];


    public function breed()
    {
      return $this->belongsTo('Furbook\Breed', 'breed_id');
    }
}
