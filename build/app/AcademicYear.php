<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AcademicYear extends Model
{
    //
    public function absentRecords()
    {
      return $this->hasMany('App\AbsentRecord');
    }
}
