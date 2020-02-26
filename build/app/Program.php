<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    //
    public function grades()
    {
      return $this->hasMany('App\Grade');
    }
    public function students()
    {
      return $this->belongsToMany('App\Student')->withTimestamps()->withPivot('is_primary');
    }
}
