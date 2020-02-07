<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Grade extends Model
{
    //
    public function program()
    {
      return $this->belongsTo('App\Program');
    }

    public function employee()
    {
      return $this->belongsTo('App\Employee');
    }

    public function students()
    {
      return $this->hasMany('App\Student');
    }

}
