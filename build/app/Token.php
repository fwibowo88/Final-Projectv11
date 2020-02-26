<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Token extends Model
{
    //
    public function student()
    {
      return $this->hasOne('App\Student');
    }
}
