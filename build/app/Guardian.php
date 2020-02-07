<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Guardian extends Model
{
    //
    public function student()
    {
      return $this->belongsTo('App\Student');
    }

    public function religion()
    {
      return $this->belongsTo('App\Religion');
    }
}
