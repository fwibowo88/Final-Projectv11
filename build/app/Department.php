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
      return $this->hasMany('App\Employee');
    }
}
