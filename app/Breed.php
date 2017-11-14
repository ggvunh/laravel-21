<?php

namespace Furbook;

use Illuminate\Database\Eloquent\Model;

class Breed extends Model
{
    public $timestamps = false;

    public function cats()
    {
        $this->hasMany('Furbook\Cat', 'breed_id');
    }
}
