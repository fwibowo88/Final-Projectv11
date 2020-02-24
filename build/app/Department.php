<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    //
    public function complaints()
    {
      return $this->hasMany('App\Complaint');
    }
    public function employees()
    {
      return $this->belongsToMany('App\Employee')->withTimestamps()->withPivot('is_primary');
    }
}
