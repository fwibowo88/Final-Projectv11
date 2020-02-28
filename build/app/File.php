<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    //
    public function student()
    {
      return $this->belongsTo('App\Student');
    }
}
