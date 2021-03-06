<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AbsentRecord extends Model
{
    //
    public function academicYear()
    {
      return $this->belongsTo('App\AcademicYear');
    }

    public function student()
    {
      return $this->belongsTo('App\Student');
    }

    public function employee()
    {
      return $this->belongsTo('App\Employee');
    }
}
