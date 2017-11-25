<?php

namespace Furbook;

use Illuminate\Database\Eloquent\Model;

class Math extends Model
{
    public static function sumNumber($a, $b)
    {
      return $a + $b;
    }
}
