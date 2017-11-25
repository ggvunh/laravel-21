<?php

namespace Furbook;

use Illuminate\Database\Eloquent\Model;

class Breed extends Model
{
    public $timestamps = false;
    protected $fillable = ['name'];

    public function cats()
    {
        return $this->hasMany('Furbook\Cat', 'breed_id');
    }
}
